    @foreach ($vehicledata as $vehicle)
              <tr>
                                  
                 <td>
                  <div class="d-flex">
                    <a title="View" href="{{route('agent-view-permission.show',$vehicle->id)}}"> 
                    <i class="fas fa-eye"> </i>
                    </a>
                  </div>
                 </td>
                @if($agentviewdata->customer_name)
                 <td tabindex="0"> <a href="#" class="test" >{{ isset($vehicle->customer_name) ? $vehicle->customer_name:'' }}</a>
                 </td>
                @endif
                @if($agentviewdata->agreement_no)
                 <td>{{ isset($vehicle->agreement_no) ? $vehicle->agreement_no:'' }}
                 </td>
                @endif
                @if($agentviewdata->prod_n)
                 <td>{{ isset($vehicle->prod_n) ? $vehicle->prod_n:'' }}
                 </td>
                 @endif
                @if($agentviewdata->region_area)
                 <td>{{ isset($vehicle->region_area) ? $vehicle->region_area:'' }}
                 </td>
                 @endif
                @if($agentviewdata->office)
                 <td>{{ isset($vehicle->office) ? $vehicle->office:'' }}
                 </td>
                 @endif
                @if($agentviewdata->branch)
                 <td>{{ isset($vehicle->branch) ? $vehicle->branch:'' }}
                 </td>
                @endif
                @if($agentviewdata->cycle)
                 <td>{{ isset($vehicle->cycle) ? $vehicle->cycle:'' }}
                 </td>
                @endif
                @if($agentviewdata->paymode)
                 <td>{{ isset($vehicle->paymode) ? $vehicle->paymode:'' }}
                 </td>
                @endif
                @if($agentviewdata->emi)
                 <td>{{ isset($vehicle->emi) ? $vehicle->emi:'' }}
                 </td>
                @endif
                @if($agentviewdata->tet)
                 <td>{{ isset($vehicle->tet) ? $vehicle->tet:'' }}
                 </td>
                @endif
                @if($agentviewdata->noi)
                 <td>{{ isset($vehicle->noi) ? $vehicle->noi:'' }}
                 </td>
                @endif
                @if($agentviewdata->allocation_month_grp)
                 <td>{{ isset($vehicle->allocation_month_grp) ? $vehicle->allocation_month_grp:'' }}
                 </td>
                @endif
                @if($agentviewdata->tenor_over)
                 <td>{{ isset($vehicle->tenor_over) ? $vehicle->tenor_over:'' }}
                 </td>
                @endif
                @if($agentviewdata->charges)
                 <td>{{ isset($vehicle->charges) ? $vehicle->charges:'' }}
                 </td>
                 @endif
                @if($agentviewdata->gv)
                 <td>{{ isset($vehicle->gv) ? $vehicle->gv:'' }}
                 </td>
                 @endif
                @if($agentviewdata->model)
                 <td>{{ isset($vehicle->model) ? $vehicle->model:'' }}
                 </td>
                 @endif
                @if($agentviewdata->regd_num)
                 <td>{{ isset($vehicle->regd_num) ? $vehicle->regd_num:'' }}
                 </td>
                 @endif
                @if($agentviewdata->chasis_num)
                 <td>{{ isset($vehicle->chasis_num) ? $vehicle->chasis_num:'' }}
                 </td>
                 @endif
                @if($agentviewdata->engine_num)
                 <td>{{ isset($vehicle->engine_num) ? $vehicle->engine_num:'' }}
                 </td>
                 @endif
                @if($agentviewdata->make)
                 <td>{{ isset($vehicle->make) ? $vehicle->make:'' }}
                 </td>
                 @endif
                @if($agentviewdata->rrm_name_no)
                 <td>{{ isset($vehicle->rrm_name_no) ? $vehicle->rrm_name_no:'' }}
                 </td>
                 @endif
                @if($agentviewdata->rrm_mail_id)
                 <td>{{ isset($vehicle->rrm_mail_id) ? $vehicle->rrm_mail_id:'' }}
                 </td>
                 @endif
                @if($agentviewdata->coordinator_mail_id)
                 <td>{{ isset($vehicle->coordinator_mail_id) ? $vehicle->coordinator_mail_id:'' }}
                 </td>
                 @endif
                @if($agentviewdata->letter_refernce)
                 <td>{{ isset($vehicle->letter_refernce) ? $vehicle->letter_refernce:'' }}
                 </td>
                 @endif
                 @if($agentviewdata->dispatch_date)
                 <td>{{ isset($vehicle->dispatch_date) ? $vehicle->dispatch_date:'' }}
                 </td>
                @endif
                @if($agentviewdata->letter_date)
                 <td>{{ isset($vehicle->letter_date) ? $vehicle->letter_date:'' }}
                 </td>
                @endif
                @if($agentviewdata->valid_date)
                  <td>{{ isset($vehicle->valid_date) ? $vehicle->valid_date:'' }}
                 </td>
                @endif
              </tr>   
           @endforeach
           