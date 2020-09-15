@extends('layouts.main')
@section('title', __('Vehicle List'))
@section('css')
<style type="text/css">

</style>
@section('content')

<div class="main-content">
   <div class="row">
      <div class="col-md-6">
         <h5>Vehicle</h5>
      </div>
      <div class="col-md-6">
         <div class="float-md-right">
          
            <a class="btn btn-primary btn-sm" href="{{ route('Vehicle.create') }}">New Vehicle Add</a> 
            <a class="btn btn-primary btn-sm" href="{{ route('Vehicle.importpage') }}">Import Vehicle</a>

            <a class="btn btn-primary btn-sm" href="{{ route('export.vehicle') }}">Exort Vehicle</a>

         </div>
      </div>
   </div>
    
  
   <hr>
   
  <div class="row">
     <div class="col-md-12">
       <table  id="example" class="display nowrap" >
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
              <th>Tenor</th>
              <th>Over</th>
              <th>Charges</th>
              <th>Gv</th>
              <th>Model</th>
              <th>Regd Num</th>
              <th>Chasis Num</th>
              <th>Engine Num</th>
              <th>Make</th>
              <th>Rrm Name No</th>
              <th>Rrm Mail Id</th>
              <th>Letter Refernce</th>
              <th>Dispatch Date</th>
              <th>Letter Date</th>
              <th>Valid Date</th>
           </tr>
           <tbody>
           @foreach ($vehicledata as $vehicle)
              <tr>
                 {{-- <td>{{ isset($vehicle->customer_name) ? $vehicle->customer_name:'' }}
                 </td> --}}
                 <td tabindex="0"> <a href="#" class="test" >{{ isset($vehicle->customer_name) ? $vehicle->customer_name:'' }}</a>
                    <div style="min-height: 25px;">
                       {{-- <div class="row-options" style="display: none;"> --}}
                       <div> 
                          <a class="" href="{{route('Vehicle.edit',$vehicle->id)}}">Edit</a>
                          <form action="{{URL::route('Vehicle.destroy',$vehicle->id)}}" method="POST">
                                  <input type="hidden" name="_method" value="DELETE">
                                  @csrf
                                  <button style="background-color: Transparent;
                                  background-repeat:no-repeat;
                                  border: none;
                                  cursor:pointer;
                                  overflow: hidden;
                                  outline:none;" class="text-danger mr-2">Delete</button>
                              </form>
                       </div>
                    </div>
                 </td>
                 <td>{{ isset($vehicle->agreement_no) ? $vehicle->agreement_no:'' }}
                 </td>
                 <td>{{ isset($vehicle->prod_n) ? $vehicle->prod_n:'' }}
                 </td>
                 <td>{{ isset($vehicle->region_area) ? $vehicle->region_area:'' }}
                 </td>
                 <td>{{ isset($vehicle->office) ? $vehicle->office:'' }}
                 </td>
                 <td>{{ isset($vehicle->branch) ? $vehicle->branch:'' }}
                 </td>
                 <td>{{ isset($vehicle->cycle) ? $vehicle->cycle:'' }}
                 </td>
                 <td>{{ isset($vehicle->paymode) ? $vehicle->paymode:'' }}
                 </td>
                 <td>{{ isset($vehicle->emi) ? $vehicle->emi:'' }}
                 </td>
                 <td>{{ isset($vehicle->tet) ? $vehicle->tet:'' }}
                 </td>
                 <td>{{ isset($vehicle->noi) ? $vehicle->noi:'' }}
                 </td>
                 <td>{{ isset($vehicle->allocation_month_grp) ? $vehicle->allocation_month_grp:'' }}
                 </td>
                 <td>{{ isset($vehicle->tenor) ? $vehicle->tenor:'' }}
                 </td>
                 <td>{{ isset($vehicle->over) ? $vehicle->over:'' }}
                 </td>
                 <td>{{ isset($vehicle->charges) ? $vehicle->charges:'' }}
                 </td>
                 <td>{{ isset($vehicle->gv) ? $vehicle->gv:'' }}
                 </td>
                 <td>{{ isset($vehicle->model) ? $vehicle->model:'' }}
                 </td>
                 <td>{{ isset($vehicle->regd_num) ? $vehicle->regd_num:'' }}
                 </td>
                 <td>{{ isset($vehicle->chasis_num) ? $vehicle->chasis_num:'' }}
                 </td>
                 <td>{{ isset($vehicle->engine_num) ? $vehicle->engine_num:'' }}
                 </td>
                 <td>{{ isset($vehicle->make) ? $vehicle->make:'' }}
                 </td>
                 <td>{{ isset($vehicle->rrm_name_no) ? $vehicle->rrm_name_no:'' }}
                 </td>
                 <td>{{ isset($vehicle->rrm_mail_id) ? $vehicle->rrm_mail_id:'' }}
                 </td>
                 <td>{{ isset($vehicle->coordinator_mail_id) ? $vehicle->coordinator_mail_id:'' }}
                 </td>
                 <td>{{ isset($vehicle->letter_refernce) ? $vehicle->letter_refernce:'' }}
                 </td>
                 <td>{{ isset($vehicle->dispatch_date) ? $vehicle->dispatch_date:'' }}
                 </td>
                  <td>{{ isset($vehicle->valid_date) ? $vehicle->valid_date:'' }}
                 </td>
              </tr>   
           @endforeach
           </tbody>
           

           
        </thead>
     </table>
     </div>
  </div> 
  
</div>  


@endsection
@section('onPageJs')
    <script>
     $(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
  } );
 
   $(document).ready(function() {
        $("test").mouseover(function(){
         alert("sdfsd");
          $("div.row-options").css("background-color", "yellow");
        });
      on('mouseover', 'tr', function() {
                jQuery(this).find('div.row-options').show();
            }).
            on('mouseout', 'tr', function() {
                jQuery(this).find('div.row-options').hide();
            });
       
    });


   </script>
@endsection