<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\RequestsModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $requests = RequestsModel::paginate(15);

        return view('requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $requests = new RequestsModel($request->all());

        if( $request->request_type == 'suggest_member' ) {
            $this->validate($request, [ 'request_type' => 'required', 'request_message' => '|min:20' ]);
        } else {
            $this->validate($request, [ 'request_type' => 'required' ]);
            $result = $requests::query( 'SELECT created_at FROM requests WHERE request_type=:request_type AND user_id=:user_id' ,
                [ 'request_type' => $request->request_type, 'user_id' => Auth::id() ] )->orderBy('created_at', 'desc')->first();
            if($result) {
                Session::flash('flash_message', 'Request type: ' . $request->request_type . ' already sent to Administrator. Request sent on: ' . $result->created_at );
                return redirect( $request->server('HTTP_REFERER') );
            }
        }


        $requests->user_id = Auth::id();
        if(!$requests->user_id) {
           // return redirect('auth.login');
        }
        $requests->save();

        Session::flash('flash_message', 'Request sent to the site Administrator!');

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
        $request = Request::findOrFail($id);

        return view('requests.show', compact('request'));
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
        $request = RequestsModel::findOrFail($id);

        return view('requests.edit', compact('request'));
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
        $this->validate($request, ['user_id' => 'required', 'request_type' => 'required', 'request_message' => 'required', ]);

        $requests = RequestsModel::findOrFail($id);
        $requests->update($requests->all());

        Session::flash('flash_message', 'Request updated!');

        return redirect( $request->server('HTTP_REFERRER') );
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
        RequestsModel::destroy($id);

        Session::flash('flash_message', 'Request deleted!');

        return redirect('requests');
    }

}
