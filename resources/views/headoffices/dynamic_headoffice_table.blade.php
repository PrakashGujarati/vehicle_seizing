   @foreach ($headofficesdata as $headoffice)
         <tr>
           <td>{{ isset($headoffice->name) ? $headoffice->name:'' }}</td>
           <td>{{ isset($headoffice->vendor_code) ? $headoffice->vendor_code:'' }}</td>
           <td>{{ isset($headoffice->city) ? $headoffice->city:'' }}</td>
           <td>{{ isset($headoffice->contact_person) ? $headoffice->contact_person:'' }}</td>
           <td>{{ isset($headoffice->address1) ? $headoffice->address1:'' }}</td>
           <td>{{ isset($headoffice->address2) ? $headoffice->address2:'' }}</td>
           <td>{{ isset($headoffice->contact) ? $headoffice->contact:'' }}</td>
           <td>{{ isset($headoffice->gst) ? $headoffice->gst:'' }}</td>
           <td>
            <div class="d-flex">
            <a title="Edit" href="{{route('headoffice.edit',$headoffice->id)}}">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{URL::route('headoffice.destroy',$headoffice->id)}}" method="POST">
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