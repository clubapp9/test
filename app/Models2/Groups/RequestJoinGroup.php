<?php

namespace App\Models\Groups;

use Illuminate\Database\Eloquent\Model;

class RequestJoinGroup extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'request_join_group';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['working_group_id'];

    public $timestamps  = false;

}
