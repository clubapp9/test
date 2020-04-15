<?php namespace App\Http\Requests\Backend\Pages;

use App\Http\Requests\Request;

class PageRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'title' => 'required|min:3',
            'page_category_id' => 'required|integer',
            'content' => 'required|min:20',
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}
