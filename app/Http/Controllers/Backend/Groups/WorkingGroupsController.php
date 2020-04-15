<?php

namespace App\Http\Controllers\Backend\Groups;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\WorkingGroupModel;
use App\Models\Forums\ForumsModel;
use App\Models\UsersModel;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class WorkingGroupsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $workinggroups = WorkingGroupModel::paginate(15);

        return view('backend.workinggroups.index', compact('workinggroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = UsersModel::all('*')->take('100');

        return view('backend.workinggroups.create', compact( 'users' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'moderator_id' => 'required', 'about' => 'required', ]);

        $working_group = WorkingGroupModel::create($request->all());

        // Create New Forum for Working Group
        $forum = new ForumsModel;
        $forum->working_group_id = $working_group->working_group_id;
        $forum->description = $request->about;
        $forum->save();

        Session::flash('flash_message', 'WorkingGroups successfully added!');

        return redirect( $request->server('HTTP_REFERER') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $workinggroup = WorkingGroupModel::findOrFail($id);

        return view('workinggroups.show', compact('workinggroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $workinggroup = WorkingGroupModel::findOrFail($id);

        return view('backend.workinggroups.edit', compact('workinggroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['name' => 'required', 'moderator_id' => 'required', 'about' => 'required', ]);

        $workinggroup = WorkingGroupModel::findOrFail($id);
        $workinggroup->update($request->all());

        Session::flash('flash_message', 'WorkingGroups successfully updated!');

        return redirect('workinggroups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        WorkingGroupModel::destroy($id);

        // Create New Forum for Working Group
        $forum = new ForumsModel;
        $forum->working_group_id = $working_group->working_group_id;
        $forum->description = $request->about;
        $forum->save();

        Session::flash('flash_message', 'WorkingGroups successfully deleted!');

        return redirect()->back();
    }

}
