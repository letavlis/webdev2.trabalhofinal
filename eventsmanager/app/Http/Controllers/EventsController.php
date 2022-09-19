<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller{

    public function index(){

        $data = Event::orderBy('eventdate')->get();
        return view('events.index', compact('data'));
    }

    public function create(){
        $this->authorize('create', Event::class);
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->authorize('create', Event::class);
        $obj = new Event();

        $obj->name = mb_strtoupper($request->name, 'UTF-8');
        $obj->eventdate = $request->eventdate;
        $obj->save();

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    public function edit($id){
        $data = Event::find($id);
        if(!isset($data)){return"<h1>ID: $id não encontrado!</h1>";}
        return view('events.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $obj = Event::find($id);
        $obj->name = mb_strtoupper($request->name, 'UTF-8');
        $obj->eventdate = $request->eventdate;
        $obj->save();

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }
}
