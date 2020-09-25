@extends('layouts.main')
@section('title', __('Vehicle List'))
@section('content')
<div class="main-content">
<div class="alert alert-success successmessage"></div>
<div class="alert alert-danger dangermessage"></div>
<div class="row">
    <div class="col-md-12">
        @if(Session::has('message-success'))
        <div class="alert alert-success">{{Session::get('message-success')}}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @if(Session::has('message-danger'))
        <div class="alert alert-danger">{{Session::get('message-danger')}}</div>
        @endif
    </div>
</div>

   <div class="row">
      <div class="col-md-6">
         <h5>Vehicle List</h5>
      </div>
      <div class="col-md-6">
         <div class="float-md-right">
           <a class="btn btn-primary btn-sm" href="{{ route('Vehicle.create') }}">New Vehicle Add</a> 
            <a class="btn btn-primary btn-sm" href="{{ route('Vehicle.importpage') }}">Imports Vehicle</a>

            <a class="btn btn-primary btn-sm" href="{{ route('export.vehicle') }}">Exports Vehicle</a>   
         </div>
      </div>
   </div>
    <hr>
    {{--  <div class="row">
      <div class="col-md-12">
         <div class="float-md-right">
          <div class="input-group ">
               <input type="text" class="searchString form-control" name="s" id="search"  placeholder="Search..." id="myInput"  autocompelete="false"> 
            </div><br>
         </div>
      </di1v>
   </div>
   --}}



   <div class="row d-flex">
      <div class="col-md-4">
        <input type="text" class="searchString form-control" name="s" id="search"  placeholder="Search..." id="myInput"  autocompelete="false">
      </div>
      <div class="col-md-4 text-right d-flex">
        <select name="user_id" id="user_id" class="form-control">
          <option value="" disabled="" selected="">Select User</option>
          <option value="all">All</option>
          @foreach ($userdata as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
        </select>
        &nbsp&nbsp
        <button class="btn btn-info btn-sm" id="assignedsubmit">Assign</button>
      </div>
      <div class="col-md-4 text-right d-flex">
        <form class="d-flex" method="POST" action="{{ route('vehicle.unassigned') }}">
          @csrf
          <input type="date" class="form-control" id="date" name="date" >&nbsp;
          <button class="btn btn-info btn-sm" type="submit" name="submit">        
        Unassign</button>&nbsp;
        </form>
        <button id="deleterecord" class="btn btn-danger btn-sm"> Delete</button>       
      </div>
    </div>
    <br>
    <div class="table-responsive">
     <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="data">
        <thead>
           <tr>
                <th><input id="checkAll" type="checkbox"  value="checkAll"></th>
                <th>Action</th>
                <th>Customer Name</th>
                <th>Agreement No</th>
                <th>Prod N</th>
                <th>Region Area</th>
                <th>Office</th>
                <th>Branch</th>
                <th>Cycle</th>
                <th>Paymode</th>
                <th>Emi</th>
                <th>Tet</th>
                <th>Noi</th>
                <th>Allocation Month Grp</th>
                <th>Tenor Over</th>
                <th>Charges</th>
                <th>Gv</th>
                <th>Model</th>
                <th>Regd Num</th>
                <th>Chasis Num</th>
                <th>Engine Num</th>
                <th>Make</th>
                <th>Rrm Name No</th>
                <th>Rrm Mail Id</th>
                <th>Coordinator mail</th>
                <th>Letter Refernce</th>
                <th>Dispatch Date</th>
                <th>Letter Date</th>
                <th>Valid Date</th>
           </tr>
        </thead>
        <tbody class="vehicle_table_dynamic">
             @include('vehicle.dynamic_vehicle_table')
        </tbody>
     </table>
     {{ $vehicledata->links() }}
   </div>
</div>
  
@endsection
@section('onPageJs')
 
<script type="text/javascript">

$(document).ready(function() {
        /*$('#myTable').DataTable();*/
        $('.successmessage').css('display','none');
        $('.dangermessage').css('display','none');

        
    });
$('#search').on('keyup',function(){
    var myInput=$(this).val();
    $.ajax({
      type : 'get',
      url : '{{ route('Vehicle.search') }}',
      data: {
              "s":myInput,
            },
      success:function(data){
         $('.vehicle_table_dynamic').html(data.data);
              tableScript();
      }
    });
  })

  $("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});

  $(document).on('click','#assignedsubmit',function(){

           var user_id = $('#user_id').val();
        

           
            var vehicle_id = [];
            $.each($("input[name='vehicle_id']:checked"), function(){            
                vehicle_id.push($(this).val());
            });


            

            $.ajax({
                url: "{{ route('userassigneds.store') }}",
                type:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    "user_id":user_id,
                    'vehicle_id':vehicle_id,
                },
                cache: false,
                success: function(data){
                    

                    if(data.message)
                    {
                      $('.successmessage').css('display','block');
                      $('.successmessage').html(data.message);
                      $('.successmessage').delay(5000).fadeOut(800);
                    }
                    else
                    {
                      $('.dangermessage').css('display','block');
                      $('.dangermessage').html(data.errormsg);
                      $('.dangermessage').delay(5000).fadeOut(800);  
                    }
              }
          });
        });

  $(document).on('click','#deleterecord',function(){
    var date = $('#date').val();
     $.ajax({
                url: "{{ route('vehicle.datedelete') }}",
                type:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    "date":date,
                },
                cache: false,
                success: function(data){
                $('.vehicle_table_dynamic').html(data.data);

                    if(data.msg)
                    {
                      $('.successmessage').css('display','block');
                      $('.successmessage').html(data.msg);
                      $('.successmessage').delay(5000).fadeOut(800);
                    }
                    else
                    { 
                      $('.dangermessage').css('display','block');
                      $('.dangermessage').html(data.errormsg);
                      $('.dangermessage').delay(5000).fadeOut(800);  
                    }
              }
          });

  });


</script>


@endsection