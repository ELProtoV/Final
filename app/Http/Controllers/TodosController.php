<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
        public function store(Request $request){

        $request->validate([
            'title' => 'required|min:3',
        ]);
    
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();
    
        return redirect()->route('todos')->with('success', 'Todo created successfully');
    }

    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', ['todos' => $todos]);
    }
}
