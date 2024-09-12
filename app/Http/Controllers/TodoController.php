<?php

namespace App\Http\Controllers;

use App\Services\TodoService;
use Illuminate\Http\Request;

class TodoController extends Controller{

    private $TodoService;

    public function __construct(TodoService $todoService){
        $this->TodoService = $todoService;        
    }
    
    public function index(Request $request){
        $tasks = $this->TodoService->getList();
        return view('Todo.index',compact('tasks'));
    }

    public function add(Request $request){
        $request->validate([
            'task'=>'required|unique:todos|max:100'
        ]);
        $response = $this->TodoService->addTask($request->all());
        return json_encode($response);
    }

    public function delete(Request $request){
        $request->validate([
            'id'=>'required'
        ]);
        $response = $this->TodoService->deleteTask($request->all()['id']);
        return json_encode($response);
    }

    public function edit(Request $request){
        $request->validate([
            'id'=>'required'
        ]);
        $response = $this->TodoService->updateTaskAsCompleted($request->all()['id']);
        return json_encode($response);
    }
}
