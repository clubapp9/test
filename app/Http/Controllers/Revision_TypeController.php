<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Revision_Type;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class Revision_TypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $revision_type = Revision_Type::paginate(15);

        return view('revision_type.index', compact('revision_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('revision_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        Revision_Type::create($request->all());

        Session::flash('flash_message', 'Revision_Type added!');

        return redirect('revision_type');
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
        $revision_type = Revision_Type::findOrFail($id);

        return view('revision_type.show', compact('revision_type'));
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
        $revision_type = Revision_Type::findOrFail($id);

        return view('revision_type.edit', compact('revision_type'));
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
        
        $revision_type = Revision_Type::findOrFail($id);
        $revision_type->update($request->all());

        Session::flash('flash_message', 'Revision_Type updated!');

        return redirect('revision_type');
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
        Revision_Type::destroy($id);

        Session::flash('flash_message', 'Revision_Type deleted!');

        return redirect('revision_type');
    }

}
