<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function workingGroup()
    {
        return $this->belongsTo('App\Models\Groups\WorkingGroupModel', 'moderator_id');
    }

    /**
     * Get the forumtopics records associated with the user.
     */
    public function forumsTopics()
    {
        return $this->hasMany('App\Models\Forums\ForumsTopicsModel');
    }

    /**
     * Get the forumtopicsReplies records associated with the user.
     */
    public function forumsTopicsReplies()
    {
        return $this->belongsTo('App\Models\Forums\ForumsTopicsRepliesModel');
    }
}
