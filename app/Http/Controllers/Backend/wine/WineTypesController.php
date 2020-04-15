<?php

namespace App\Http\Controllers\Backend\wine;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\WineType;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class WineTypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $winetypes = WineType::paginate(15);

        return view('winetypes.index', compact('winetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('winetypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        WineType::create($request->all());

        Session::flash('flash_message', 'WineType added!');

        return redirect('winetypes');
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
        $winetype = WineType::findOrFail($id);

        return view('winetypes.show', compact('winetype'));
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
        $winetype = WineType::findOrFail($id);

        return view('winetypes.edit', compact('winetype'));
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
        
        $winetype = WineType::findOrFail($id);
        $winetype->update($request->all());

        Session::flash('flash_message', 'WineType updated!');

        return redirect('winetypes');
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
        WineType::destroy($id);

        Session::flash('flash_message', 'WineType deleted!');

        return redirect('winetypes');
    }

}
