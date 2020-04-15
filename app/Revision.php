<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'revisions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['revision_type_id', 'action_log', 'notes'];

}
