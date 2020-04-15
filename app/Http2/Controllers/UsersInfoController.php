<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UsersInfo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class UsersInfoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $usersinfos = UsersInfo::paginate(15);

        return view('usersinfo.index', compact('usersinfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('usersinfo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['first_name' => 'required', 'last_name' => 'required', 'email' => 'required', ]);

        UsersInfo::create($request->all());

        Session::flash('flash_message', 'UsersInfo successfully added!');

        return redirect('usersinfo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $usersinfo = UsersInfo::findOrFail($id);

        return view('usersinfo.show', compact('usersinfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $usersinfo = UsersInfo::findOrFail($id);

        return view('usersinfo.edit', compact('usersinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['first_name' => 'required', 'last_name' => 'required', 'email' => 'required', ]);

        $usersinfo = UsersInfo::findOrFail($id);
        $usersinfo->update($request->all());

        Session::flash('flash_message', 'UsersInfo successfully updated!');

        return redirect('usersinfo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        UsersInfo::destroy($id);

        Session::flash('flash_message', 'UsersInfo successfully deleted!');

        return redirect('usersinfo');
    }

}
