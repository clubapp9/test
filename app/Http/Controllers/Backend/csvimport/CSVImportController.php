<?php

namespace App\Http\Controllers\Backend\CSVImport;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Portfolio;
use App\Models\CsvData;
use App\Models\SheetValue;
use App\Models\Sheet;
use App\Models\Fields;

use App\Http\Requests\Backend\CSVImport\CSVImportRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Auth;


use Carbon\Carbon;
use Session;

class CSVImportController extends Controller
{

    public function createSheet( Request $request )
    {
        if(!isset($request->columns))
        {
            return redirect()->back()->withInput()->withFlashDanger("No columns set for this sheet definition.");
        }

        if(strlen(implode($request->columns)) == 0) {
            return redirect()->back()->withInput()->withFlashDanger("No columns set for this sheet definition.");
        }

        if(empty($request->sheet_name)) {
            return redirect()->back()->withInput()->withFlashDanger("Sheet Name required.");
        }

        $sheet = new Sheet;

        $sheet->name = $request->sheet_name;
        $sheet->sheet_schema = json_encode($request->columns);

        if(isset($request->description))        $sheet->description = $request->description;

        $sheet->save();

        return redirect()->back()->withFlashSuccess('Sheet definition successfully created.');

    }

    public function getImport()
    {
        return view('import');
    }


    public function parseImport(CsvImportRequest $request)
    {
        if(empty($request->sheet_schema_id)) {
            return redirect()->back()->withInput()->withFlashDanger("Sheet Schema ID required when Parsing CSV.");
        }

        //ToDo Some type of logic/hidden_value for page refreshes to prevent re-saving of intiial Parse CSV request
        //$request->session()->get('hidden_value', $request->hidden_value);

        $sheet_schema_id='';
        if($request->sheet_schema_id != 'none'){
            $sheet_schema_id = $request->sheet_schema_id;
            $sheet = Sheet::find($sheet_schema_id);
            $actual_sheet = json_decode($sheet->sheet_schema);

            $sheet_definition_row_count = count($actual_sheet);
        }else{
            //Create placeholder sheet for data about to be imported, even if there's no schema associated
            $sheet = new Sheet;
            $sheet->name = "Placeholder";
            $sheet->sheet_schema = 'none'; //ToDo:  Remove once new migration has been run
            $sheet->save();
            $sheet_schema_id = $sheet->id;
        }

        $path = $request->file('csv_file')->getRealPath();
        if ($request->has('header')) {
            $data = Excel::load($path, function($reader) {})->get()->toArray();
        } else {
            $data = array_map('str_getcsv', file($path));
        }
        if (count($data) > 0) {

            if ($request->has('header')) {
                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $key;
                }
            }

            $csv_data = $data; //array_slice($data, 0, count($data));

            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data),
                'sheet_id' => $sheet_schema_id
            ]);

            $csv_data_id = $csv_data_file->id;

            //write to sheet_values table
            $i=0;
            foreach($csv_data as $key => $csv)
            {
                foreach($csv as $column => $value){
                    if(!empty($value) AND $value != '') {
                        $sheet_value = SheetValue::create( [
                            'sheet_id' => $sheet_schema_id,
                            'row_id' => $key,
                            'column_name' => $column,
                            'value' => $value,
                            'csv_data_id' => $csv_data_id
                        ]);

                        $imported_values[$key][$sheet_value->id] = $value;
                    }

                }

            }


            if(isset($actual_sheet)){
                if(is_array($actual_sheet) ){
                    foreach($actual_sheet as $vals){
                        SheetValue::where('sheet_id',$sheet_schema_id)
                            ->where('row_id' ,$vals->row_id )
                            ->where('column_name', $vals->column_name )
                            ->update(['field_id' => $vals->field_id]);
                    }
                }
            }

        } else {
            return redirect()->back()->withInput()->withFlashDanger("CSV File has no data or we could not read the data associated");
        }

        return view('backend.csv_data.import_fields', compact( 'csv_header_fields', 'csv_data', 'imported_values', 'csv_data_file',  'sheet_schema_id', 'csv_data_id'));
    }

    public function viewDataTable(request $request)
    {
        $sheet_schema_id =  $request->sheet_schema_id;
        $sheet = Sheet::find($sheet_schema_id);
        $sheet_definition = $sheet->sheet_schema;

        $csv_data_model = new CsvData();
        $data = $csv_data_model->getBySheetId($sheet_schema_id);
        $sheet_data = json_decode($data[0]->csv_data, true);


        return view('backend.csv_data.view_data_table', compact( 'sheet_schema_id', 'sheet_definition', 'sheet_data' ) );
    }

    public function processImport(Request $request)
    {
        //After clicking Continue... button this is where we end up

        if(empty($request->sheet_schema_id)) {
            return redirect()->back()->withInput()->withFlashDanger("Sheet Schema ID required when Parsing CSV.");
        }
        $sheet_schema_id = $request->sheet_schema_id;
        $csv_data_id = $request->csv_data_id;

        $results = SheetValue::where('sheet_id', '=', $sheet_schema_id)
            ->where('csv_data_id', '=', $csv_data_id)
            ->where('field_id', '<>', 0 )
            ->get(['field_id', 'row_id', 'column_name'])
        ->all();

        Sheet::where('id',$sheet_schema_id)
            ->update(['sheet_schema' => json_encode($results)]);

        $sheet = Sheet::find($sheet_schema_id);
        $sheet_name = $sheet->name;

        $actual_sheet = json_decode($sheet->sheet_schema);

        return view('backend.csv_data.import_success', compact('sheet_schema_id', 'sheet_name', 'csv_data_id' ));
    }

    /*
     * SELECT row_id, column_name FROM sheet_values WHERE sheet_id='17' AND csv_data_id = '17' AND field_id <> 0
     */


    public function index()
    {
        $sheet_schema = Sheet::all('*')->take('100');
        $random_hidden_value = rand('100', '9999999999');

       // echo $sheet_schema->count();
        return view('backend.csv_data.index', compact( 'sheet_schema' , 'random_hidden_value' ));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function imported()
    {
        try{
            $csv_data = CsvData::paginate(15);
    }catch(Exception $e){
            echo $e->getMessage();
    }

        return view('backend.csv_data.show_imported', compact('csv_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('csv_data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        CsvData::create($request->all());

        Session::flash('flash_message', 'csv_datum added!');

        return redirect('csv_data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $csv_datum = CsvData::findOrFail($id);

        return view('backend.csv_data.edit', compact('csv_datum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $csv_datum = CsvData::findOrFail($id);
        $csv_datum->update($request->all());

        Session::flash('flash_message', 'csv_datum updated!');

        return view('backend.csv_data.edit', compact('csv_datum'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        CsvData::destroy($id);

        Session::flash('flash_message', 'csv_datum deleted!');

        return redirect()->back();
    }

}
