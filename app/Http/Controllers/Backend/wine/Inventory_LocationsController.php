<?php

namespace App\Http\Controllers\Backend\wine;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Revision;
use App\InventoryLocation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class Inventory_LocationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $inventory_locations = InventoryLocation::paginate(30);

        return view('backend.wine.inventory_locations.index', compact('inventory_locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $inventory_locations = InventoryLocation::paginate(30);
        
        return view('backend.wine.inventory_locations.create', compact('inventory_locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        InventoryLocation::create(array_merge($request->all(), ['user_id' => $this->user_id]));

        $inventory_location = new InventoryLocation();


        Session::flash('flash_message', 'Wine_Location added!');

        return redirect()->route('admin.wine.inventory_locations.index');
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
        $wine_location = InventoryLocation::findOrFail($id);

        return view('backend.wine.inventory_locations.show', compact('wine_location'));
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
        $wine_location = InventoryLocation::findOrFail($id);

        return view('backend.wine.inventory_locations.edit', compact('wine_location'));
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
        
        $wine_location = InventoryLocation::findOrFail($id);
        $wine_location->update($request->all());

        Session::flash('flash_message', 'Wine_Location updated!');

        return redirect()->route('admin.wine.inventory_locations.index');
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
        InventoryLocation::destroy($id);

        Session::flash('flash_message', 'Wine_Location deleted!');

        return redirect()->route('admin.wine.inventory_locations.index');
    }

}
