<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusCodes extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'statuscodes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['status_code', 'description'];

}
