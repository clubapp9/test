<?php

namespace App\Http\Controllers\Frontend\Groups;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Groups\RequestJoinGroup;
use App\Models\WorkingGroupModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\DB as DB;

use Illuminate\Support\Facades\Auth;

class RequestJoinGroupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        /*$requestjoingroup = RequestJoinGroup::paginate(15);

        return view('requestjoingroup.index', compact('requestjoingroup'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //return view('requestjoingroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['working_group_id' => 'required', ]);

        $request_join = new RequestJoinGroup($request->all());

        $result = $request_join::query( 'SELECT id FROM requests WHERE working_group_id=:working_group_iduser_id=:user_id' ,
            [ 'working_group_id' => $request->working_group_id, 'user_id' => Auth::id() ] )->first();
        if(isset($result)) {
            Session::flash('flash_message', 'Request already sent to Administrator to join this group' );
            return redirect( $request->server('HTTP_REFERER') );
        }

        $request_join->user_id = Auth::id();
        $request_join->save();

        Session::flash('flash_message', 'Request to Join added!');

        return redirect( $request->server('HTTP_REFERER') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requestjoingroup = RequestJoinGroup::findOrFail($id);

        return view('requestjoingroup.show', compact('requestjoingroup'));
    }

    /**
     * Used for "EDITING" or APPROVING users who request to join group
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $request_join_group = RequestJoinGroup::find( $id );

        $user_working_groups = WorkingGroupModel::getGroupsUserModerates( Auth::id() );

        // User has permission update and delete item
        if(in_array( $request_join_group->working_group_id , $user_working_groups )) {

            Db::table('assn_working_groups_users')->insert( [
                'working_group_id' => $request_join_group->working_group_id,
                'user_id' => $request_join_group->user_id ] );

            RequestJoinGroup::destroy($id);

            Session::flash('flash_message', 'User successfully added!');

        }

        $requestjoingroup = RequestJoinGroup::findOrFail($id);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $request_join_group = RequestJoinGroup::find( $id );

        $user_working_groups = WorkingGroupModel::getGroupsUserModerates( Auth::id() );
        $user_working_groups = iterator_to_array(new \RecursiveIteratorIterator(
            new \RecursiveArrayIterator($user_working_groups)), FALSE);

        // User has permission update and delete item
        if(in_array( $request_join_group->working_group_id , $user_working_groups )) {

            Db::table('assn_working_groups_users')->insert( [
                'working_group_id' => $request_join_group->working_group_id,
                'user_id' => $request_join_group->user_id ] );

            RequestJoinGroup::destroy($id);

            Session::flash('flash_message', 'User successfully added!');

        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id  -  id of the request_join_groups table
     *
     * @return Response
     */
    public function destroy($id)
    {
        $request_join_group = RequestJoinGroup::find( $id );

        $user_working_groups = WorkingGroupModel::getGroupsUserModerates( Auth::id() );

        // flatten array
        $user_working_groups = iterator_to_array(new \RecursiveIteratorIterator(
            new \RecursiveArrayIterator($user_working_groups)), FALSE);

        // User has permission to delete item
        if(isset($request_join_group->working_group_id)) {
            if(array_search( $request_join_group->working_group_id , $user_working_groups )) {

                RequestJoinGroup::destroy($id);

                Session::flash('flash_message', 'Request from user deleted!');

            } else {
                Session::flash('flash_message', 'You are not authorized to edit this user request for this group!');
            }
        }

        return redirect()->back();
    }

}
