<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Testing;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class TestingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $testing = Testing::paginate(15);

        return view('testing.index', compact('testing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('testing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        Testing::create($request->all());

        Session::flash('flash_message', 'Testing added!');

        return redirect('testing');
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
        $testing = Testing::findOrFail($id);

        return view('testing.show', compact('testing'));
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
        $testing = Testing::findOrFail($id);

        return view('testing.edit', compact('testing'));
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
        
        $testing = Testing::findOrFail($id);
        $testing->update($request->all());

        Session::flash('flash_message', 'Testing updated!');

        return redirect('testing');
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
        Testing::destroy($id);

        Session::flash('flash_message', 'Testing deleted!');

        return redirect('testing');
    }

}
