<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;

use App\Models\Pages\PageCategoryModel;
use App\Http\Requests\Backend\Pages\PageCategoryRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class legacyPageCategoryController extends Controller {

    public function __construct()
    {
        view()->share('type', 'articlecategory');
    }
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('admin.articlecategory.index');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.articlecategory.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PageCategoryRequest $request)
    {
        $pagecategory = new PageCategoryModel($request->all());
        $pagecategory -> user_id = Auth::id();
        $pagecategory -> save();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(PageCategoryModel $articlecategory)
    {
        return view('admin.articlecategory.create_edit',compact('articlecategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(PageCategoryRequest $request, PageCategoryModel $articlecategory)
    {
        $articlecategory -> user_id_edited = Auth::id();
        $articlecategory -> update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */

    public function delete(PageCategoryModel $articlecategory)
    {
        return view('admin.articlecategory.delete', compact('articlecategory'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy(PageCategoryModel $articleCategory)
    {
        $articleCategory->delete();
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $article_categories = PageCategoryModel::join('languages', 'languages.id', '=', 'article_categories.language_id')
            ->select(array('article_categories.id','article_categories.title', 'languages.name', 'article_categories.created_at'))
            ->orderBy('article_categories.position', 'ASC');

        return Datatables::of($article_categories)
           ->add_column('actions', '<a href="{{{ URL::to(\'admin/articlecategory/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                <a href="{{{ URL::to(\'admin/articlecategory/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                <input type="hidden" name="row" value="{{$id}}" id="row">')
            ->remove_column('id')

            ->make();
    }

    /**
     * Reorder items
     *
     * @param items list
     * @return items from @param
     */
    public function getReorder(ReorderRequest $request) {
        $list = $request->list;
        $items = explode(",", $list);
        $order = 1;
        foreach ($items as $value) {
            if ($value != '') {
                ArticleCategory::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }

}
