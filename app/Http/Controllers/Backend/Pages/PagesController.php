<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pages\PagesModel;
use App\Models\Pages\PageCategoryModel;
use App\Http\Requests\Backend\Pages\PageRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Datatables;
use Session;

class PagesController extends Controller
{
    public function __construct()
    {
        view()->share('type', 'page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = PagesModel::paginate(15);

        return view('backend.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = PageCategoryModel::lists( 'title', 'id' )->toArray();;

        return view('backend.pages.create')->with( compact('categories') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PageRequest $request)
    {
        $page = new PagesModel($request->all());
        $page->user_id = Auth::id();
        $page->save();

        Session::flash('flash_message', 'Pages successfully added!');

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
        $page = PagesModel::findOrFail($id);

        return view('backend.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $page = PagesModel::findOrFail($id);

        return view('backend.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param PageRequest $request
     * @return Response
     */
    public function update($id, PageRequest $request)
    {
        $page = PagesModel::findOrFail($id);
        $page->update($request->all());

        Session::flash('flash_message', 'Pages successfully updated!');

        return redirect('admin/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        PagesModel::destroy($id);

        Session::flash('flash_message', 'Pages successfully deleted!');

        return redirect('admin/pages');
    }

    /**
     * Show a list of all the  posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $article = PagesModel::join('article_categories', 'article_categories.id', '=', 'articles.article_category_id')
            ->select(array('articles.id','articles.title','article_categories.title as category',
                'articles.created_at'));

        return Datatables::of($article)
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/article/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/article/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                    <input type="hidden" name="row" value="{{$id}}" id="row">')
            ->remove_column('id')

            ->make();
    }

}
