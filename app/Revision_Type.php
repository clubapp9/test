<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision_Type extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'revision_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['revision_type'];

}
