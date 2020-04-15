<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContentEntryModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'content_entries';
    protected $primaryKey = 'content_entry_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'category_id', 'content_type_id', 'content_title', 'content', 'link', 'working_group_id' ];

    public function getLatestEntries($category_id, $amount) {

        $latest_entries = DB::select('SELECT * FROM content_entries INNER JOIN users ON users.id = content_entries.user_id
                    WHERE content_entries.category_id=:category_id', [ 'category_id' => $category_id ]);

        return $latest_entries;
    }
}
