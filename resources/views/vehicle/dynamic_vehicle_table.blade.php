    @foreach ($vehicledata as $vehicle)
              <tr>
                  <td><input type="checkbox"  name="vehicle_id" value="{{$vehicle->id}}"></td>
                
                 <td>
                  <div class="d-flex">
                    <a title="View" href="{{route('Vehicle.show',$vehicle->id)}}"> 
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
           @endforeach
           