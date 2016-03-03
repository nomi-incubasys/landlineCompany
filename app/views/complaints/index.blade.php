@extends('layouts.client')

@section('content')

<?php $count = 0; ?>

<div>
    <div id="main-heading">
        <h4>COMPLAINTS</h4> 
    </div>
    <div id="reg-compaint">
        <a href="{{ route('complaints.create') }}" role="button" class="btn btn-default"><b>Register a Complaint</b></a><br/><br/>
    </div>
</div>

<div class="clear-line">&nbsp;</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr class="danger">
                <th>Sr</th>
                <th>Subject</th>
                <th>Complaint</th>
                <th>Status</th>
                <th>Registered At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($result) && !empty($result))

            @foreach ($result as $row)

            <?php $count++; ?>
            @if(Auth::user()->usergroup_id=3)
            <tr>
                <td>{{$count}}</td>
                <td>{{$row['complaint_subject']}}</td>
                <td>{{$row['complaint_body']}}</td>
                <td>
                    @if($row['status']==0)
                    Enquiry
                    @else
                    Examined and Approved
                    @endif
                </td>
                <td>{{$row['created_at']}}</td>
                <td>
                    {{ Form::open(array('route' => array('complaints.destroy', $row['id']), 'method' => 'delete')) }}
                        <a href="{{ route('complaints.edit',$row['id']) }}">EDIT</a> |<a id="del-complaint" href="javascript:void();"> DELETE </a> 
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
   $(document).on("click","#del-complaint",function(){
     var form = $(this).closest("form");
     form.submit();
   });
});
</script>

@stop