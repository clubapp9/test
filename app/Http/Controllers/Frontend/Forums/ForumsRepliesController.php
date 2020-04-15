<?php

namespace App\Http\Controllers\Frontend\Forums;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Models\Forums\ForumsTopicsRepliesModel;

use App\Models\WorkingGroupModel;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ForumsRepliesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ForumsTopicsRepliesModel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validate($request, ['message' => 'required' ]);

        $forumTopicReply = new ForumsTopicsRepliesModel($request->all());
        $forumTopicReply->user_id = Auth::id();
        $forumTopicReply->save();
        Session::flash('flash_message', 'ForumsTopicsReplies successfully added!');

        return redirect( $request->server('HTTP_REFERER') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $forumstopicsreply = ForumsTopicsRepliesModel::findOrFail($id);

        return view('ForumsTopicsRepliesModel.show', compact('forumstopicsreply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $forumstopicsreply = ForumsTopicsRepliesModel::findOrFail($id);

        return view('ForumsTopicsRepliesModel.edit', compact('forumstopicsreply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['message' => 'required', ]);

        $forumstopicsreply = ForumsTopicsRepliesModel::findOrFail($id);
        $forumstopicsreply->update($request->all());

        Session::flash('flash_message', 'ForumsTopicsReplies successfully updated!');

        return redirect('ForumsTopicsRepliesModel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        ForumsTopicsRepliesModel::destroy($id);

        Session::flash('flash_message', 'ForumsTopicsReplies successfully deleted!');

        return redirect('ForumsTopicsRepliesModel');
    }

}
