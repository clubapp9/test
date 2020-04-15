<?php
/**
 * Created by PhpStorm.
 * User: Chris Medina
 * Date: 1/5/16
 * Time: 3:23 AM
 */
namespace App\Http\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
class Pagination {

    public static function getCustomPagination( $query, $pdo_array, $perPage = 10 ) {

        $latest_entries = DB::select($query, $pdo_array );
        // Pagination Manual Settings
        $page = Input::get('page', 1); // Get the current page or default to 1, this is what you miss!
        $offset = ($page * $perPage) - $perPage;

        //Create a new Laravel collection from the array data
        $collection = new Collection($latest_entries);

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice(($page * $perPage) - $perPage, $perPage, true)->all();

        return new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage, $page);

    }

}