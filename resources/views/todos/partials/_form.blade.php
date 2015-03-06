<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::text('due_date', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Pick the date this task should be completed', 'id' => 'calendar')) !!}
</div>

@if(Route::current()->getName() == 'projects.todos.show')

<div class="form-group">
    {!! Form::checkbox('completed') !!}
    {!! Form::label('completed', 'Completed') !!}
</div>

@endif

<div class="form-group">
    {!! Form::checkbox('urgent') !!}
    {!! Form::label('urgent', 'Urgent') !!}
</div>

{!! Form::hidden('user_id', \Auth::user()->id) !!}
{!! Form::hidden('project_id', $project->id) !!}

<div class="form-group">
    {!! Form::submit($submit_text,[ 'class' => "btn btn-primary" ]) !!}
</div>