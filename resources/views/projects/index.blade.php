@extends('app')

@section('content')

    @section('hero')


            <div class="col-md-4 text-left">
            @if($projects->count())
                {!! $projects->render() !!}
            @endif
            </div>

        @if(\Auth::user())
            {!! Form::open(['class' => 'form']) !!}

            <div class="col-md-4 todo-list">
                <p class="input-group">
                    {!! Form::text('name', null,['required', 'class'=>'form-control', 'placeholder'=>'Add a new project here']) !!}
                    {!! Form::hidden('user_id', \Auth::user()->id) !!}
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </span>
                </p>
            </div>

            {!! Form::close() !!}
        @endif
    @stop

<div class="container">
    <div class="row">
     @if($projects->count())
        <div class="col-md-2 vcenter">
        <a href="{!! route('todos.all') !!}">
            <button class="btn btn-default pull-left">
                Show all Project Todos
            </button>
        </a>
        </div>
        <div class="col-md-3 col-md-offset-2 vcenter">
            <div class="text-center lato-headers">Projects Listing</div>
        </div>
    </div>

    <div class="row table-top-margin">
            <div class="col-md-10 col-md-offset-1">
                <table id="project-todos" class="display table table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Create On</th>
                            <th>Added By</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td><a href="{{ route('projects.todos.index', $project->id)  }}">{{ $project->name }}</a></td>
                            <td>{{$project->created_at}}</td>s
                            <td>{{$project->user->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
        <div class="col-md-4 col-md-offset-4">
            <h2 class="lato-headers text-center">No Projects..... Add One!</h2>
        </div>
        @endif
    </div>
</div>
@stop

