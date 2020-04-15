<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Notes extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notes';

    /**
     * Attributes that should be mass-assignable.
     *
     *   user_id  is the user who created the note entry in the first place
     *
     * @var array
     */
    protected $fillable = [ 'user_id', 'account_id', 'note' ];

    public function getNotesByAccountId( $account_id ) {
        $query = 'SELECT n.note, n.created_at, u.collector_id FROM notes n
                  LEFT JOIN users u ON ( u.id = n.user_id )
                  WHERE account_id=:account_id ORDER BY n.created_at DESC';

        $notes = DB::select( $query, [ 'account_id' => $account_id ]);

        return $notes;
    }

}
