<?php

namespace App\Http\Controllers\Frontend\Forums;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Models\Forums\ForumsModel;
use App\Models\Forums\ForumsTopicsModel;
use App\Models\Forums\ForumsTopicsRepliesModel;

use App\Models\WorkingGroupModel;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ForumsTopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( $topic_id = 1 )
    {
        $working_group = new WorkingGroupModel;
        $forum = new ForumsModel;
        $forumTopic = new ForumsTopicsModel;
        $forumReplies = new ForumsTopicsRepliesModel;

        // Working Group Test
        $working_group->currentUserHasAccessToGroup( '2' );

        $get_forum_id = $forumTopic->where( 'forum_topic_id', $topic_id )->get();

        // Check Permissions
        $forums = $forum->where( 'forum_id', $get_forum_id{0}->forum_id )->get();
        $group = $forums{0}->working_group_id;

        if( $group )
        { // If Group was Found Verify Access
            $working_group = new WorkingGroupModel;
            $group_found = $working_group->userHasAccessToGroup( $group, Auth::id() );
            if( $group_found ) {
                //echo 'YOU HAVE ACCESS';
            } else {
                throw new \Exception( ' You do not have access to this forum. Group ID:' . $group );
            }
        }

        // Get Topic Info
        $results_topic = ForumsTopicsModel::find($topic_id);

        // Get Topic Replies
        $results_replies = ForumsTopicsRepliesModel::with(['user' => function ($query) {
        }])->where('forum_topic_id' , $topic_id)->orderBy('created_at', 'ASC')->get();

        return view ('frontend.forums.forum-topic', compact( 'reply_count', 'topic_id', 'results_topic', 'results_replies' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('forumstopics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['topic' => 'required', 'message' => 'required', ]);

        $forums_topics = new ForumsTopicsModel($request->all());
        $forums_topics->user_id = Auth::id();
        $forums_topics->save();

        Session::flash('flash_message', 'ForumsTopics successfully added!');

        return redirect($request->server('HTTP_REFERER'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $forumstopic = ForumsTopicsModel::findOrFail($id);

        return view('forumstopics.show', compact('forumstopic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $forumstopic = ForumsTopicsModel::findOrFail($id);

        return view('forumstopics.edit', compact('forumstopic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['topic' => 'required', 'message' => 'required', ]);

        $forumstopic = ForumsTopicsModel::findOrFail($id);
        $forumstopic->update($request->all());

        Session::flash('flash_message', 'ForumsTopics successfully updated!');

        return redirect('forumstopics');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        ForumsTopicsModel::destroy($id);

        Session::flash('flash_message', 'ForumsTopics successfully deleted!');

        return redirect('forumstopics');
    }

}
