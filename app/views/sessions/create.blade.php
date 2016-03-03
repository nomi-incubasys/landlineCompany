@extends('master')

@section('content')

<div class="row">

    @if(isset($message))
    <div class="form-group col-md-4 col-md-offset-4">
        {{$message}}
    </div>
    @endif
    
{{ Form::open(['route' => array('sessions.store')]) }}

    
    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::label('email', 'Email Address')}}
        {{ Form::text('email', '',array('class'=>'form-control','placeholder'=>'Enter Email Address')) }}
    </div>

    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::label('password', 'Password')}}
        {{ Form::password('password',array('class'=>'form-control','placeholder'=>'Enter Password')) }}
    </div>

    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::submit('Login',array('class'=>'btn-md btn-danger form-control')) }}
    </div>


{{ Form::close() }}

</div>

@stop