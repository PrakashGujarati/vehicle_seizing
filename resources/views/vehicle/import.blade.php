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
      <div class="col-md-6 d-flex flex-row-reverse">

         <a href="{{route('vehicle.download_blank') }}" class="btn btn-success btn-sm">Simple</a>&nbsp

          <form id="submitData" action="{{ route('import.vehicle') }}" method="post" enctype="multipart/form-data"> 
         @csrf
            <input type="file"  name="file" id="input-file-now" class="dropify " />
            <button type="submit" class="btn btn-info btn-sm addBtn">Submit</button>
         </form>
      </div>
      {{-- <div class="col-md-1" style="text-align: right;">
        
      </div> --}}
   </div>


   <hr>
      <div class="row">
      <div class="col-md-12">
         <div class="float-md-right">
          <div class="input-group ">
               <input type="text" class="searchString form-control" name="s" id="search"  placeholder="Search..." id="myInput"  autocompelete="false"> 
            </div><br>
         </div>
      </div>
   </div>

   <div class="table-responsive">
   <table class="table table-striped table-bordered" cellspacing="0" id="data">
      <thead>
         <tr>
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
          <tbody class="import_vehicle_table_dynamic">
             @include('vehicle.dynamic_import_vehicle_table')
        </tbody>
       
         
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




</script>

@endsection