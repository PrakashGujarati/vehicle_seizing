
   @if(count($vehicledata) > 0)

  
<div class="table-responsive">
     <table class="table table-hover table-bordered table-striped datatable" cellspacing="0" width="100%" id="data">
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
        </thead>
        <tbody>

{{--   @foreach ($vehicledata as $vehicle)
              <tr>
                 <td tabindex="0"> <a href="#" class="test" >{{ isset($vehicle->customer_name) ? $vehicle->customer_name:'' }}</a>
                    
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
                 <td>{{ isset($vehicle->tenor_over) ? $vehicle->tenor_over:'' }}
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
                 <td>{{ isset($vehicle->letter_date) ? $vehicle->letter_date:'' }}
                 </td>
                  <td>{{ isset($vehicle->valid_date) ? $vehicle->valid_date:'' }}
                 </td>
              </tr>   
           @endforeach --}}
        


</table>
      
   </div>


   @endif   