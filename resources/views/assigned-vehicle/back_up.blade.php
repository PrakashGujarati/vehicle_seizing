@extends('layouts.main')
@section('title', __('Vehicle List'))
@section('css')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
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
         <h5>Assigned Vehicle List</h5>
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
      <div class="col-md-4 text-right d-flex">
        <select name="user_id" id="user_id" class="form-control user_id">
          <option value="" disabled="" selected="">Select User</option>
          @foreach ($userdata as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <br>
    <div class="vehicle_table_dynamic">
            {{--  @include('assigned-vehicle.dynamic_vehicle_table') --}}

   @if(count($vehicledata) > 0)

  
<div class="table-responsive">
     <table class="table table-hover table-bordered table-striped datatable" cellspacing="0" width="100%" id="data">
        <thead>
           <tr> 
                <th>Customer Name</th>
                <th>Agreement No</th>
               {{--  <th>Prod N</th>
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
                <th>Valid Date</th> --}}
           </tr>
        </thead>
        <tbody>
        </tbody>
</table>
      
   </div>


   @endif   
    </div>
    
    
</div>
  
@endsection
@section('onPageJs')
 
 <script src="{{ asset('https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js') }} "></script>
<script type="text/javascript">

$(document).ready(function() {
        /*$('#myTable').DataTable();*/
        $('.successmessage').css('display','none');
        $('.dangermessage').css('display','none');

        
    });


$(".user_id").on('change',function(){

  var use_id = $(this).val();
   $('.datatable').DataTable({
                          processing: true,
                          serverSide: true,
                            "ajax": {
                            "url" : "{{ route('assigned-vehicle-display') }}",
                            "type": "POST",
                            "data" : {
                              "user_id" : user_id,
                            },
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        },
                          columns: [
                              
                              {data: 'agreement_no', name: 'agreement_no'},
                              {data: 'prod_n', name: 'prod_n'},
                             /* {data: 'region_area', name: 'region_area'},
                              {data: 'office', name: 'office'},
                              {data: 'branch', name: 'branch'},
                              {data: 'cycle', name: 'cycle'},
                              {data: 'paymode', name: 'paymode'},
                              {data: 'emi', name: 'emi'},
                              {data: 'tet', name: 'tet'},
                              {data: 'noi', name: 'noi'},
                              {data: 'allocation_month_grp', name: 'allocation_month_grp'},
                              {data: 'tenor_over', name: 'tenor_over'},
                              {data: 'charges', name: 'charges'},
                              {data: 'gv', name: 'gv'},
                              {data: 'model', name: 'model'},
                              {data: 'regd_num', name: 'regd_num'},
                              {data: 'chasis_num', name: 'chasis_num'},
                              {data: 'engine_num', name: 'engine_num'},
                              {data: 'make', name: 'make'},
                              {data: 'rrm_name_no', name: 'rrm_name_no'},
                              {data: 'rrm_mail_id', name: 'rrm_mail_id'},
                              {data: 'coordinator_mail_id', name: 'coordinator_mail_id'},
                              {data: 'letter_refernce', name: 'letter_refernce'},
                              {data: 'dispatch_date', name: 'dispatch_date'},
                              {data: 'letter_date', name: 'letter_date'},
                              {data: 'valid_date', name: 'valid_date'},*/
                          ]
                      });
});


$('.user_id').change(function() {    
        var user_id = $(this).children("option:selected").val();

          if(user_id)
          {
                $.ajax({
                  url: "{{ route('assigned-vehicle-display') }}",
                  type:"POST",
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data:{
                      "user_id":user_id,
                  },
                  cache: false,
                  success: function(data){

                    if(data.msg)
                    {
                         $('.vehicle_table_dynamic').html(data.data);
                         $('.dangermessage').css('display','block');
                          $('.dangermessage').html(data.msg);
                          $('.dangermessage').delay(5000).fadeOut(800);
                    }
                    else
                    {
                      $('.vehicle_table_dynamic').html(data.data);
                    }
                
                }
            });
          }
          else
          {
            alert("no");
          }
});
/*
$(document).ready(function() {
    $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '',
        columns: [
            {data: 'agreement_no', name: 'agreement_no'},
            {data: 'prod_n', name: 'prod_n'},
            {data: 'region_area', name: 'region_area'},
            {data: 'office', name: 'office'},
            {data: 'branch', name: 'branch'},
            {data: 'cycle', name: 'cycle'},
            {data: 'paymode', name: 'paymode'},
            {data: 'emi', name: 'emi'},
            {data: 'tet', name: 'tet'},
            {data: 'noi', name: 'noi'},
            {data: 'allocation_month_grp', name: 'allocation_month_grp'},
            {data: 'tenor_over', name: 'tenor_over'},
            {data: 'charges', name: 'charges'},
            {data: 'gv', name: 'gv'},
            {data: 'model', name: 'model'},
            {data: 'regd_num', name: 'regd_num'},
            {data: 'chasis_num', name: 'chasis_num'},
            {data: 'engine_num', name: 'engine_num'},
            {data: 'make', name: 'make'},
            {data: 'rrm_name_no', name: 'rrm_name_no'},
            {data: 'rrm_mail_id', name: 'rrm_mail_id'},
            {data: 'coordinator_mail_id', name: 'coordinator_mail_id'},
            {data: 'letter_refernce', name: 'letter_refernce'},
            {data: 'dispatch_date', name: 'dispatch_date'},
            {data: 'letter_date', name: 'letter_date'},
            {data: 'valid_date', name: 'valid_date'},
        ]
    });
});*/




</script>


@endsection