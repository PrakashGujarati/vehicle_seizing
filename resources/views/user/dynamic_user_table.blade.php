@foreach ($userdata as $user)
<tr>
  <td>{{ isset($user->name) ? $user->name:'' }}</td>
  <td>{{ isset($user->email) ? $user->email:'' }}</td>
  <td>{{ isset($user->contact) ? $user->contact:'' }}</td>
  <td>{{ isset($user->role) ? $user->role:'' }}</td>
  <td>{{ isset($user->status) ? $user->status:'' }}</td>
  <td>

      <a title="Edit" href="{{route('user.edit',$user->id)}}">
        <i class="fas fa-edit"></i>
      </a>

    
  </td>

</tr>
@endforeach