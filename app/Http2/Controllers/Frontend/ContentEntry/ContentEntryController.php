<?php

namespace App\Http\Controllers\Frontend\ContentEntry;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Auth;
use App\Models\ContentEntryModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ContentEntryController extends Controller
{
    protected $page_category;

    /*public function __construct($page_category) {
        $this->page_category = $page_category;
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ContentEntryModel = ContentEntryModel::paginate(15);

        return view('ContentEntryModel.index', compact('ContentEntryModel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ContentEntryModel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if($request->content_type_id == '2' ) {
            $this->validate($request, ['content_type_id' => 'required', 'content_title' => 'required', 'link' => 'required|url' ]);
        }else {
            $this->validate($request, ['content_type_id' => 'required', 'content_title' => 'required', 'content' => 'required', 'link' => 'url' ]);
        }

        $content_entry_model = new ContentEntryModel($request->all());

        // working group id?
        if(isset( $request->working_group_id )) {
            $this->validate($request, ['working_group_id' => 'int'] );
            $content_entry_model->working_group_id = $request->working_group_id;
        }

        $content_entry_model = new ContentEntryModel($request->all());
        $content_entry_model->user_id = Auth::id();
        $content_entry_model->save();

        Session::flash('flash_message', 'Entry successfully added!');

        return redirect( $request->server('HTTP_REFERER') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    /*public function show($id)
    {
        $contententry = ContentEntryModel::findOrFail($id);

        return view('ContentEntryModel.show', compact('contententry'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $contententry = ContentEntryModel::findOrFail($id);

        return view('ContentEntryModel.edit', compact('contententry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['content_type_id' => 'required', ]);

        $contententry = ContentEntryModel::findOrFail($id);
        $contententry->update($request->all());

        Session::flash('flash_message', 'ContentEntryModel successfully updated!');

        return redirect('ContentEntryModel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        ContentEntryModel::destroy($id);

        Session::flash('flash_message', 'ContentEntryModel successfully deleted!');

        return redirect('ContentEntryModel');
    }

}
