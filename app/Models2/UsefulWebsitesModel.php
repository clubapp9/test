<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsefulWebsitesModel extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'useful_websites';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'website', 'message'];

}
