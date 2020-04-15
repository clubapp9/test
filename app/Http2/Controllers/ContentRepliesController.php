<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ContentReplies;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ContentRepliesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contentreplies = ContentReplies::paginate(15);

        return view('contentreplies.index', compact('contentreplies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('contentreplies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        ContentReplies::create($request->all());

        Session::flash('flash_message', 'ContentReplies successfully added!');

        return redirect('contentreplies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $contentreply = ContentReplies::findOrFail($id);

        return view('contentreplies.show', compact('contentreply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $contentreply = ContentReplies::findOrFail($id);

        return view('contentreplies.edit', compact('contentreply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $contentreply = ContentReplies::findOrFail($id);
        $contentreply->update($request->all());

        Session::flash('flash_message', 'ContentReplies successfully updated!');

        return redirect('contentreplies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        ContentReplies::destroy($id);

        Session::flash('flash_message', 'ContentReplies successfully deleted!');

        return redirect('contentreplies');
    }

}
