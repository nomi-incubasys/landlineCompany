@extends('layouts.admin')

@section('content')

<div class="row">
    
{{ Form::open(array('route' => 'users.update', 'method'=>'PUT')) }}

        {{ Form::hidden('id', $result['id'])}}
        
    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::label('user', 'User Name')}}
        {{ Form::text('username', $result['name'] ,array('class'=>'form-control','placeholder'=>'Enter a name','required'=>'required')) }}
    </div>

    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::label('email', 'Email Address')}}
        {{ Form::text('email', $result['email'] ,array('class'=>'form-control','placeholder'=>'Enter Email Address','required'=>'required')) }}
    </div>

    <div class="form-group col-md-4 col-md-offset-4">
        <select name="usergroup" class="form-control" required="required" <?php if($result['usergroup_id'] == Auth::user()->usergroup_id){echo 'disabled';} ?>>            
            <option value="">Please Select</option>
            <option value="1" <?php if($result['usergroup_id']==1){echo 'selected';} ?> >Super Admin</option>
            <option value="2" <?php if($result['usergroup_id']==2){echo 'selected';} ?>>Admin</option>
            <option value="3" <?php if($result['usergroup_id']==3){echo 'selected';} ?>>Customer</option>
        </select>
    </div>

        
    <div class="form-group col-md-4 col-md-offset-4">
        {{ Form::submit('Update',array('class'=>'btn-md btn-danger form-control')) }}
    </div>


{{ Form::close() }}

</div>

@stop