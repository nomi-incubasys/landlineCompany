@extends('layouts.main')

@section('content')


<h4>REGISTERED CUSTOMERS</h4>
<?php $count = 0; ?>
<br/>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr class="danger">
                <th>Sr</th>
                <th>Name</th>
                <th>Email</th>
                <th>Profile Image</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($result) && !empty($result))

            @foreach ($result as $row)

            <?php $count++; ?>
            @if($row['usergroup_id']==3)
            <tr>
                <td>{{$count}}</td>
                <td>{{$row['name']}}</td>
                <td>{{$row['email']}}</td>
                <td><img src="uploads/{{$row['profile_icon']}}" style="width:50px;height:50px;"></td>
                <td>{{$row['created_at']}}</td>
                <td>
                    <a class="del-button" href="deletecustomers/{{$row['id']}}">DELETE</a>
                </td>
            </tr>
             @endif

            @endforeach

            @endif
        </tbody>
    </table>
</div>

@stop