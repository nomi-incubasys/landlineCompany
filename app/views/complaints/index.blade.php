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
                <th></th>
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
                        @if($row['status']==0) <a href="{{ route('complaints.edit',$row['id']) }}">EDIT</a> | @endif <a id="del-complaint" href="javascript:void();"> DELETE </a> 
                    {{ Form::close() }}
                </td>
                <td>
                    @if($row['status']!=0) 
                        <span class="glyphicon glyphicon-ok-sign" style="color: green;" data-toggle="tooltip" title="Complaint Approved" ></span> 
                    @else
                        <span class="glyphicon glyphicon-minus-sign" style="color: red;" data-toggle="tooltip" title="Complaint In Progress" ></span> 
                    @endif
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
    
   $('[data-toggle="tooltip"]').tooltip(); 
    
   $(document).on("click","#del-complaint",function(){
     var form = $(this).closest("form");
     form.submit();
   });
  
});
</script>

@stop