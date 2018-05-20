<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\User;
use Redirect;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $todos = Todo::where('completed', '=', 0)
        ->join('users', 'users.id', '=', 'todos.user_id')
        ->select('todos.*', 'users.name')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('beheer.todo.index', compact('todos'));
    }

    public function update($id)
    {
       $markTodoAsRead = Todo::where('id', '=', $id)
       ->update([
            'completed' => 1,
        ]);
       return Redirect::to('beheer/todo');


    }
}
