<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\StatusCodes;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class StatusCodesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $statuscodes = StatusCodes::paginate(15);

        return view('backend.settings.statuscodes.index', compact('statuscodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.settings.statuscodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        StatusCodes::create($request->all());

        Session::flash('flash_message', 'StatusCode added!');

        return redirect('admin/settings/statuscodes');
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
        $statuscode = StatusCodes::findOrFail($id);

        return view('backend.settings.statuscodes.show', compact('statuscode'));
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
        $statuscode = StatusCodes::findOrFail($id);

        return view('backend.settings.statuscodes.edit', compact('statuscode'));
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
        
        $statuscode = StatusCodes::findOrFail($id);
        $statuscode->update($request->all());

        Session::flash('flash_message', 'StatusCode updated!');

        return redirect('admin/settings/statuscodes');
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
        /*StatusCodes::destroy($id);

        Session::flash('flash_message', 'StatusCode deleted!');

        return redirect('statuscodes');*/
    }

}