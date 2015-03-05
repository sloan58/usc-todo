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

<div class="form-group">
    {!! Form::label('completed', 'Completed:') !!}
    {!! Form::checkbox('completed') !!}
</div>

<div class="form-group">
    {!! Form::label('urgent', 'Urgent:') !!}
    {!! Form::checkbox('urgent') !!}
</div>

{!! Form::hidden('user_id', \Auth::user()->id) !!}
{!! Form::hidden('project_id', $project->id) !!}

<div class="form-group">
    {!! Form::submit($submit_text,[ 'class' => "btn btn-primary" ]) !!}
</div>