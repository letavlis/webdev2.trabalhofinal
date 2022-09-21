<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class EventsController extends Controller{

    public function index(){
        $date = Date::now();
        $data = Event::where('eventdate', '>', $date)->orderBy('eventdate')->get();
        $this->authorize('viewAny', Event::class);
        return view('events.index', compact('data'));
    }
    public function list(){
        $date = Date::now();
        $data = Event::where('eventdate', '>', $date)->orderBy('eventdate')->get();
        return view('events.list', compact('data'));
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
        $data = Event::find($id);

        return view('events.show', compact('data'));
    }

    public function edit($id){
        $data = Event::find($id);
        $this->authorize('update', $data);
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
        $obj = Event::find($id);
        $this->authorize('delete', $obj);
        $obj->destroy();
        return redirect()->route('events.index');
    }
}
