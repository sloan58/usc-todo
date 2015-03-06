@extends('app')

@section('content')

    @section('hero')

            <div class="col-md-4 col-md-offset-4">
                <h3 class="lato-headers">All Project Todo's</h3>
            </div>

    @stop

<div class="container">

    <div class="row">
        <div class="col-md-2">
            <a href="{!! route('projects.index') !!}">
                <button class="btn btn-default pull-left">
                    Back to Project List
                </button>
            </a>
        </div>
    </div>

    <div class="row table-top-margin">

        <div class="col-md-2 text-center">

            @include('partials.status_legend')

        </div>

        <div class="col-md-10">
            <table id="all-todos" class="display table table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Todo Item</th>
                            <th>Description</th>
                            <th>Due Date</th>
                            <th>Completed</th>
                            <th>Urgent</th>
                            <th>Project</th>
                            <th>Added By</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($todos->count())
                        @foreach($todos as $todo)
                            <?php $style = ""; ?>
                            @if($todo->completed)
                                <tr class="text-muted">
                                <?php $style = 'style=text-decoration:line-through'; ?>
                            @elseif($todo->urgent)
                                <tr class="text-danger">
                            @endif
                                <td {{$style}}><a href="{{ route('projects.todos.show', [$todo->project_id, $todo->id])  }}">{{ $todo->name }}</a></td>
                                <td {{$style}}>{{$todo->description}}</td>
                                <td {{$style}}>{{$todo->due_date}}</td>
                                <td {{$style}}>{{$todo->completed ? 'Yes' : 'No' }}</td>
                                <td {{$style}}>{{$todo->urgent ? 'Yes' : 'No'}}</td>
                                <td><a href="{{ route('projects.todos.index', [$todo->project_id])  }}">{{ $todo->project->name }}</a></td>
                                <td class="text-">{{$todo->user->name}}</td>
                            </tr>
                         @endforeach
                     @endif
                    </tbody>
            </table>
        </div>
    </div>
</div>

@stop