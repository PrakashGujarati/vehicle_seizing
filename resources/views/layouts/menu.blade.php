
<nav id="sidebar" class="sidebar">
    <div class="sidebar-sticky">
 
    <ul class="list-unstyled components" style="font-size: 14px;">

        
        {{-- {{ Eventy::action('main_menu', ['menu_order' => 1]) }} --}}




         <li  class="">
            <a href="/"><i class="fas fa-tachometer-alt" aria-hidden="true"></i>Dashboard</a>
        </li>
{{-- 
        {{ Eventy::action('main_menu', ['menu_order' => 2]) }} --}}

        @if( Auth::user()->name == "Admin")
        <li  class="#">
            <a href="{{ route('Vehicle.index') }}"><i class="fas fa-car menu-icon"></i>Vehicles</a>
        </li>


        <li  class="#">

             <a href="#salesSubmenu" data-toggle="collapse" aria-expanded="false">
                <i class="fas fa-building menu-icon"></i>Finance</a>
            <ul class="collapse list-unstyled" id="salesSubmenu">
                <li  class=""><a href="{{ route('finance-office.index') }}">Finance Office</a></li>
                <li  class=""><a href="{{ route('office.index') }}">Branch Office</a></li>
            </ul>
        </li>
        

        <li  class="#">
             <a href="#salesSubmenu2" data-toggle="collapse" aria-expanded="false">
                <i class="fas fa-user-plus menu-icon"></i>Agent</a>
            <ul class="collapse list-unstyled" id="salesSubmenu2">
                <li  class=""><a href="{{ route('user.index') }}">User</a></li>
                <li  class=""><a href="{{ route('subscribers.index') }}">Subscriptions</a></li>
            </ul>
        </li>

        <li  class="#">
            <a href="{{ route('role.get') }}"><i class="fas fa-user menu-icon"></i>Roles</a>
        </li>
      
    
      {{--   <li  class="#">
            <a href="{{ route('subscribers.index') }}"><i class="fas fa-user menu-icon"></i>Subscriptions</a>
        </li> --}}
        <li  class="#">
            <a href="{{ route('assigned-Vehicle.index') }}"><i class="fas fa-users menu-icon"></i>Assigned Vehicle</a>
        </li>
         <li  class="#">
            <a href="{{ route('vehicle-searchlist.index') }}"><i class="fas fa-search menu-icon"></i>Agent Search</a>
        </li>
           <li  class="#">
            <a href="{{ route('agent-view-permission.index') }}"><i class="fa fa-cog menu-icon"></i>Setting</a>
        </li>
        
       @endif

        @if( Auth::user()->role == "agent")

        <li  class="#">
            <a href="{{ route('agentview.index') }}"><i class="fas fa-user menu-icon"></i>
             Identify Five Vehicles</a>
        </li>
       @endif
 

    </ul>
    <ul class="list-unstyled CTAs">
        <li><a href="#" class="article"></a></li>
    </ul>
    </div>
</nav>


