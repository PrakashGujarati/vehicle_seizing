@extends('layouts.main')
@section('title', __('Vehicle List'))
@section('content')
<div class="main-content">
<div class="alert alert-success successmessage"></div>
<div class="alert alert-danger dangermessage"></div>

   <div class="row">
      <div class="col-md-6">
         <h5>Vehicle List</h5>
      </div>

   </div>
    <hr>

   <div class="row d-flex">
      <div class="col-md-4">
        <input type="text" class="searchString form-control" name="s" id="search"  placeholder="Search..." id="myInput"  autocompelete="false">
      </div>
      <div class="col-md-3">
      </div>
      <div class="col-md-4 text-right d-flex">
        
      </div>
    </div><br>
    
    <div class="table-responsive">
     <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="data">
        <thead>
           <tr> 
                <th>Action</th>

                @if($agentviewdata->customer_name)
                   <th>Customer Name</th>
                @endif
                @if($agentviewdata->agreement_no)
                  <th>Agreement No</th>
                @endif
                @if($agentviewdata->prod_n)
                  <th>Prod N</th>
                @endif

                @if($agentviewdata->region_area)
                   <th>Region Area</th>
                @endif
                @if($agentviewdata->office)
                    <th>Office</th>
                @endif
                @if($agentviewdata->branch)
                  <th>Branch</th>
                @endif
                @if($agentviewdata->cycle)
                    <th>Cycle</th>
                @endif
                @if($agentviewdata->paymode)
                   <th>Paymode</th>
                @endif
                @if($agentviewdata->emi)
                 <th>Emi</th>
                @endif
                @if($agentviewdata->tet)
                  <th>Tet</th>
                @endif
                @if($agentviewdata->noi)
                   <th>Noi</th>
                @endif
                @if($agentviewdata->allocation_month_grp)
                   <th>Allocation Month Grp</th>
                @endif
                @if($agentviewdata->tenor_over)
                   <th>Tenor Over</th>
                @endif
                @if($agentviewdata->charges)
                  <th>Charges</th>
                @endif
                @if($agentviewdata->gv)
                  <th>Gv</th>
                @endif
                @if($agentviewdata->model)
                  <th>Model</th>
                @endif
                @if($agentviewdata->regd_num)
                   <th>Regd Num</th>
                @endif
                @if($agentviewdata->chasis_num)
                  <th>Chasis Num</th>
                @endif
                @if($agentviewdata->engine_num)
                  <th>Engine Num</th>
                @endif
                @if($agentviewdata->make)
                   <th>Make</th>
                @endif
                @if($agentviewdata->rrm_name_no)
                   <th>Rrm Name No</th>
                @endif
                @if($agentviewdata->rrm_mail_id)
                  <th>Rrm Mail Id</th>
                @endif
                @if($agentviewdata->coordinator_mail_id)
                   <th>Letter Refernce</th>
                @endif
                @if($agentviewdata->letter_refernce)
                  <th>Dispatch Date</th>
                @endif
                @if($agentviewdata->dispatch_date)
                    <th>Dispatch Date</th>
                @endif
                @if($agentviewdata->letter_date)
                    <th>Letter Date</th>
                @endif
                @if($agentviewdata->valid_date)
                  <th>Valid Date</th>
                @endif
           </tr>
        </thead>
        <tbody class="vehicle_table_dynamic">
             @include('agent-permission.dynamic_vehicle_table')
        </tbody>
     </table>
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
      url : '{{ route('AgentVehicle.search') }}',
      data: {
              "s":myInput,
            },
      success:function(data){
         $('.vehicle_table_dynamic').html(data.data);
              tableScript();
      }
    });
  })




</script>


@endsection