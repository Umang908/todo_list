@extends('Layout.default')
@section('content')
<style>
    .container {
        text-align: center;
        background-color: lightgray;
        border: 1px solid black;
        padding: 20px;
        margin: 20px auto;
        width: 60%;
    }

    h1 {
        font-family: Arial, Helvetica, sans-serif;
        color: rgb(137, 137, 219);
        text-align: center;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .task-header {
        display: flex;
        justify-content: center;
        margin: 20px 0px;
        align-content: center;
    }

    .tasks {
        display: flex;
        width: 30%;
    }

    .task-status {
        display: flex;
    }

    span.sequence {
        padding: 0px 20px;
        margin: 0px 30px;
    }

    span.task-name {
        padding: 20px 40px;
    }

    span.staus {
        padding: 0 20px;
        margin: 0 20px;
    }

    .text-danger {
        background-color: #dc3545;
    }

    .edit {
        margin-right: 5px;
        justify-content: end;
    }

    .sequence {
        text-align: center;
        /* Centers text horizontally */
        flex: 1;
        /* Allows the span to grow and fill available space */
    }

    .btn {
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        color: #fff;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #007bff;
    }

    .btn-success {
        background-color: #28a745;
    }

    .btn-danger {
        background-color: #dc3545;
    }
</style>
<div class="container">
    <h1>PHP - Simple To Do List App </h1>
    <div class="input-section">
        @csrf
        <input type="text" name="task" id="task">
        <button class="add-task btn btn-primary">Add Task</button>
        <span class="invalid-feedback text-danger"></span>
    </div>
    <div class="task-section">
        <div class="task-header">
            <div class="tasks">
                <div>
                    <span class="sequence">id</span>
                </div>
                <div>
                    <span class="task-name">Task</span>
                </div>
            </div>
            <div class="task-status">
                <div>
                    <span class="staus">Status</span>
                </div>
                <div>
                    <span class="action">Action</span>
                </div>
            </div>
        </div>
    </div>
    <div class="main-div">
        @foreach ($tasks as $task)
        <div class="task-section">
            <div class="task-header">
                <div class="tasks">
                    <div>
                        <span class="sequence">{{$task['id'] ?? ""}}</span>
                    </div>
                    <div>
                        <span class="task-name">{{$task['task'] ?? ""}}</span>
                    </div>
                </div>
                <div class="task-status">
                    <div>
                        <span class="staus"><?= $task['status'] == 0 ? "" : "Done" ?></span>
                    </div>
                    <div>
                        @if(!$task['status'])
                        <button title="Complete Task" class="edit btn btn-success" data-id="{{$task['id'] ?? ""}}"><i class=" fa  fa-check"> </i></button>
                        @endif
                        <button title="Remove" class="delete btn btn-danger" data-id="{{$task['id'] ?? ""}}"> <i class="fa fa-trash"> </i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection