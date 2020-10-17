@extends('layouts.main')
@section('title', __('Vehicle :import'))

@section('content')
<div class="main-content">
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
           <h5>Imports Vehicle</h5>
      </div>
      <div class="col-md-6">
        
      
      <form class="d-flex" id="submitData"  action="{{ route('import.vehicle') }}" method="post" enctype="multipart/form-data"> 
        @csrf
      <div class="col-md-4">
        <select name="finance_company_name" class="form-control" required="">
          <option value="" disabled=""  selected="">Select Finance Companys</option>
          @foreach ($finance_offices as $office)
            <option value="{{$office->finance_company_name}}">{{$office->finance_company_name}}</option>
          @endforeach
         </select>
      </div>

      <div class="col-md-5  d-flex">
         
         
            <input type="file" style="width: 200px" name="file" id="input-file-now" class="dropify " />
            &nbsp   
            <button type="submit" class="btn btn-info btn-sm addBtn">Submit</button>
         
         &nbsp
         <a  style="" href="{{route('vehicle.download_blank') }}" class="btn btn-success btn-sm">Simple</a>

      </div>
      </form>
      </div>
    {{--   <div class="col-md-4 text-right d-flex">
        <form class="d-flex" method="POST" action="{{ route('vehicle.unassigned') }}">
          @csrf
          <input type="date" class="form-control" id="date" name="date" >&nbsp;
          <button class="btn btn-info btn-sm" type="submit" name="submit">        
        Unassign</button>&nbsp;
        </form>
        <button id="deleterecord" class="btn btn-danger btn-sm"> Delete</button>       
      </div> --}}
    </div>


 <br>

   <div class="table-responsive">
   <table class="table table-striped table-bordered mdl-data-table" cellspacing="0" id="data">
      <thead>
         <tr>
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
         {{--  <tbody class="import_vehicle_table_dynamic">
             @include('vehicle.dynamic_import_vehicle_table')
        </tbody> --}}
       
         
      </thead>
   </table>
</div>
<div class="mt-5" style="font-size: 13px;">
       <p>1. Your data structure in .csv/.xlsx file should as same as the example below. The first line of your Excel file should be the column headers as in the table example. Also make sure that your file is UTF-8</p>
      <p>2. Duplicate email rows are not allowed. Rows with empty first column will be ignored</p>
      <br>
   </div> 


   
  
</div>
@endsection

@section('onPageJs')

 
<script type="text/javascript">



$('#search').on('keyup',function(){
    var myInput=$(this).val();
    $.ajax({
      type : 'get',
      url : '{{ route('Vehicleimport.search') }}',
      data: {
              "s":myInput,
            },
      success:function(data){
         $('.import_vehicle_table_dynamic').html(data.data);
              tableScript();
      }
    });
  })



   $(document).ready(function() {
        $('.mdl-data-table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url" : "{{ route('manageVehicleimports') }}",
                        "type": "POST",
                        'headers': {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    },
                    order: [[0, 'desc']],
                    columns: [
                                
                              
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



</script>

@endsection