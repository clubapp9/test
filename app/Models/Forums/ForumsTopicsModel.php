<?php

namespace App\Models\Forums;

use Illuminate\Database\Eloquent\Model;

class ForumsTopicsModel extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'forums_topics';

    protected $primaryKey = 'forum_topic_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['forum_id', 'user_id', 'topic', 'message'];

   public function user()
    {
        return $this->belongsTo('App\Models\UsersModel');
    }

    /**
     * Get the forumtopicsReplies records associated with the user.
     */
    public function forumsTopicsReplies()
    {
        return $this->hasMany( 'App\Models\Forums\ForumsTopicsRepliesModel', 'forum_topic_id' );
    }

}
