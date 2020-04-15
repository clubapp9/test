<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestsModel extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'requests';
    protected $primaryKey = 'request_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'request_type', 'request_message'];

}
