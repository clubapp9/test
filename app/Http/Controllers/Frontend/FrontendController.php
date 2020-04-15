<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Portfolio;
use App\Models\CsvData;

use Illuminate\Support\Facades\Auth;

use App\Http\Helpers\Pagination;
use Illuminate\Support\Facades\Input;
/**
 * Class FrontendController  -- Controller for LatestDevelopments by default
 * @package App\Http\Controllers\Frontend
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */

    public function index()
    {
        //ToDo:  Enforce role permissions
        //Show all sheets
        $Portfolio = new CsvData();
        //$portfolio_ids = $Portfolio->getAllPortfolios();

        //List "My Accounts" by default for user


        $my_accounts = '';

        return view('frontend.index')->with( compact( 'portfolio_ids', 'my_accounts', 'sheets' ));
    }

    public function archive()
    {
        $content_menu = 'LATEST DEVELOPMENTS';
        $page_category = "LATEST DEVELOPMENT";
        $category_id = '1';
        $category_id2 = '2';
        $category_id3 = '3';
        $category_id4 = '4';

        $content_entry_types = (array) ContentEntryTypes::getAssociatedCategory( $category_id );

        // Event Calendar
        $content_entry_types3 = (array) ContentEntryTypes::getAssociatedCategory( $category_id3 );

        $content_entry_types = array_merge($content_entry_types, $content_entry_types3);

        // Teaching Resources
        $content_entry_types2 = (array) ContentEntryTypes::getAssociatedCategory( $category_id2 );

        foreach( $content_entry_types2 as $sub_object ) {
            foreach($sub_object as $key => &$value) {
                if( $key == 'name' ) {
                    $sub_object->$key = 'Teaching Resource - ' . $value;
                }
            }
        }

        $content_entry_types = array_merge($content_entry_types, $content_entry_types2);

        // Useful Websites
        $content_entry_types4= (array) ContentEntryTypes::getAssociatedCategory( $category_id4 );

        $content_entry_types = array_merge($content_entry_types, $content_entry_types4);


        $query = 'SELECT ce.content_title, ce.content,ce.created_at, users.name, ct.name as content_type_name, ct.fa_icon_name FROM content_entries ce
                INNER JOIN users ON users.id = ce.user_id
                INNER JOIN content_types ct ON ct.content_type_id = ce.content_type_id
                 WHERE ce.category_id=:category_id OR ce.category_id=:category_id2 OR ce.category_id=:category_id3
                  OR ce.category_id=:category_id4 ORDER BY ce.created_at DESC LIMIT 1000000 OFFSET 5';

        $pdo_array = [ 'category_id' => $category_id, 'category_id2' => $category_id2,
            'category_id3' => $category_id3, 'category_id4' => $category_id4];

        $results = Pagination::getCustomPagination( $query, $pdo_array, $this->perPage );
        $results->setPath('/archive/');
        return view('frontend.index')->with( compact( 'content_menu', 'content_entry_types', 'page_category', 'results', 'category_id' ));
    }


    /**
     * Return view that takes @param url and loads in an iframe
     */
    public function iframe() {
        $url = Input::get('url');
        $p = Input::get('p');
        return view('frontend.iframe')->with( compact( 'url', 'p' ));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}
