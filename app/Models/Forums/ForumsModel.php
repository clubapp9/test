<?php

namespace App\Models\Forums;

use Illuminate\Database\Eloquent\Model;

class ForumsModel extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'forums';

    protected $primaryKey = 'forum_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['working_group_id', 'description'];

}
