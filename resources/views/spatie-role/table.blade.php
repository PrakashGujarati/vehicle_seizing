@extends('layouts.main')
@section('title')
@section('content')
@section('css')
<style type="text/css">
  .header-roles
  {
    background: #1976d2;
    padding: 0 20px;
    height: 30px;
    line-height: 30px;
    clear: left;
    position: absolute;
    top: 12px;
    left: -2px;
    color: #ffffff;
  }
  body {
    font-family: "Poppins", sans-serif;
    color: #67757c;
    font-weight: 300;
  }

  .ribbon-primary {
    background: #5c4ac7;
  }
  .ribbon {
    padding: 0 20px;
    height: 30px;
    line-height: 30px;
    clear: left;
    position: absolute;
    top: 12px;
    left: -2px;
    color: #ffffff;
}
.ribbon-right {
    left: auto;
    right: -2px;
}


  </style>
  @endsection
  @if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header"><<span class="header-roles"> Roles</span></div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Sr</th>
                  <th>Name</th>
                  {{-- <th>DiplayName</th> --}}
                </tr>
              </thead>
              <tbody>
                @isset($roles)
                @forelse ($roles as $role)
                <tr>
                  <td> {{ $loop->iteration }}</td>
                  <td>
                    <span style="cursor: pointer">
                      <a href="{{ route('role.get', ['role_id' => $role->id ]) }}">
                        {{ $role->slug ?? $role->name }}
                      </a>
                    </span>
                  </td>
                  {{-- <td>{{ $role->slug }}</td> --}}
                </tr>
                @empty
                <p>No Roles</p>
                @endforelse
                @endisset

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            @if(request('role_id') && $selected_role )
            <div class="ribbon ribbon-primary"> {{ $selected_role->slug ?? $selected_role->name }} has Permissions</div>
            <div class="text-right ribbon ribbon-primary ribbon-right"  
            style="cursor:pointer;"
            onclick="event.preventDefault(); document.getElementById('assign_permission_form').submit();">
            Save
          </div>
          <br><br>
          <div class="ribbon-content">
            <form action="{{ route('role.assign_permission', [ 'role_id' => request('role_id') ]) }}" method="post" id="assign_permission_form">
              @csrf
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      {{-- <th>Permission</th> --}}
                      <th>View</th>
                      <th>Create</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($permissions as $permission)
       
                    <td>
                      <input type="checkbox" class="chk-col-blue"
                      id="permission_checkbox_{{$permission->id}}"
                      name="permissions[{{$permission->name}}]"
                      {{ in_array($permission->name , $selected_role->getAllPermissions()->pluck('name')->toArray()) ? "checked":"" }}
                      >
                      <label for="permission_checkbox_{{$permission->id}}">
                        {{ $permission->slug }}
                      </label>
                    </td>
                    @if ( $loop->iteration % 4 == 0 )
                    <tr> @endif
                      @empty
                      <p> Role does not have any permissions yet </p>
                      @endforelse
                    </tbody>
                  </table>
                </div>

                {{-- <button type="submit" class="btn btn-info waves-effect waves-light m-t-10"> Save</button> --}} 
              </form>
            </div>
            @else
            <div class="ribbon ribbon-primary"> Permissions</div>
            <hr>
            <p>Please select any appropriate Role</p>
            @endif
          </div>
        </div>
      </div>

    </div>
  </div>
  @endsection
@section('onPageJs')

  
<script type="text/javascript">

  $( document ).ready(function() {
    $(".alert" ).fadeOut(3000);
});

  </script>
 @endsection
