@extends('app')

@section('hero')

    <div class="col-md-12">
        <h3>Add New Todo for the {{ $project->name }} Project</h3>
    </div>

@stop

@section('content')

    <div class="container">

        <div class="col-md-3">
            <button class="btn btn-default">
                <a href="{!! route('projects.show',$project->id) !!}">Back to Project</a>
            </button>
        </div>

        <div class="col-md-6">

            {!! Form::model(new App\Todo, ['route' => ['projects.todos.store', $project->id], 'class'=>'']) !!}

                @include('todos/partials/_form', ['submit_text' => 'Create Todo'])

            {!! Form::close() !!}
        </div>
    </div>

@endsection