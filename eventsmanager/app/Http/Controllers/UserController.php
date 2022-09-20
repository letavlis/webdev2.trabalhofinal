<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function student(){
        $data = User::where('role_id', '>', 1)->get();
        return view('users.student', compact('data'));
    }

    public function edit($id){
        $data = User::find($id);
        $this->authorize('update', $data);
        if(!isset($data)){return"<h1>ID: $id não encontrado!</h1>";}
        return view('users.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $obj = User::find($id);
        $obj->role_id = $request->role_id;
        $obj->save();
        return redirect()->route('users.student');
    }
}
