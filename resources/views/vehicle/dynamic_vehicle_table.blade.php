<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="data">
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
            <tbody>
             
@if(count($vehicledata) > 0)
    @foreach ($vehicledata as $vehicle)
              <tr>
                  <td><input type="checkbox"  name="vehicle_id" value="{{$vehicle->id}}"></td>
                
                 <td>
                  <div class="d-flex">
                   {{--  <a title="View" href="{{route('Vehicle.show',$vehicle->id)}}">  --}}
                     <a title="View" class="view" href="#"                      
                     data-customer_name="{{ isset($vehicle->customer_name) ? $vehicle->customer_name:'' }}"
                     data-agreement_no="{{ isset($vehicle->agreement_no) ? $vehicle->agreement_no:'' }}"
                      data-prod_n="{{ isset($vehicle->prod_n) ? $vehicle->prod_n:'' }}"
                      data-region_area="{{ isset($vehicle->region_area) ? $vehicle->region_area:'' }}"
                      data-office="{{ isset($vehicle->office) ? $vehicle->office:'' }}"
                      data-branch="{{ isset($vehicle->branch) ? $vehicle->branch:'' }}"
                      data-cycle="{{ isset($vehicle->cycle) ? $vehicle->cycle:'' }}"
                      data-paymode="{{ isset($vehicle->paymode) ? $vehicle->paymode:'' }}"
                      data-emi="{{ isset($vehicle->emi) ? $vehicle->emi:'' }}"
                      data-tet="{{ isset($vehicle->tet) ? $vehicle->tet:'' }}"
                      data-noi="{{ isset($vehicle->noi) ? $vehicle->noi:'' }}"
                      data-allocation_month_grp="{{ isset($vehicle->allocation_month_grp) ? $vehicle->allocation_month_grp:'' }}"
                      data-tenor_over="{{ isset($vehicle->tenor_over) ? $vehicle->tenor_over:'' }}"
                      data-charges="{{ isset($vehicle->charges) ? $vehicle->charges:'' }}"
                      data-gv="{{ isset($vehicle->gv) ? $vehicle->gv:'' }}"
                      data-model="{{ isset($vehicle->model) ? $vehicle->model:'' }}"
                      data-regd_num="{{ isset($vehicle->regd_num) ? $vehicle->regd_num:'' }}"
                      data-chasis_num="{{ isset($vehicle->chasis_num) ? $vehicle->chasis_num:'' }}"
                      data-engine_num="{{ isset($vehicle->engine_num) ? $vehicle->engine_num:'' }}"
                      data-make="{{ isset($vehicle->make) ? $vehicle->make:'' }}"
                      data-rrm_name_no="{{ isset($vehicle->rrm_name_no) ? $vehicle->rrm_name_no:'' }}"
                      data-rrm_mail_id="{{ isset($vehicle->rrm_mail_id) ? $vehicle->rrm_mail_id:'' }}"
                      data-coordinator_mail_id="{{ isset($vehicle->coordinator_mail_id) ? $vehicle->coordinator_mail_id:'' }}"
                      data-letter_refernce="{{ isset($vehicle->letter_refernce) ? $vehicle->letter_refernce:'' }}"
                      data-dispatch_date="{{ isset($vehicle->dispatch_date) ? $vehicle->dispatch_date:'' }}"
                      data-letter_date="{{ isset($vehicle->letter_date) ? $vehicle->letter_date:'' }}"
                      data-valid_date="{{ isset($vehicle->valid_date) ? $vehicle->valid_date:'' }}"
                     
                      data-finance_company_name="{{ isset($vehicle->finance_company_name) ? $vehicle->finance_company_name:'' }}"
                     > 
                    <i class="fas fa-eye"> </i>
                    </a> &nbsp;
                    <a title="Edit" href="{{route('Vehicle.edit',$vehicle->id)}}"> 
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{URL::route('Vehicle.destroy',$vehicle->id)}}" method="POST">
                      <input type="hidden" name="_method" value="DELETE">
                      @csrf
                      <button style="background-color: Transparent;
                      background-repeat:no-repeat;
                      border: none;
                      cursor:pointer;
                      overflow: hidden;
                      outline:none;" class="text-danger"> <i class="fas fa-trash"></i></button>
                    </form>
                  </div>
                 </td>
                 <td tabindex="0">{{ isset($vehicle->regd_num) ? $vehicle->regd_num:'' }}
                 </td>
                 <td>{{ isset($vehicle->make) ? $vehicle->make:'' }}
                 </td>
                 <td> <a href="#" class="test" >{{ isset($vehicle->customer_name) ? $vehicle->customer_name:'' }}</a>
                    
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
                 
                 <td>{{ isset($vehicle->chasis_num) ? $vehicle->chasis_num:'' }}
                 </td>
                 <td>{{ isset($vehicle->engine_num) ? $vehicle->engine_num:'' }}
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
                  <td>{{ isset($vehicle->finance_company_name) ? $vehicle->finance_company_name:'' }}
                 </td>
              </tr>   
           @endforeach
           @endif
              </tbody>
          </table>
