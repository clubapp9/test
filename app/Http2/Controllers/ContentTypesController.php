<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ContentTypes;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ContentTypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contenttypes = ContentTypes::paginate(15);

        return view('contenttypes.index', compact('contenttypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('contenttypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        ContentTypes::create($request->all());

        Session::flash('flash_message', 'ContentTypes successfully added!');

        return redirect('contenttypes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $contenttype = ContentTypes::findOrFail($id);

        return view('contenttypes.show', compact('contenttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $contenttype = ContentTypes::findOrFail($id);

        return view('contenttypes.edit', compact('contenttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $contenttype = ContentTypes::findOrFail($id);
        $contenttype->update($request->all());

        Session::flash('flash_message', 'ContentTypes successfully updated!');

        return redirect('contenttypes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        ContentTypes::destroy($id);

        Session::flash('flash_message', 'ContentTypes successfully deleted!');

        return redirect('contenttypes');
    }

}
