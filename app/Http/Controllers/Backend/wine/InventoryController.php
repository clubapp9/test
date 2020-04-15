<?php

namespace App\Http\Controllers\Backend\wine;

use App\AssnWineInventory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Inventory;
use App\InventoryLocation;
use App\Revision;
use DB;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Validator;

class InventoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $inventory = Inventory::paginate(15);
        return view('backend.wine.inventory.show', compact('inventory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $inventory_locations = InventoryLocation::paginate(30);

        return view('backend.wine.inventory.create', compact('inventory_locations'));
    }

    /**
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function transfer()
    {
        $inventory_locations = InventoryLocation::paginate(30);

        return view('backend.wine.inventory.transfer', compact('inventory_locations'));
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function transfer_inventory(Request $request)
    {
        $validator = Validator::make($request->all(), ['quantity' => 'required|numeric', 'wine_id' => 'required|string',
            'location_to_id' => 'required|string', 'location_from_id' => 'required|string'
        ]);

        if($request->location_to_id == $request->location_from_id){
            Session::flash('flash_danger', "Location From and Location To cannot be the same..");
            return redirect()->back()->withInput();
        }

        if($validator->fails()){
            Session::flash('flash_danger', "Inventory and Location are required for a new record.");
            return redirect()->back()->withInput();
        }

        $location_from =    $request->location_from_id;
        $location_to =      $request->location_to_id;
        $quantity =         $request->quantity;
        $wine_id  =         $request->wine_id;

        if( intval($quantity) <= 0){
            Session::flash('flash_danger', "Quantity to transfer($quantity) must be a number greater than 0.");
            return redirect()->back()->withInput();
        }

        try{
            $existing_inventory_for_location =  \App\AssnWineInventory
                ::selectRaw('awi.*, inventory.*')
                ->from('assn_wine_inventory as awi')
                ->join('inventory', function($join) use ($location_from){
                    $join->on('inventory.id','=','awi.inventory_id');
                    $join->on('inventory.inventory_location_id', '=', DB::raw("'$location_from'"));
                })->where( 'awi.wine_id', '=', $wine_id )->first();
            $existing_inventory_for_location = $existing_inventory_for_location->toArray() ?? $existing_inventory_for_location;
        }catch(\Throwable  $e){

        }

        if(count($existing_inventory_for_location) > 0) {
            if(($existing_inventory_for_location['inventory_id'])) { }
            //if(isset($existing_inventory_for_location['quantity'])) echo $existing_inventory_for_location['quantity'];

            if( intval($quantity) > intval($existing_inventory_for_location['quantity'])) {
                Session::flash('flash_danger', "Quantity to transfer($quantity) cannot be greater than the current locations existing quantity (".$existing_inventory_for_location['quantity'].").");
                return redirect()->back()->withInput();
            }

            $moving_to_inventory = 0;

            try{
            $moving_to_inventory =  \App\AssnWineInventory
                ::selectRaw('awi.*, inventory.*')
                ->from('assn_wine_inventory as awi')
                ->join('inventory', function($join) use ($location_to){
                    $join->on('inventory.id','=','awi.inventory_id');
                    $join->on('inventory.inventory_location_id', '=', DB::raw("'$location_to'"));
                })->where( 'awi.wine_id', '=', $wine_id )->first();

            $moving_to_inventory = $moving_to_inventory->toArray() ?? $moving_to_inventory;
            }catch(\Throwable  $e){

            }

            //Update if Location To exists, otherwise create new with new amount
            if(count($moving_to_inventory) > 0) {
                $new_quantity = ( intval($quantity) + intval($moving_to_inventory['quantity']));

                //Add Inventory to Location To
                Inventory::where('id',$moving_to_inventory['inventory_id'])->update(['quantity'=>$new_quantity]);

                //Subtract Inventory from Location From
                $subtract_quantity = ( intval($existing_inventory_for_location['quantity']) - intval($quantity) );
                Inventory::where('id',$existing_inventory_for_location['inventory_id'])->update(['quantity'=>$subtract_quantity]);

            }else{
                //Create new Inventory record and attach the Location
                $new_quantity = $quantity;
                $inventory = new Inventory;
                $inventory->inventory_location_id = $location_to;
                $inventory->quantity = intval($quantity);
                $inventory->save();

                $last_inventory_id = $inventory->id;

                if($last_inventory_id > 0) {
                    $subtract_quantity = ( intval($existing_inventory_for_location['quantity']) - intval($quantity) );
                    Inventory::where('id',$existing_inventory_for_location['inventory_id'])->update(['quantity'=>$subtract_quantity]);

                    $assn_wine_inventory = new AssnWineInventory();
                    $assn_wine_inventory->wine_id = $wine_id;
                    $assn_wine_inventory->inventory_id = $last_inventory_id;
                    $assn_wine_inventory->save();
                }

            }

            Revision::create( [ 'revision_type_id' => 1,
                'action_log' => json_encode( ['ExistingRecordBeforeAdding' => $existing_inventory_for_location,
                'MovingToRecord' => $moving_to_inventory, 'RequestSubmitted' => $request->all() ]),
                'notes' => $request->notes]);

        }else{
            Session::flash('flash_danger', 'No quantity found for Location From. Please select a location that currently has inventory to transfer.');
            return redirect()->back()->withInput();
        }

        Session::flash('flash_message', $quantity . ' inventory transferred!');

        return redirect('admin/wine/'.$wine_id);
    }


    public function remove( Request $request )
    {
        $inventory_locations = InventoryLocation::paginate(30);

        return view('backend.wine.inventory.remove', compact('inventory_locations') );
    }

    public function remove_inventory( Request $request )
    {
        $validator = Validator::make($request->all(), ['quantity' => 'required|numeric', 'wine_id' => 'required|string',
            'location_id' => 'required|string'
        ]);

        if($validator->fails()){
            Session::flash('flash_danger', "Inventory and Location are required for removing inventory.");
            return redirect()->back()->withInput();
        }

        $location_from =    $request->location_id;
        $quantity =         $request->quantity;
        $wine_id  =         $request->wine_id;

        $existing_inventory_for_location = 0;

        if( intval($quantity) <= 0){
            Session::flash('flash_danger', "Quantity to transfer($quantity) must be a number greater than 0.");
            return redirect()->back()->withInput();
        }

        try{
            $existing_inventory_for_location =  \App\AssnWineInventory
                ::selectRaw('awi.*, inventory.*')
                ->from('assn_wine_inventory as awi')
                ->join('inventory', function($join) use ($location_from){
                    $join->on('inventory.id','=','awi.inventory_id');
                    $join->on('inventory.inventory_location_id', '=', DB::raw("'$location_from'"));
                })->where( 'awi.wine_id', '=', $wine_id )->first();
            $existing_inventory_for_location = $existing_inventory_for_location->toArray() ?? $existing_inventory_for_location;
        }catch(\Throwable  $e){
        }

        if(count($existing_inventory_for_location) > 0) {
            if( intval($quantity) > intval($existing_inventory_for_location['quantity'])) {
                Session::flash('flash_danger', "Quantity to remove($quantity) cannot be greater than the current locations existing quantity (".$existing_inventory_for_location['quantity'].").");
                return redirect()->back()->withInput();
            }

            $subtract_quantity = ( intval($existing_inventory_for_location['quantity']) - intval($quantity) );
            Inventory::where('id',$existing_inventory_for_location['inventory_id'])->update(['quantity'=>$subtract_quantity]);

            Revision::create( [ 'revision_type_id' => 3,
                'action_log' => json_encode( ['ExistingRecordBeforeAdding' => $existing_inventory_for_location,
                'RequestSubmitted' => $request->all() ]),
                'notes' => $request->notes]);

        }else{
            Session::flash('flash_danger', "No inventory quantity found in Location.");
            return redirect()->back()->withInput();
        }

        Session::flash('flash_message', $quantity . ' inventory removed!');

        return redirect('admin/wine/'.$wine_id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['wine_id' => 'required|numeric', 'quantity' => 'required|string', 'location_id' => 'required|numeric'
        ]);

        if($validator->fails()){
            Session::flash('flash_danger', "Quantity and Location are required for adding inventory.");
            return redirect()->back()->withInput();
        }

        $existing_inventory_for_location = 0;
        $location_id = $request->location_id;
        $wine_id = $request->wine_id;

        $quantity = $request->quantity;

        try{
            $existing_inventory_for_location =  \App\AssnWineInventory
                ::selectRaw('awi.*, inventory.*')
                ->from('assn_wine_inventory as awi')
                ->join('inventory', function($join) use ($location_id){
                    $join->on('inventory.id','=','awi.inventory_id');
                    $join->on('inventory.inventory_location_id', '=', DB::raw("'$location_id'"));
                })->where( 'awi.wine_id', '=', $wine_id )->first();
            $existing_inventory_for_location = $existing_inventory_for_location->toArray() ?? $existing_inventory_for_location;
        }catch(\Throwable  $e){

        }

        if(count($existing_inventory_for_location) > 0) {
            //Already Exists so just update the quantity  (Existing Quantity + Adding Quantity)

            if(isset($existing_inventory_for_location['inventory_id']) && isset($existing_inventory_for_location['quantity'])){
                $new_quantity = ( $quantity + intval($existing_inventory_for_location['quantity']));
                Inventory::where('id',$existing_inventory_for_location['inventory_id'])->update(['quantity'=>$new_quantity]);
            }

            Revision::create( [ 'revision_type_id' => 2,
                                'action_log' => json_encode( ['ExistingRecordBeforeAdding' => $existing_inventory_for_location, 'RequestSubmitted' => $request->all() ]),
                                'notes' => $request->notes]);
        }else{
            $inventory = new Inventory;
            $inventory->inventory_location_id = $location_id;
            $inventory->quantity = $quantity;
            $inventory->save();

            $last_inventory_id = $inventory->id;

            $assn_wine_inventory = new AssnWineInventory();
            $assn_wine_inventory->wine_id = $wine_id;
            $assn_wine_inventory->inventory_id = $last_inventory_id;
            $assn_wine_inventory->save();
        }



        Session::flash('flash_message', 'inventory added!');

        return redirect('admin/wine/'.$wine_id);
        //return redirect('inventory');
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
        $inventory = Inventory::findOrFail($id);

        return view('backend.wine.inventory.show', compact('inventory'));
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
        $inventory = Inventory::findOrFail($id);

        return view('backend.wine.inventory.edit', compact('inventory'));
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
        
        $inventory = Inventory::findOrFail($id);
        $inventory->update($request->all());

        Session::flash('flash_message', 'inventory updated!');

        return redirect('inventory');
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
        Inventory::destroy($id);

        Session::flash('flash_message', 'inventory deleted!');

        return redirect()->route('admin.wine.inventory.index');
    }

}
