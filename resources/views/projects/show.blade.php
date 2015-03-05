@extends('app')

@section('content')

    @section('hero')

            <div class="col-md-4 col-md-offset-4">
                <h3>{{ ucfirst($project->name) }} Project Todo's</h3>
            </div>

    @stop

<div class="container">

    <div class="row">
        <div class="col-md-2 col-md-offset-4">
            <button class="btn btn-default pull-left">
                <a href="{!! route('projects.index') !!}">Back to Project List</a>
            </button>
        </div>
        <div class="col-md-2">
            <button class="btn btn-default pull-left">
                <a href="{!! route('projects.todos.create', $project->id) !!}">Add New Todo</a>
            </button>
        </div>
    </div>

    <div class="row table-top-margin">
        @if($project->todos->count())
        <div class="col-md-10 col-md-offset-1">
            <table id="project-todos" class="display table table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Todo Item</th>
                            <th>Description</th>
                            <th>Due Date</th>
                            <th>Completed</th>
                            <th>Urgent</th>
                            <th>Added By</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($project->todos as $todo)
                        @if($todo->completed)
                            <tr class="text-muted text-bold">
                        @elseif($todo->urgent)
                            <tr class="text-danger">
                        @endif
                            <td><a href="{{ route('projects.todos.show', [$todo->project_id, $todo->id])  }}">{{ $todo->name }}</a></td>
                            <td>{{$todo->description}}</td>
                            <td>{{$todo->due_date}}</td>
                            <td>{{$todo->completed ? 'Yes' : 'No' }}</td>
                            <td>{{$todo->urgent ? 'Yes' : 'No'}}</td>
                            <td>{{$todo->user->name}}</td>
                        </tr>
                     @endforeach
                    </tbody>
            </table>
        </div>
        @else
        <div class="col-md-4 col-md-offset-4">
            <h2>No Todos for this Project</h2>
        </div>
        @endif
    </div>
</div>

@stop