<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\StatusCodes;
use App\Models\CsvData;
use App\Models\Access\User\User;
use App\Models\AssnCollectorAccounts;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class SettingsController extends Controller
{

    public function index(){
        return view('backend.settings.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function statuscodes()
    {
        $statuscodes = StatusCodes::paginate(15);

        return view('backend.settings.statuscodes', compact('$statuscodes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['first_name' => 'required', 'last_name' => 'required', ]);

        Portfolio::create($request->all());

        Session::flash('flash_message', 'Portfolio added!');

        return redirect('portfolio');
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
    }

}
