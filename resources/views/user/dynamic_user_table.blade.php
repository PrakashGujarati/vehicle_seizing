@foreach ($userdata as $user)
<tr>
  <td>{{ isset($user->name) ? $user->name:'' }}</td>
  <td>{{ isset($user->email) ? $user->email:'' }}</td>
  <td>{{ isset($user->contact) ? $user->contact:'' }}</td>
  <td>{{ isset($user->role) ? $user->role:'' }}</td>


  <td>
    @if ($user->status=="Active")
        <span style="background:#0CC27E;color: white;padding: 2px;border-radius: 5px;padding: 5px">Active</span>
        @else
        <span style="background:#FF586B;padding: 2px;color: white;border-radius: 5px;padding: 5px">Inactive</span>
    @endif
{{-- 
    {{ isset($user->status) ? $user->status:'' }}</td> --}}
  <td>

      <a title="Edit" href="{{route('user.edit',$user->id)}}">
        <i class="fas fa-edit"></i>
      </a>

    
  </td>

</tr>
@endforeach