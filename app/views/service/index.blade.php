@extends('layouts.main')

@section('content')

<?php $count = 0; ?>

<div>
    <div id="main-heading">
        <h4>USER COMPLAINTS</h4> 
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
                <th>Customer</th>
                <th>Registered At</th>
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if(isset($result) && !empty($result))

            @foreach ($result as $row)

            <?php $count++; ?>
            
            <tr>
                <td>{{$count}}</td>
                <td>{{$row['complaint_subject']}}</td>
                <td>{{$row['complaint_body']}}</td>
                <td>
                    @if($row['status']==0)
                    Enquiry
                    @else
                    Examined & Processed
                    @endif
                </td>
                <td><?php 
                        $customer_name = User::find($row['user_id']);
                        echo $customer_name['name'];
                     ?>
                </td>
                <td>{{$row['created_at']}}</td>
                <td>
                    
                    @if($row['status']==0) <a href="changestatus/{{$row['id']}}" >Approve</a> | @endif <a  href="deletecomplaint/{{$row['id']}}"> Delete </a> 
                    
                </td>
                <td>
                    @if($row['status']!=0) 
                    
                        <span class="glyphicon glyphicon-ok-sign" style="color: green;" data-toggle="tooltip" title="Complaint Approved" ></span> 
                    
                    @else
                    
                        <span class="glyphicon glyphicon-minus-sign" style="color: red;" data-toggle="tooltip" title="Complaint In Progress" ></span> 
                    
                    @endif
                </td>
            </tr>

            @endforeach

            @endif
        </tbody>
    </table>
</div>

<script>
$(document).ready(function(){
    
   $('[data-toggle="tooltip"]').tooltip(); 
  
});
</script>


@stop