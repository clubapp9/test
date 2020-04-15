<?php

namespace App\Http\Controllers\Backend\CSVImport;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Portfolio;
use App\Models\CsvData;
use App\Models\Sheet;

use App\Http\Requests\Backend\CSVImport\CSVImportRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Maatwebsite\Excel\Facades\Excel;

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
            $csv_data = array_slice($data, 0, 2);
            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
           return redirect()->back();
        }

        return view('backend.csv_data.import_fields', compact( 'csv_header_fields', 'csv_data', 'csv_data_file'));
    }

    public function processImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        foreach ($csv_data as $row) {
            $contact = new Portfolio;
            foreach (config('app.db_fields') as $index => $field) {
                if ($data->csv_header) {
                    $contact->$field = $row[$request->fields[$field]];
                } else {
                    $contact->$field = $row[$request->fields[$index]];
                }
            }
            $contact->csv_data_file_id = $request->csv_data_file_id;
            $contact->save();
        }
        return view('backend.csv_data.import_success');
    }


    public function index()
    {
        $sheets = new Sheet();

        $sheet_schema = Sheet::all('*')->take('100');
       // echo $sheet_schema->count();
        return view('backend.csv_data.index', compact( 'sheet_schema' ));
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
