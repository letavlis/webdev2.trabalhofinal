<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $date = Date::now();
        $attendees = Attendee::where('user_id', '=', Auth()->user()->id )->get();
        $data = Event::where('eventdate', '>', $date)->get();
        return view('attendees.index', compact('data', 'attendees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    }

    public function creater($id){
        $event = Event::find($id);
        return view('attendees.creater', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $obj = new Attendee();
        $user = $request->user_id;
        $event = $request->event_id;

        $obj->user()->associate($user);
        $obj->event()->associate($event);
        $obj->save();

        return redirect()->route('attendees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Event::find($id);
        $date = explode(' ', $data->eventdate);
        $date[0] = date('d-m-Y', strtotime($date[0]));
        return view('attendees.show', compact('data','date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendee $attendee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendee $attendee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendee $attendee)
    {
        //
    }
}
