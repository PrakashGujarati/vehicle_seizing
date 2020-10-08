   @foreach ($headofficesdata as $headoffice)
         <tr>
           <td>{{ isset($headoffice->finance_company_name) ? $headoffice->finance_company_name:'' }}</td>
           <td>{{ isset($headoffice->branch_code) ? $headoffice->branch_code:'' }}</td>
           <td>{{ isset($headoffice->assigned_manager) ? $headoffice->assigned_manager:'' }}</td>
           <td>{{ isset($headoffice->branch_address) ? $headoffice->branch_address:'' }}</td>
           <td>{{ isset($headoffice->branch_email) ? $headoffice->branch_email:'' }}</td>
           <td>{{ isset($headoffice->city) ? $headoffice->city:'' }}</td>
           <td>{{ isset($headoffice->branch_contact) ? $headoffice->branch_contact:'' }}</td>
           <td>{{ isset($headoffice->manage_email) ? $headoffice->manage_email:'' }}</td>
           
            <td>{{ isset($headoffice->manager_contact) ? $headoffice->manager_contact:'' }}</td>
           
            <td>{{ isset($headoffice->gst) ? $headoffice->gst:'' }}</td>


           <td>
            <div class="d-flex">
            <a title="Edit" href="{{route('finance-office.edit',$headoffice->id)}}">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{URL::route('finance-office.destroy',$headoffice->id)}}" method="POST">
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