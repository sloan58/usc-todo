@extends('app')

@section('content')

    @section('hero')

        @if($projects->count())
            <div class="col-md-4 text-left">
                {!! $projects->render() !!}
            </div>
        @endif

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
        <div class="col-md-2 vcenter">
        <a href="{!! route('todos.all') !!}">
            <button class="btn btn-default pull-left">
                Show all Todos
            </button>
        </a>
        </div>
        <div class="col-md-3 col-md-offset-2 vcenter">
            <div class="text-center lato-headers">Project Listing</div>
        </div>
    </div>

    <div class="row table-top-margin">
        @if($projects->count())
            @foreach($projects as $project)
                <div class="col-md-2">
                    <article class="media project-media">
                            <div class="media-body">
                                <h4 class="media-heading"><a href="{{ route('projects.todos.index', $project->id)  }}">{{ $project->name }}</a></h4>
                                <span class="text-muted">
                                    <span>Updated:</span><br/>
                                    {{ $project->updated_at }}
                                </span>
                            </div>
                    </article>
                </div>
            @endforeach
        @endif
    </div>
</div>
@stop

