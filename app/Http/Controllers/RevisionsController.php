<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Revision;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class RevisionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $revisions = Revision::paginate(15);

        return view('revisions.index', compact('revisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('revisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        Revision::create($request->all());

        Session::flash('flash_message', 'Revision added!');

        return redirect('revisions');
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
        $revision = Revision::findOrFail($id);

        return view('revisions.show', compact('revision'));
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
        $revision = Revision::findOrFail($id);

        return view('revisions.edit', compact('revision'));
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
        
        $revision = Revision::findOrFail($id);
        $revision->update($request->all());

        Session::flash('flash_message', 'Revision updated!');

        return redirect('revisions');
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
        Revision::destroy($id);

        Session::flash('flash_message', 'Revision deleted!');

        return redirect('revisions');
    }

}
