<?php

namespace App\Models\Forums;

use Illuminate\Database\Eloquent\Model;

class ForumsTopicsRepliesModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'forums_topics_replies';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['forum_topic_id', 'reply_to_specific_id', 'message'];

    public function user()
    {
        return $this->belongsTo('App\Models\UsersModel');
    }

    public function forumsTopics()
    {
        return $this->belongsTo('App\Models\ForumsTopicsModel', 'forum_topic_id', 'forum_topic_id' );
    }

}
