@extends('app')

@section('content')

    @section('hero')

        <div class="col-md-12">
            <h3>Edit Todo for the {{ $project->name }} Project</h3>
        </div>

    @stop

<div class="container">
    <div class="col-md-3">
        <button class="btn btn-default">
            <a href="{!! route('projects.show',$project->id) !!}">Back to Project</a>
        </button>
    </div>

    <div class="col-md-6">
    {!! Form::model($todo, ['class' => 'form','method' => 'PATCH', 'route' => ['projects.todos.update', $project->id, $todo->id]]) !!}

        @include('todos/partials/_form', ['submit_text' => 'Update Todo'])

    {!! Form::close() !!}

    <div class="form-group">
        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.todos.destroy', $project->id, $todo->id))) !!}
        {!! Form::submit('Delete!', array('class' => 'btn btn-danger')) !!}
        {!! Form::close() !!}

    </div>

    </div>

</div>
@stop