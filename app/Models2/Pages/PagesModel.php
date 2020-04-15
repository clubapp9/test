<?php

namespace App\Models\Pages;

//use Cviebrock\EloquentSluggable\SluggableInterface;
//use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PagesModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    use SoftDeletes;
    //use SluggableTrait;

    protected $dates = ['deleted_at'];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    protected $guarded  = array('id');

    /**
     * Returns a formatted post content entry,
     * this ensures that line breaks are returned.
     *
     * @return string
     */
    public function content()
    {
        return nl2br($this->content);
    }

    /**
     * Get the post's author.
     *
     * @return User
     */
    public function author()
    {
        return $this->belongsTo('App\Models\Access\User', 'user_id');
    }

    /**
     * Get the post's language.
     *
     * @return Language
     */

    /**
     * Get the post's category.
     *
     * @return PageCategory
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Pages\PageCategoryModel', 'page_category_id');
    }

}
