<?php
namespace App\Http\Controllers\Frontend\Groups;

use App\Http\Controllers\Controller;
use App\Models\ContentEntryModel;
use App\Models\ContentEntryTypes;
use App\Models\Calendar\EventModel;

use App\Models\WorkingGroupModel;

use App\Models\Forums\ForumsModel;
use App\Models\Forums\ForumsTopicsModel;

use App\Http\Helpers\Pagination;


/**
 * Class FrontendController  -- Controller for LatestDevelopments by default
 * @package App\Http\Controllers\Frontend
 */
class WorkingGroupsController extends Controller
{
    protected $content_menu;

    protected $category_id = '5';

    protected $content_entry_types;

    protected $hasAccess;

    protected $isModerator;

    public function __construct(){
        // Call Parent Constructor
        parent::__construct();

        $this->category_id = '5';

        $this->content_entry_types = (array) ContentEntryTypes::getAssociatedCategory( $this->category_id );

        /**
         * Build Content Menu
         */
        $group_id = request()->route('id');

        $working_group_access = new WorkingGroupModel;

        $this->isModerator = $working_group_access->currentUserIsModeratorOfGroup( $group_id );
        $hasAccess = ( $this->hasAccess = $working_group_access->currentUserHasAccessToGroup( $group_id ) );

        if($group_id) {
            \Menu::make('ContentMenu', function( $menu ) use ($group_id, $hasAccess) {
                if($hasAccess) {
                    $menu->add('ABOUT THIS GROUP', "working_group/$group_id" );
                    $menu->add('RECENT ACTIVITY',    "working_group/$group_id/recent" );
                    $menu->add('FORUM', "working_group/$group_id/forum" );
                    $menu->add('DOCUMENTS',  "working_group/$group_id/documents" );
                    $menu->add('GROUP MEMBERS', "working_group/$group_id/members" );
                } else {
                    $grayed_out = array('link'  => '#',  'class' => 'grayed-out');
                    $menu->add('ABOUT THIS GROUP', "working_group/$group_id" );
                    $menu->add('RECENT ACTIVITY',    $grayed_out );
                    $menu->add('FORUM', $grayed_out );
                    $menu->add('DOCUMENTS',  $grayed_out );
                    $menu->add('GROUP MEMBERS', $grayed_out );
                }
            });
        }
    }

    /** List of Available Groups
     * @return \Illuminate\View\View
     * */
    public function index()
    {
        \Menu::make('ContentMenu', function ($menu ) {
        });

        $header_text = "List of Groups";
        $working_groups = WorkingGroupModel::all('*')->take(100);

        return view( 'frontend.groups.index', compact ( 'working_groups', 'header_text' ) );
    }

    /**
     * @return \Illuminate\View\View
     */
    public function group( $working_group_id = null )
    {
        $working_groups =  WorkingGroupModel::find($working_group_id);

        $header_text = $working_groups->name;

        $page_category = 'GROUP ENTRY';

        $pagination_query = 'SELECT rjg.*, users.first_name, users.last_name, users.email FROM request_join_group rjg
                INNER JOIN users ON users.id = rjg.user_id
                 WHERE working_group_id=:working_group_id';
        $pdo_array = [ 'working_group_id' => $working_group_id ];

        $requests = Pagination::getCustomPagination( $pagination_query, $pdo_array, $this->perPage );
        $requests->setPath( '/working_group/' . $working_group_id );

        return view('frontend.groups.group')->with( [
            'header_text'           => $header_text,
            'content_entry_types'   => $this->content_entry_types,
            'page_category'         => $page_category,
            'category_id'           => $this->category_id,
            'group'                 => $working_groups,
            'requests'              => $requests,
            'isModerator'           => $this->isModerator,
            'hasAccess'             => $this->hasAccess ] );
    }

    /**
     * @return \Illuminate\View\View
     */
    public function recent( $working_group_id = null )
    {
        $working_groups =  WorkingGroupModel::find($working_group_id);

        $pagination_query = 'SELECT ce.content_title, ce.content,ce.created_at, users.first_name,users.last_name, ct.name as content_type_name, ct.fa_icon_name FROM content_entries ce
                INNER JOIN users ON users.id = ce.user_id
                INNER JOIN content_types ct ON ct.content_type_id = ce.content_type_id
                 WHERE ce.category_id=:category_id ORDER BY ce.created_at DESC';
        $pdo_array = [ 'category_id' => $this->category_id ];

        $results = Pagination::getCustomPagination( $pagination_query, $pdo_array, $this->perPage );
        $results->setPath( '/working_group/' . $working_group_id );

        return view('frontend.groups.recent')->with( [
            'header_text'           => 'RECENT ACTIVITY - ' . $working_groups->name,
            'content_entry_types'   => $this->content_entry_types,
            'page_category'         => 'ENTRY',
            'category_id'           => $this->category_id,
            'results'                 => $results,
            'hasAccess'             => $this->hasAccess ] );
    }

    public function forum($forum_id = '1')
    {
        $working_groups =  WorkingGroupModel::find($forum_id);

        $forum = new ForumsModel;
        $object = $forum->where('working_group_id', $forum_id)->get();
        $forum_id =  $object{0}->forum_id;

        $header_text = $working_groups->name . ' - Forum';

        $page_category = 'GROUP ENTRY';

        $topic_creator = new ForumsTopicsModel;

        // Get # of Total Topics
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

        return view('frontend.forums.forum', compact( 'topic_count', 'header_text', 'page_category', 'results', 'forum_id' ));
    }

    public function memberList($working_group_id = null){
        $working_groups =  WorkingGroupModel::find($working_group_id);
        $header_text = $working_groups->name . ' - Member List';
        $page_category = "Members List";

        $query = 'SELECT assn.*, users.* FROM assn_working_groups_users assn
                  INNER JOIN users ON users.id = assn.user_id
                  WHERE assn.working_group_id=:working_group_id ORDER BY users.first_name';
        $pdo_array = [ 'working_group_id' => $working_group_id ];

        $results = Pagination::getCustomPagination( $query, $pdo_array, $this->perPage );
        $results->setPath( '/resources/member-list/' );

        return view('frontend.groups.member-list')->with( [
            'page_category' => $page_category,
            'header_text'   => $header_text,
            'content_entry_types' => $this->content_entry_types,
            'category_id' => $this->category_id,
            'results' => $results  ] );
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }

}
