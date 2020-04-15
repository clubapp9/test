<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContentEntryModel;
use App\Models\ContentEntryTypes;
use App\Models\Calendar\EventModel;

use App\Http\Helpers\Pagination;

use MaddHatter\LaravelFullcalendar\Event;
/**
 * Class FrontendController  -- Controller for LatestDevelopments by default
 * @package App\Http\Controllers\Frontend
 */
class ResourcesController extends Controller
{
    protected $content_menu;

    protected $category_id = '2';

    protected $content_entry_types;

    public function __construct() {
        // Call Parent Constructor
        parent::__construct();

        $this->category_id = '2';
        $this->content_entry_types = (array) ContentEntryTypes::getAssociatedCategory( $this->category_id );

        /**
         * Build Content Menu
         */
        \Menu::make('ContentMenu', function( $menu ){
            $menu->add('TEACHING RESOURCES', 'resources' );
            $menu->add('EVENT CALENDAR',    'resources/calendar');
            $menu->add('SPEAKERS BUREAU', 'resources/speakers-bureau');
            $menu->add('MEMBER LIST',  'resources/member-list');
            $menu->add('USEFUL WEBSITES', 'resources/useful-websites');
        });
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page_category = "RESOURCE";
        $header_text = 'Resources';

        $pagination_query = 'SELECT ce.content_title, ce.content,ce.created_at, users.first_name,users.last_name, ct.name as content_type_name, ct.fa_icon_name FROM content_entries ce
                INNER JOIN users ON users.id = ce.user_id
                INNER JOIN content_types ct ON ct.content_type_id = ce.content_type_id
                 WHERE ce.category_id=:category_id ORDER BY ce.created_at DESC';
        $pdo_array = [ 'category_id' => $this->category_id ];

        $results = Pagination::getCustomPagination( $pagination_query, $pdo_array, $this->perPage );
        $results->setPath( '/resources/' );
        return view('frontend.resources.index')->with( [
            'header_text'           => $header_text,
            'content_entry_types'   => $this->content_entry_types,
            'page_category'         => $page_category,
            'category_id'           => $this->category_id,
            'results'               => $results ] );
    }

    /**
     * @return \Illuminate\View\View
     */
    public function calendar()
    {
        $page_category = "Resources Calendar";
        $events = [];
        $calendar=[];

        $eloquentEvent = EventModel::orderBy('start', 'ASC')->take(500)->get(); //EventModel implements MaddHatter\LaravelFullcalendar\Event

        foreach($eloquentEvent as $event_object) {
                if(isset($event_object->title)) {
                    $events[] = \Calendar::event(
                        $event_object->title, //event title
                        false, //full day event?
                        new \DateTime($event_object->start), //start time (you can also use Carbon instead of DateTime)
                        new \DateTime($event_object->end), //end time (you can also use Carbon instead of DateTime)
                        'stringEventId' //optionally, you can specify an event ID
                    );
                }
        }
        if($eloquentEvent) {
            $calendar = \Calendar::addEvents($events) //add an array with addEvents
            ->setOptions([ //set fullcalendar options
                'firstDay' => 1,
                'header' => [  'left' => 'title', 'center' => "month,agendaWeek,agendaDay", 'right' =>  'today prev,next']
            ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
                'viewRender' => 'function() { }'
            ]);
        }

        return view('frontend.resources.calendar')->with( [
            'calendar' => $calendar ,
            'page_category' => $page_category,
            'category_id' => $this->category_id ] );
    }

    public function speakersBureau(){
        $page_category = "Speakers Bureau";

        $query = 'SELECT * FROM users WHERE speakers_bureau=:speaker';
        $pdo_array = [ 'speaker' => 'true' ];

        $results = Pagination::getCustomPagination( $query, $pdo_array, $this->perPage );
        $results->setPath('resources/speakers-bureau');

        // SELECT * FROM users WHERE spakers_bureau='true'
        return view('frontend.resources.speakers-bureau')->with( [
            'page_category' => $page_category,
            'content_entry_types' => $this->content_entry_types,
            'category_id' => $this->category_id,
            'results' => $results  ] );
    }

    public function memberList(){
        $page_category = "Members List";

        $query = 'SELECT * FROM users WHERE 1 ORDER BY first_name';
        $pdo_array = [];

        $results = Pagination::getCustomPagination( $query, $pdo_array, $this->perPage );
        $results->setPath( '/resources/member-list/' );

        return view('frontend.resources.member-list')->with( [
            'page_category' => $page_category,
            'content_entry_types' => $this->content_entry_types,
            'category_id' => $this->category_id,
            'results' => $results  ] );
    }

    public function usefulWebsites(){
        $page_category = "Useful Websites";

        $query = 'SELECT * FROM useful_websites uw INNER JOIN users ON users.id = uw.user_id WHERE 1 ORDER BY uw.created_at DESC';
        $pdo_array = [];

        $results = Pagination::getCustomPagination( $query, $pdo_array, $this->perPage );
        $results->setPath('/resources/useful-websites/');

        return view('frontend.resources.useful-websites')->with( [
            'page_category' => $page_category,
            'content_entry_types' => $this->content_entry_types,
            'category_id' => $this->category_id,
            'websites' => $results  ] );
    }
    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }

}
