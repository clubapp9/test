<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentEntry extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contententries';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['content_type_id', 'content'];

}
