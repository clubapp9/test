<?php

namespace App\Http\Controllers\Frontend\Forums;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Forums\ForumsModel;
use App\Models\Forums\ForumsTopicsModel;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use App\Http\Helpers\Pagination;

class ForumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($forum_id = '1')
    {
        $topic_creator = new ForumsTopicsModel;

        // Get Last Comment for entire Forum
        $results = $topic_creator->where('forum_id', $forum_id)->orderBy('created_at', 'DESC')->get();
        $topic_count = $results->count();

        // Topic Pagination
        $query = 'SELECT ft.*,
                    (SELECT COUNT(ftr.user_id) FROM forums_topics_replies ftr WHERE ft.forum_topic_id = ftr.forum_topic_id) as posts,
                    (SELECT COUNT(DISTINCT ftr.user_id) FROM forums_topics_replies ftr WHERE ft.forum_topic_id = ftr.forum_topic_id) as voices,
                    (SELECT CONCAT(users.first_name, " ", users.last_name) FROM forums_topics_replies ftr, users WHERE ft.forum_topic_id = ftr.forum_topic_id AND ftr.user_id = users.id ORDER BY ftr.created_at DESC LIMIT 1) as last_reply
                    FROM forums_topics ft
                    WHERE ft.forum_id=:forum_id ORDER BY created_at DESC';
        $pdo_array= [ 'forum_id' => $forum_id ];

        $results = Pagination::getCustomPagination( $query, $pdo_array, 8 );
        $results->setPath( '/forum/' . $forum_id );

        return view('frontend.forums.forum', compact('topic_count', 'results'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('forums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        ForumsModel::create($request->all());

        Session::flash('flash_message', 'Forums successfully added!');

        return redirect('forums');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $forum = ForumsModel::findOrFail($id);

        return view('forums.show', compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $forum = ForumsModel::findOrFail($id);

        return view('forums.edit', compact('forum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $forum = ForumsModel::findOrFail($id);
        $forum->update($request->all());

        Session::flash('flash_message', 'Forums successfully updated!');

        return redirect('forums');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        ForumsModel::destroy($id);

        Session::flash('flash_message', 'Forums successfully deleted!');

        return redirect('forums');
    }

}
