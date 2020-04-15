<?php
/**
 * Created by PhpStorm.
 * User: Chris Medina
 * Date: 12/28/15
 * Time: 9:43 PM
 */

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ContentEntryTypes {

    protected $category;
    protected $filter = array();

    public static function getAssociatedCategory( $category_id, $filter = null ) {
        // Option to use -  DB::Select ( $raw_query_goes_here );

        $users = DB::Select('SELECT ct.name, ct.content_type_id FROM assn_categories_types act
INNER JOIN content_types ct ON ct.content_type_id = act.content_type_id
WHERE page_category_id=:category_id', [ 'category_id' => $category_id ]);

        return $users;
    }
}