<?php

namespace App\Http\Controllers\Backend\wine;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\InventoryLocation;
use App\Wine;
use App\WineType;
use App\Inventory;
use App\AssnWineInventory;


use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Validator;

class WineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $wine = Wine::sortable()->paginate(15);
        $sortby ='';
        $order = '';
        $links = '';

        /*if($sortby && $order)
        {
            $child = Wine::orderBy($sortby, $order)->paginate(10);
            $links = $child->appends(['sortby' => $sortby, 'order' => $order])->links();
        } else {
            $child = Wine::paginate(10);
            $links = '';
        }*/

        $wine_types = WineType::where( 'user_id' , $this->user_id )->get()->toArray();

        return view('backend.wine.index', compact('wine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        //Inner Joins NEEDED:
        /*
SELECT * FROM `wine` w
INNER JOIN assn_wine_inventory awi ON ( awi.wine_id = w.id )
INNER JOIN inventory i ON ( i.id = awi.inventory_id )
INNER JOIN inventory_location il ON ( il.id = i.inventory_location_id )
WHERE w.user_id='1'

                //As of Laravel 5.6 onward - JoinSub innerjoin aliasing
        /*$users = DB::table('users')
            ->joinSub($latestPosts, 'latest_posts', function ($join) {
                $join->on('users.id', '=', 'latest_posts.user_id');
            })->get();*/

        /*$innerjoins = \App\Wine
            ::selectRaw('w.*, i.quantity, il.location')
            ->from('wine as w')
            ->join('assn_wine_inventory as awi','awi.wine_id','=','w.id')
            ->join('inventory as i','i.id','=','awi.inventory_id')
            ->join('inventory_location as il','il.id','=','i.inventory_location_id')
            ->where('w.user_id', $this->user_id)
            ->get();*/


        $wine_types = WineType::where( 'user_id' , $this->user_id )->get();

        $wine_locations = InventoryLocation::where( 'user_id' , $this->user_id )->get();

        //$wine_locations = AssnWineInventory::where( 'wine_id')

        return view( 'backend.wine.create', compact( 'wine_types', 'wine_locations' , 'innerjoins' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['type_id' => 'required|string', 'qty' => 'required|string', 'location_id' => 'required|string'
        ]);

        if($validator->fails()){
            Session::flash('flash_danger', "Inventory and Location are required for a new record.");
            return redirect()->back()->withInput();
        }

        $inventory = $request->qty;
        $location = $request->location_id;

        if($inventory && $location){
            $wine = new Wine;
            $wine->upc = $request->upc;
            $wine->name = $request->name;
            $wine->type_id = $request->type_id;
            $wine->vintage = $request->vintage;
            $wine->cost = str_replace("$", "", $request->cost );
            $wine->regular_sell_price = str_replace("$", "", $request->regular_sell_price );
            $wine->save();

            //Wine record created successfully
            if($wine->id){
                $inventory_model = new Inventory;
                $inventory_model->inventory_location_id = $request->location_id;
                $inventory_model->quantity = $inventory;
                $inventory_model->save();

                //Inventory record created successfully
                if($inventory_model->id){
                    //Save Association of Both
                    $assn_wine_inventory = new AssnWineInventory;
                    $assn_wine_inventory->wine_id = $wine->id;
                    $assn_wine_inventory->inventory_id = $inventory_model->id;
                    $assn_wine_inventory->Save();
                }
            }else{
                $validator->after(function($validator) {
                        $validator->errors()->add('field', 'The wine was not successfully saved.');
                });

                if ($validator->fails()) {
                    //
                    Session::flash('flash_danger', $validator->errors()->all());
                    return redirect()->back()->withInput();
                }
            }
        } else{
            //return with error (inventory and location required)
            $validator->after(function($validator) {
                $validator->errors()->add('field', 'Inventory and Location are required to save a record.');
            });

            if ($validator->fails()) {
                //
                Session::flash('flash_danger', $validator->errors()->all());
                return redirect()->back()->withInput();
            }
        }


        Session::flash('flash_message', 'Wine added!');

        //return redirect('admin.wine');

        return redirect()->route('admin.wine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wine = Wine::findOrFail($id);
        $inventory_location_quantity = [];
        $inventory_locations = [];

        if (count($wine)) {
            //array of wine_id's and inventory_id's if multiple locations with inventory for wine
            $assn_wine_inventory = AssnWineInventory::select('inventory_id')->where( 'wine_id' , $id )->get()->toArray();

            if (count($assn_wine_inventory)) {
                $inventory_location_quantity = Inventory::select( 'inventory_location_id','quantity' )->whereIn('id', $assn_wine_inventory)->get();
            }

            if (count($inventory_location_quantity) > 0) {
                foreach($inventory_location_quantity as $obj2){
                    $inventory_location_id   = $obj2->inventory_location_id;
                    $quantity       = $obj2->quantity;
                    //Model::where('name', 'John Doe')->first()->my_field
                    $inventory_location = InventoryLocation::where( 'id', $inventory_location_id )->first()->location;
                    if($inventory_location) $inventory_locations[] = [ 'location' => $inventory_location, 'quantity' => $quantity ];
                }
            }
        }
//var_dump($inventory_locations);
        if($wine)
        {
            $wine_type =  WineType::find($wine->type_id);

            //$wine_locations =  InventoryLocation::find($id)->location->toArray();
        }


        return view('backend.wine.show', compact('wine', 'wine_type', 'wine_location', 'inventory_locations' ));
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
        $wine = Wine::findOrFail($id);

        return view('backend.wine.edit', compact('wine'));
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
        
        $wine = Wine::findOrFail($id);
        $wine->update($request->all());

        Session::flash('flash_message', 'Wine updated!');

        return redirect()->route('admin.wine.index');
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
        Wine::destroy($id);

        Session::flash('flash_message', 'Wine deleted!');

        return redirect()->route('admin.wine.index');
    }

}
