@extends('app')

@section('content')

    @section('hero')

            <div class="col-md-4 col-md-offset-4">
                <h3 class="lato-headers">{{ ucfirst($project->name) }} Project Todo's</h3>
            </div>

    @stop

<div class="container" ng-controller="mainController as main">

    <div class="row">
        <div class="col-md-2 col-md-offset-4">
        <a href="{!! route('projects.index') !!}">
            <button class="btn btn-default center-block">
                Back to Project List
            </button>
        </a>
        </div>
        <div class="col-md-2">
        <a href="{!! route('projects.todos.create', $project->id) !!}">
            <button class="btn btn-default center-block">
                Add New Todo
            </button>
        </a>
        </div>
    </div>

    <div class="row table-top-margin">

        <div class="col-md-2 text-center">

            @include('partials.status_legend')

            @if(!$project->alreadySubscribed(\Auth::user()->id))
            <div class="form-group">
                {!! Form::open(array('class' => 'form-inline', 'route' => array('subscribe', $project->id))) !!}
                {!! Form::submit('Subscribe!', array('class' => 'btn btn-success project-delete center-block')) !!}
                {!! Form::close() !!}
            </div>
            @else
             <div class="form-group">
                {!! Form::open(array('class' => 'form-inline', 'route' => array('unsubscribe', $project->id))) !!}
                {!! Form::submit('Unsubscribe', array('class' => 'btn btn-default project-delete center-block')) !!}
                {!! Form::close() !!}
            </div>
            @endif

            <div class="form-group">
                {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.destroy', $project->id))) !!}
                {!! Form::submit('Delete Project', array('class' => 'btn btn-danger project-delete center-block')) !!}
                {!! Form::close() !!}
            </div>

        </div>

        @if($project->todos->count())
        <div class="col-md-10">
            <table id="project-todos" class="display table table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Todo Item</th>
                            <th>Due Date</th>
                            <th>Completed</th>
                            <th>Urgent</th>
                            <th>Added By</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($project->todos as $todo)
                        <?php $style = ""; ?>
                        @if($todo->completed)
                            <tr class="text-muted" ng-hide="main.hideCompleted">
                            <?php $style = 'style=text-decoration:line-through'; ?>
                        @elseif($todo->urgent)
                            <tr class="text-danger">
                        @endif
                            <td {{$style}}><a href="{{ route('projects.todos.show', [$todo->project_id, $todo->id])  }}">{{ $todo->name }}</a></td>
                            <td {{$style}}>{{$todo->due_date}}</td>
                            <td {{$style}}>{{$todo->completed ? 'Yes' : 'No' }}</td>
                            <td {{$style}}>{{$todo->urgent ? 'Yes' : 'No'}}</td>
                            <td>{{$todo->user->name}}</td>
                        </tr>
                     @endforeach
                    </tbody>
            </table>
            <p><input type="checkbox" ng-model="main.hideCompleted"> Hide Completed Todos</p>
        </div>
        @else
        <div class="col-md-4 col-md-offset-2">
            <h2 class="lato-headers text-center">No Todos for this Project</h2>
        </div>
        @endif

    </div>
</div>

@stop