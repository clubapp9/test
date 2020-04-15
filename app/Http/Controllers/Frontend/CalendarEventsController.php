<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Calendar\EventModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Session;

class CalendarEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $calendarevents = EventModel::paginate(15);

        return view('calendarevents.index', compact('calendarevents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('calendarevents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'start' => 'required', 'end' => 'required', ]);
        $event = new  EventModel($request->all());
        $event->user_id = Auth::id();
        $event->save();

        Session::flash('flash_message', 'CalendarEvent added!');

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
        $calendarevent = EventModel::findOrFail($id);

        return view('calendarevents.show', compact('calendarevent'));
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
        $calendarevent = EventModel::findOrFail($id);

        return view('calendarevents.edit', compact('calendarevent'));
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
        $this->validate($request, ['start' => 'required', 'end' => 'required', ]);

        $calendarevent = EventModel::findOrFail($id);
        $calendarevent->update($request->all());

        Session::flash('flash_message', 'CalendarEvent updated!');

        return redirect('calendarevents');
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
        EventModel::destroy($id);

        Session::flash('flash_message', 'CalendarEvent deleted!');

        return redirect('calendarevents');
    }

}
