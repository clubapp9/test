<?php
/**
 * Created by PhpStorm.
 * User: Chris Medina
 * Date: 12/20/15
 * Time: 10:52 PM
 */

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\SheetValue;
use App\Models\Sheet;

use App\Models\Portfolio;
use App\Models\Fields;

use App\Wine;
use App\WineType;
use App\InventoryLocation;

use App\Models\AssnCollectorAccounts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Response;

use Validator;

class AJAXController extends Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function search_inventory(Request $request){
        $validator = Validator::make($request->all(), ['search_box' => 'required|string'
        ]);

        if ($validator->passes()) {

           /* return \App\Wine
                ::selectRaw('w.*, i.quantity, il.location')
                ->from('wine as w')
                ->join('assn_wine_inventory as awi','awi.wine_id','=','w.id')
                ->join('inventory as i','i.id','=','awi.inventory_id')
                ->join('inventory_location as il','il.id','=','i.inventory_location_id')
                ->where( 'w.upc', 'like', '%' . $request->search_box . '%' )
                ->orWhere('w.name', 'like', '%' . $request->search_box . '%')->get()->toArray();*/

            /*$results =  Wine::where('upc', 'like', '%' . $request->search_box . '%')
                ->orWhere('name', 'like', '%' . $request->search_box . '%')->get()->toArray();*/

            $results =  \App\Wine
                ::selectRaw('w.*, i.quantity, il.location, il.id inventory_location_id')
                ->from('wine as w')
                ->join('assn_wine_inventory as awi','awi.wine_id','=','w.id')
                ->join('inventory as i','i.id','=','awi.inventory_id')
                ->join('inventory_location as il','il.id','=','i.inventory_location_id')
                ->where( 'w.upc', 'like', '%' . $request->search_box . '%' )
                ->orWhere('w.name', 'like', '%' . $request->search_box . '%')->get()->toArray();

            if(count($results)) {
                $response['results'] = $results;
                $response['locations'] = InventoryLocation::where('user_id', $this->user_id )->get()->toArray();
                return $response;
            }
            return;
        }
    }

    public function add_wine_type(Request $request)
    {
        $validator = Validator::make($request->all(), ['wine_type' => 'required|string'
        ]);

        if ($validator->passes()) {
            //Update if it already exists
            if( WineType::where( ['wine_type' => $request->wine_type, 'user_id' => $this->user_id ] )->count() >= 1)
                return response()->json( [ 'error' => [ 'This wine type already exists '] ] );

            $wine_type = WineType::create([ 'wine_type' => $request->wine_type, 'user_id' => $this->user_id ]);

            //Gather all wine_types
            $wine_types = WineType::all()->toArray();
            //        $wine_types = WineType::all('*')->take('100');

            return response()->json( $wine_types  );
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function add_location (Request $request)
    {
        $validator = Validator::make($request->all(), ['wine_location' => 'required|string'
        ]);

        if ($validator->passes()) {

            //Update if it already exists
            if( InventoryLocation::where( ['location' => $request->wine_location ] )->count() >= 1)
                return response()->json( [ 'error' => [ 'This location already exists '] ] );

            $wine_type = InventoryLocation::create([ 'location' => $request->wine_location, 'user_id' => $this->user_id ]);

            //Gather all wine_locations
            $wine_locations = InventoryLocation::all()->toArray();

            return response()->json( $wine_locations  );
        }
        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function attach_dates( Request $request )
    {
        $validator = Validator::make($request->all(), ['csv_data_id' => 'required|numeric',
            'date' => 'required|string'
        ]);

        if ($validator->passes()) {

            SheetValue::where('csv_data_id',$request->csv_data_id)
                ->update(['data_date' => $request->date ]);


            return response()->json( [ 'success'=> array( 'Dates attached' ) ] );
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function rename_sheet( Request $request ){
        $validator = Validator::make($request->all(), ['sheet_schema_id' => 'required|numeric',
            'sheet_name' => 'required|string'
        ]);

        if ($validator->passes()) {
            Sheet::where('id',$request->sheet_schema_id)
                ->update(['name' => $request->sheet_name ]);
            return response()->json( [ 'success'=> array( 'Sheet name updated' ) ] );
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function assign_value_attributes( Request $request )
    {
        $validator = Validator::make($request->all(), ['frequency' => 'required|numeric',
            'data_type' => 'required|numeric',
            'column_id' => 'required|numeric',
            'column_name' => 'sometimes|required|string',
            'short_name' => 'sometimes|required|string',
            'custom_name' => 'sometimes|required|string'
        ]);
        if ($validator->passes()) {

            $user_id = $this->user_id;

            //Check if field_id not null or not 0 on table
            $field_id = SheetValue::where('id', $request->column_id)->pluck('field_id');

            if(!is_null($field_id) AND $field_id != '' ){
                $fieldRecord = Fields::find($field_id);
                $fieldRecord->update([
                    'user_id' => $user_id,
                    'name' => $request->column_name,
                    'short_name' => $request->short_name,
                    'customized_name' => $request->custom_name,
                    'frequency_id' => $request->frequency,
                    'data_type_id' => $request->data_type
                ]);

                $field_last_insert_id = $field_id;
            }else{
                $fields = Fields::create([
                    'user_id' => $user_id,
                    'name' => $request->column_name,
                    'short_name' => $request->short_name,
                    'customized_name' => $request->custom_name,
                    'frequency_id' => $request->frequency,
                    'data_type_id' => $request->data_type
                ]);

                $field_last_insert_id = $fields->id;
            }


            //Never change column_name on SheetValue, it will mess up future imports / Sheet Schema definition
            $sheetValue = SheetValue::find($request->column_id);
            $sheetValue->field_id = $field_last_insert_id;
            $sheetValue->save();

            return response()->json(['success'=> array('All options valid. New fields id: '. $field_last_insert_id. "FIELD ID IS : " . $field_id . $request->column_name . $request->short_name . $request->custom_name )]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }


    public function post(Request $request){

    }



    //route:   /ajax/post/controller


}