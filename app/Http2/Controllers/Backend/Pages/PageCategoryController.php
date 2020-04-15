<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;

use App\Models\Pages\PageCategoryModel;
use App\Http\Requests\Backend\Pages\PageCategoryRequest;
use Illuminate\Support\Facades\Auth;
use Session;

class PageCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $page_categories = PageCategoryModel::paginate(15);

        return view('backend.page_categories.index', compact('page_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.page_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PageCategoryRequest $request)
    {
        $pagecategory = new PageCategoryModel($request->all());
        $pagecategory->user_id = Auth::id();
        $pagecategory->save();

        Session::flash('flash_message', 'page_categories successfully added!');

        return redirect('admin/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $page_category = PageCategoryModel::findOrFail($id);

        return view('backend.page_categories.show', compact('page_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $page_category = PageCategoryModel::findOrFail($id);

        return view('backend.page_categories.edit', compact('page_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, PageCategoryRequest $request)
    {
        
        $page_category = PageCategoryModel::findOrFail($id);
        $page_category->update($request->all());

        Session::flash('flash_message', 'page_categories successfully updated!');

        return redirect('backend.page_categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        PageCategoryModel::destroy($id);

        Session::flash('flash_message', 'page_categories successfully deleted!');

        return redirect('backend.page_categories');
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
