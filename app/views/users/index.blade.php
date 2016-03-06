@extends('layouts.admin')

@section('content')


<h4>USER  FORM  REGISTRATION</h4>
<?php $count = 0; ?>

<div>
    <br><a href="{{ route('users.create') }}" style="color: #f03"><b>Add More User</b></a><br>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr class="danger">
                <th>Sr</th>
                <th>Name</th>
                <th>Email</th>
                <th>Profile Image</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($result) && !empty($result))

            @foreach ($result as $row)

            <?php $count++; ?>
            @if($row['usergroup_id']!=1)
            <tr>
                <td>{{$count}}</td>
                <td>{{$row['name']}}</td>
                <td>{{$row['email']}}</td>
                <td><img src="uploads/{{$row['profile_icon']}}" style="width:50px;height:50px;"></td>
                <td>
                <?php 
                    if ($row['usergroup_id']==2)
                    {
                        echo 'Service Provider';
                    }
                    else if ($row['usergroup_id']==3)
                    {
                        echo 'Customer';
                    }
                ?>
                </td>
                <td>{{$row['created_at']}}</td>
                <td>
                    {{ Form::open(array('route' => array('users.destroy', $row['id']), 'method' => 'delete')) }}
                        <a href="{{ route('users.edit',$row['id']) }}"> Edit </a> | <a class="del-button" href="javascript:void();"> Delete </a> 
                    {{ Form::close() }}
                </td>
            </tr>
             @endif

            @endforeach

            @endif
        </tbody>
    </table>
</div>

<script>
$(document).ready(function(){
   $(document).on("click",".del-button",function(){
     var form = $(this).closest("form");
     form.submit();
   });
});
</script>

@stop