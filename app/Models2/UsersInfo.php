<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersInfo extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usersinfos';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'title', 'organization', 'email', 'phone', 'picture', 'speakers_bureau', 'short_bio', 'area_of_expertise'];

}
