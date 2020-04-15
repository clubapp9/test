<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentReplies extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contentreplies';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['content_parent_id', 'content_reply_id'];

}
