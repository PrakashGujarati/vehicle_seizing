@extends('layouts.main')
@section('title', __('Vehicle List'))
@section('css')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">

<style type="text/css" media="screen">
.fill_details_table
{
     max-height: 600px!important;
    overflow-y: scroll!important;
}  
tbody {
     display: block;
     max-height: 565px!important;
    overflow-y: scroll!important;
}
thead {
    display: block;
}
</style>
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
      <div class="col-md-2">
            <input type="text" class="searchString form-control" name="s" id="search"  placeholder="Search..." id="myInput"  autocompelete="false">
      </div>
          <div class="col-md-2">
            <select name="company_name" id="company_name" class="form-control company_name">
          <option value="" disabled="" selected="">Select Finance Companys</option>
              @foreach ($financeoffices as $offices)
                <option value="{{$offices->finance_company_name}}">{{$offices->finance_company_name}}</option>
              @endforeach
             </select>
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
    <div class="row">
      <div class="col-md-6">
        <div class="table-responsive">
          <table class="table mdl-data-table" cellspacing="0" width="100%" id="data">
            <thead>
              <tr> 
                <th><input id="checkAll" type="checkbox"  value="checkAll"></th>
                <th>Action</th>
                <th>Vehicle No</th>
                <th>Make</th>
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
                <th>Chasis Num</th>
                <th>Engine Num</th>
                <th>Rrm Name No</th>
                <th>Rrm Mail Id</th>
                <th>Coordinator mail</th>
                <th>Letter Refernce</th>
                <th>Dispatch Date</th>
                <th>Letter Date</th>
                <th>Valid Date</th>
                <th>Finance Companys</th>
              </tr>
            </thead>
            
          </table>
      
        </div>    
      </div>
      <div class="col-md-6">
        <table  class="table">
          <thead> 
          <tr>
            <th width="200px;">Full Details</th>
            <th width="200px;"></th>
          </tr>
        </thead>
          <tbody class="fill_details_table">
          <tr>
            <td width="200px;" >Finance Company Name</td>
            <td width="305px;" class="finance_company_name"></td>
          </tr>
          <tr>
            <td >Customer Name</td>
            <td class="customer_name"></td>
          </tr>
          <tr>
            <td>Agreement No</td>
              <td class="agreement_no"></td>
          </tr>
          <tr>
            <td>Prod N</td>
              <td class="prod_n"></td>
          </tr>
          <tr>
            <td>Region Area</td>
              <td class="region_area"></td>
          </tr>
          <tr>
            <td>Office</td>
              <td class="office"></td>
          </tr>
          <tr>
            <td>Branch</td>
              <td class="branch"></td>
          </tr>
          <tr>
            <td>Cycle</td>
              <td class="cycle"></td>
          </tr>
          <tr>
            <td>Paymode</td>
              <td class="paymode"></td>
          </tr>
          <tr>
            <td>Emi</td>
              <td class="emi"></td>
          </tr>
          <tr>
            <td>Tet</td>
              <td class="tet"></td>
          </tr>
          <tr>
            <td>Noi</td>
              <td class="noi"></td>
          </tr>
          <tr>
            <td>Allocation Montd Grp</td>
              <td class="allocation_month_grp"></td>
          </tr>
          <tr>
            <td>Tenor Over</td>
              <td class="tenor_over"></td>
          </tr>
          <tr>
            <td>Charges</td>
              <td class="charges"></td>
          </tr>
          <tr>
            <td>Gv</td>
              <td class="gv"></td>
          </tr>
          <tr>
            <td>Model</td>
              <td class="model"></td>
          </tr>
          <tr>
            <td>Regd Num</td>
              <td class="regd_num"></td>
          </tr>
          <tr>
            <td>Chasis Num</td>
              <td class="chasis_num"></td>
          </tr>
          <tr>
            <td>Engine Num</td>
              <td class="engine_num"></td>
          </tr>
          <tr>
            <td>Make</td>
              <td class="make"></td>
          </tr>
          <tr>
            <td>Rrm Name No</td>
              <td class="rrm_name_no"></td>
          </tr>
          <tr>
            <td>Rrm Mail Id</td>
              <td class="rrm_mail_id"></td>
          </tr>
          <tr>
            <td>Coordinator mail</td>
              <td class="coordinator_mail_id"></td>
          </tr>
          <tr>
            <td>Letter Refernce</td>
              <td class="letter_refernce"></td>
          </tr>
          <tr>
            <td>Dispatch Date</td>
              <td class="dispatch_date"></td>
          </tr>
          <tr>
            <td>Letter Date</td>
              <td class="letter_date"></td>
          </tr>
          <tr>
            <td>Valid Date</td>
              <td class="valid_date"></td>
          </tr>
          <tbody>
          
        </table>

      </div>

    </div>
    
</div>
  
@endsection
@section('onPageJs')
 <script src="{{ asset('https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js') }} "></script>
 
<script type="text/javascript">


   $(document).ready(function() {
        $('.mdl-data-table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url" : "{{ route('manageVehicle') }}",
                        "type": "POST",
                        'headers': {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    },
                    order: [[0, 'desc']],
                    columns: [
                                
                                {data: 'checkbox', name: 'checkbox'},
                                {data: 'action', name: 'action'},
                                {data: 'regd_num', name: 'regd_num'},
                                {data: 'make', name: 'make'},
                                {data: 'customer_name', name: 'customer_name'},
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
                                {data: 'chasis_num', name: 'chasis_num'},
                                {data: 'engine_num', name: 'engine_num'},
                                {data: 'rrm_name_no', name: 'rrm_name_no'},
                                {data: 'rrm_mail_id', name: 'rrm_mail_id'},
                                {data: 'coordinator_mail_id', name: 'coordinator_mail_id'},
                                {data: 'letter_refernce', name: 'letter_refernce'},
                                {data: 'dispatch_date', name: 'dispatch_date'},
                                {data: 'letter_date', name: 'letter_date'},
                                {data: 'valid_date', name: 'valid_date'},
                                {data: 'finance_company_name', name: 'finance_company_name'},
                               
                            ],
                             

                });
 });

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




$('.company_name').change(function() {    
        var company_name = $(this).children("option:selected").val();

          if(company_name)
          {
                $.ajax({
                  url: "{{ route('selected-vehicle-display') }}",
                  type:"POST",
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data:{
                      "company_name":company_name,
                  },
                  cache: false,
                  success: function(data){

                   $('.vehicle_table_dynamic').html(data.data);
                
                }
            });
          }
          else
          {
            alert("no");
          }
});



  $(document).on('click','.view',function(){
      var customer_name = $(this).data("customer_name");
      
      var agreement_no = $(this).data("agreement_no");
      var prod_n = $(this).data("prod_n");
      var region_area = $(this).data("region_area");
      var office = $(this).data("office");
      var branch = $(this).data("branch");
      var cycle = $(this).data("cycle");
      var paymode = $(this).data("paymode");
      var emi = $(this).data("emi");
      var tet = $(this).data("tet");
      var noi = $(this).data("noi");
      var allocation_month_grp = $(this).data("allocation_month_grp");
      var tenor_over = $(this).data("tenor_over");
      var charges = $(this).data("charges");
      var gv = $(this).data("gv");
      var model = $(this).data("model");
      var regd_num = $(this).data("regd_num");
      var chasis_num = $(this).data("chasis_num");
      var engine_num = $(this).data("engine_num");
      var make = $(this).data("make");
      var rrm_name_no = $(this).data("rrm_name_no");
      var rrm_mail_id = $(this).data("rrm_mail_id");
      var coordinator_mail_id = $(this).data("coordinator_mail_id");
      var letter_refernce = $(this).data("letter_refernce");
      var dispatch_date = $(this).data("dispatch_date");
      var letter_date = $(this).data("letter_date");
      var valid_date = $(this).data("valid_date");
      var finance_company_name = $(this).data("finance_company_name");
    



      



          $('.agreement_no').html(agreement_no);
          $('.prod_n').html(prod_n);
          $('.region_area').html(region_area);
          $('.office').html(office);
          $('.branch').html(branch);
          $('.cycle').html(cycle);
          $('.paymode').html(paymode);
          $('.emi').html(emi);
          $('.tet').html(tet);
          $('.noi').html(noi);
          $('.allocation_month_grp').html(allocation_month_grp);
          $('.tenor_over').html(tenor_over);
          $('.charges').html(charges);
          $('.gv').html(gv);
          $('.model').html(model);
          $('.regd_num').html(regd_num);
          $('.chasis_num').html(chasis_num);
          $('.engine_num').html(engine_num);
          $('.make').html(make);
          $('.rrm_name_no').html(rrm_name_no);
          $('.rrm_mail_id').html(rrm_mail_id);
          $('.coordinator_mail_id').html(coordinator_mail_id);
          $('.letter_refernce').html(letter_refernce);
          $('.dispatch_date').html(dispatch_date);
          $('.letter_date').html(letter_date);
          $('.valid_date').html(valid_date);
          $('.customer_name').html(customer_name);
          $('.finance_company_name').html(finance_company_name);




  });



</script>


@endsection