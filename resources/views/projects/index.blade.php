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

    @if($projects->count())
        @foreach($projects as $project)
            <div class="col-md-2">
                <article class="media project-media">
                        <div class="media-body">
                            <h4 class="media-heading"><a href="{{ route('projects.show', $project->id)  }}">{{ $project->name }}</a></h4>
                            <span class="text-muted">
                                <span>Updated:</span><br/>
                                {{ $project->updated_at }}
                            </span>
                        </div>
                </article>
            </div>
        @endforeach
    @endif

@stop

