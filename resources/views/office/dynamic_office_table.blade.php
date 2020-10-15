@foreach ($Officedata as $Officedata)
         <tr>
           <td>{{ isset($Officedata->headOfficesname->finance_company_name) ? $Officedata->headOfficesname->finance_company_name:'' }}</td>
           <td>{{ isset($Officedata->name) ? $Officedata->name:'' }}</td>
           <td>{{ isset($Officedata->contact_person) ? $Officedata->contact_person:'' }}</td>
           <td>{{ isset($Officedata->contact) ? $Officedata->contact:'' }}</td>
           <td>{{ isset($Officedata->address1) ? $Officedata->address1:'' }}</td>
           <td>{{ isset($Officedata->city) ? $Officedata->city:'' }}</td>
           <td>{{ isset($Officedata->branch_code) ? $Officedata->branch_code:'' }}</td>
           <td>{{ isset($Officedata->branch) ? $Officedata->branch:'' }}</td>
           <td>
            <div class="d-flex">
            <a title="Edit" href="{{route('office.edit',$Officedata->id)}}">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{URL::route('office.destroy',$Officedata->id)}}" method="POST">
                  <input type="hidden" name="_method" value="DELETE">
                  @csrf
                  <button style="background-color: Transparent;
                  background-repeat:no-repeat;
                  border: none;
                  cursor:pointer;
                  overflow: hidden;
                  outline:none;" class="text-danger mr-2"> <i class="fas fa-trash"></i></button>
              </form>
              </div>
           </td>

         </tr>
         @endforeach