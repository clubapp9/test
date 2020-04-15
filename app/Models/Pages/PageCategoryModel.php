<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageCategoryModel extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'page_categories';

    protected $dates = ['deleted_at'];

	protected $guarded  = array('id');

	/**
	 * Returns a formatted post content entry,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function description()
	{
		return nl2br($this->description);
	}

	/**
	 * Get the author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Get the slider's images.
	 *
	 * @return array
	 */
	public function pages()
	{
		return $this->hasMany('App\Models\Pages\PageModel');
	}

}
