@extends('layouts.admin')

@section('content')

<div class="row">
    
{{ Form::open(array('files'=>true , 'enctype' => 'multipart/form-data', 'route' => array('users.store'))) }}

    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::label('user', 'User Name')}}
        {{ Form::text('username', '',array('class'=>'form-control','placeholder'=>'Enter a name','required'=>'required')) }}
    </div>

    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::label('email', 'Email Address')}}
        {{ Form::text('email', '',array('class'=>'form-control','placeholder'=>'Enter Email Address','required'=>'required')) }}
    </div>

    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::label('password', 'Password')}}
        {{ Form::password('password',array('class'=>'form-control','required'=>'required')) }}
    </div>

    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::label('profile', 'Profile Picture')}}
        {{ Form::file('image',array('class'=>'form-control','required'=>'required')) }}
    </div>

    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::select('usergroup', array(
                ''=>'Please Select',
                '1' => 'Super Admin',
                '2' => 'Admin',
                '3' => 'Customer'
            )
            ,null,array('class'=>'form-control','required'=>'required'))}}
    </div>

    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::submit('Submit',array('class'=>'btn-md btn-danger form-control')) }}
    </div>


{{ Form::close() }}

</div>

@stop