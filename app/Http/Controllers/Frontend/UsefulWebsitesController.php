<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\UsefulWebsitesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Session;

class UsefulWebsitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $usefulwebsite = UsefulWebsitesModel::paginate(15);

        return view('usefulwebsite.index', compact('usefulwebsite'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('usefulwebsite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate( $request, [ 'website' => 'required|url', 'title' => 'required' ] );

        $usefulwebsite = new UsefulWebsitesModel($request->all());
        $usefulwebsite->user_id = Auth::id();
        $usefulwebsite->save();

        Session::flash('flash_message', 'UsefulWebsite added!');

        return redirect( $request->server( 'HTTP_REFERER') );
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
        $usefulwebsite = UsefulWebsitesModel::findOrFail($id);

        return view('usefulwebsite.show', compact('usefulwebsite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usefulwebsite = UsefulWebsitesModel::findOrFail($id);

        return view('usefulwebsite.edit', compact('usefulwebsite'));
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
        $this->validate($request, ['website' => 'required', ]);

        $usefulwebsite = UsefulWebsitesModel::findOrFail($id);
        $usefulwebsite->update($request->all());

        Session::flash('flash_message', 'UsefulWebsite updated!');

        return redirect('usefulwebsite');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        UsefulWebsitesModel::destroy($id);

        Session::flash('flash_message', 'UsefulWebsite deleted!');

        return redirect('usefulwebsite');
    }

}
