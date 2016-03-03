@extends('layouts.client')

@section('content')

<h3>Register New Complaint</h3>

<div class="row">
    
{{ Form::open(array('files'=>true , 'enctype' => 'multipart/form-data', 'route' => array('complaints.store'))) }}

    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::label('subject-label', 'Subject')}}
        {{ Form::text('subject', '',array('class'=>'form-control','placeholder'=>'Enter Complaints Subject','required'=>'required')) }}
    </div>

    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::label('complaint_body_lab', 'Complaint')}}
        {{ Form::textarea('complaint_body', '',array('class'=>'form-control','placeholder'=>'Write your complaint..!','required'=>'required')) }}
    </div>

    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::submit('Register',array('class'=>'btn-md btn-danger form-control')) }}
    </div>

{{ Form::close() }}

</div>


@stop