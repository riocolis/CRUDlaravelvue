<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{


    ///Read
    public function index()
    {
        return Todo::where('user_id','=',Auth::user()->id)->get();
    }

    ///Read
    public function show(Todo $todo)
    {
        # code...
    }

    ///Create
    public function store(Request $request)
    {
        $todo = new Todo();
        $todo->nama = $request->get('nama');
        $todo->status = false;
        $todo->user_id = Auth::user()->id;
        $todo->save();
        return $todo;
    }       
    
    ///update
    public function update(Request $request, Todo $todo)
    {
        // $todo = Todo::findOrFail($todo);
        $todo->status= !$todo->status; ///dinegasikan
        $todo->save();
        return $todo;

    }

    //delete
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return $todo;
    }
}
