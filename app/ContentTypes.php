<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentTypes extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contenttypes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

}
