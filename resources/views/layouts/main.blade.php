<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{-- {{ get_favicon() }} --}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">   
    <link rel="stylesheet" href="{{  url(mix('css/vendor.css')) }}">
    <link rel="stylesheet" href="{{  url(mix('css/app.css')) }}">    
    
    <link rel="stylesheet" href="{{ asset('css/AdminCustom.css') }}">    
    <link rel="stylesheet" href="{{ asset('css/dataTables/jquery.dataTables.min.css') }}">    

    <style>
.four-boot .dropdown .btn{
    
    overflow: hidden !important;
    white-space: nowrap !important;
    display: block !important;
    text-overflow: ellipsis !important;
}
.toolbar {
    float:left;
}
 .list-group-item  .remove_tmp_attachment{
          float: right !important;
          text-align: right;

        }

        iframe  .panel-heading .panel-title{
          display: none !important;
        }

  
  /* relevant styles */
.img__wrap {
  position: relative;
 
}

.img__description_layer {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(36, 62, 206, 0.6);
  color: #fff;
  visibility: hidden;
  opacity: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 30px;

  /* transition effect. not necessary */
  transition: opacity .2s, visibility .2s;
}

.img__wrap:hover .img__description_layer {
  visibility: visible;
  opacity: 1;
}

.img__description {
  transition: .2s;
  transform: translateY(1em);
}

.img__wrap:hover .img__description {
  transform: translateY(0);
}

.daterangepicker{
    z-index: 1100 !important;
}
.btn{
  border-radius: 2px;

}
</style>
@yield('css')

{{-- 
{{ load_extended_files('admin_css') }} --}}

</head>
<body>

<nav class="navbar navbar-expand navbar-dark bg-dark flex-md-nowrap">
   <a class="navbar-brand navbar-brand col-md-1 mr-0 d-none d-sm-block" href="#">
      <div>
       Swotsiz
      </div>
   </a>
   <div class="collapse navbar-collapse" id="navbarsExample02">
      <ul class="navbar-nav">
         <li class="nav-item active">
            <a href="#" id="sidebarCollapse"><i class="fa fa-bars"></i></a>
         </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        {{--  @include('notification_bell') --}} 
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{-- <img class="mr-2 staff-profile-image-small" src="#"> --}} {{Auth::user()->name}}</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01" style="min-width: 300px; font-size: 14px;">
               
               <h6 class="dropdown-header text-center">{{Auth::user()->name}}</h6>
               
               <hr>
               {{-- @endif --}}
               <a class="dropdown-item" href="">My Account</a>
               <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  
               </form>
            </div>
         </li>
      </ul>
   </div>
</nav>
    
<div class="wrapper">
   <!-- Sidebar Holder -->
   @include('layouts.menu')
   <!-- Page Content Holder -->
   <div id="content">
    <br>
      <div class="container">
         <div class="row">
            <div class="col-md-12">               
               @include('layouts.flash_message')
               @yield('content')
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">

    

</script>
  
<script type="text/javascript" src="{{  url(mix('js/app.js')) }}"></script>
<script  type="text/javascript" src="{{  url(mix('js/vendor.js')) }}"></script>
<script  type="text/javascript" src="{{  url(mix('js/main.js')) }}"></script>
<script  type="text/javascript" src="{{ asset('vendor/gantt-chart/js/modified_jquery.fn.gantt.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/dataTables/jquery.dataTables.min.js') }}" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>


{{-- 
{{ load_extended_files('admin_js') }} --}}
<script type="text/javascript">  


function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

 function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }
 


</script>


 
    <script src="https://js.pusher.com/4.3/pusher.min.js"></script> 

<script  src="{{  url(mix('js/tinymce.js')) }}"></script>



@yield('onPageJs')
 

</body>

</html>
