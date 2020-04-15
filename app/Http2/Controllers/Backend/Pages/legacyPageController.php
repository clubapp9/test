<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;

use App\Models\Pages\PagesModel;
use App\Models\Pages\PageCategory;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Backend\Pages\PageRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

use Faker\Factory as Faker;

class PageController extends Controller {

     /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $articlecategories = PageCategory::lists('title', 'id')->toArray();
        // Show the page
        return view('backend.pages.index')->with(compact('articlecategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $articlecategories = PageCategory::lists('title', 'id')->toArray();
        return view('backend.pages.create_edit', compact('articlecategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PageRequest $request)
    {
        $article = new PagesModel($request->except('image'));
        $article -> user_id = Auth::id();

        $article -> save();

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Page $article)
    {
        $articlecategories = PageCategory::lists('title', 'id')->toArray();
        return view('backend.pages.create_edit',compact('article','articlecategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(PageRequest $request, Article $article)
    {
        $article -> user_id = Auth::id();
        $picture = "";
        if(Input::hasFile('image'))
        {
            $file = Input::file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $article -> picture = $picture;
        $article -> update($request->except('image'));

        if(Input::hasFile('image'))
        {
            $destinationPath = public_path() . '/images/article/'.$article->id.'/';
            Input::file('image')->move($destinationPath, $picture);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */

    public function delete(Page $article)
    {
        return view('admin.article.delete', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy(Page $article)
    {
        $article->delete();
    }


    /**
     * Show a list of all the  posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $article = Page::join('article_categories', 'article_categories.id', '=', 'articles.article_category_id')
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
