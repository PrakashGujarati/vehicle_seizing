@extends('layouts.main')
@section('title', __('Vehicle Map'))
@section('css')
<style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>

@endsection

@section('content')
<div class="main-content">
   <div class="row">
      <div class="col-md-6">
         <h5>Vehicle Map</h5>
      </div>
   </div>
    <hr>
  
    <div id="map"></div>
    <br>
    <center>
      <a href="{{ route('vehicle-searchlist.show',$Vehicles->user_id) }}" class="btn btn-info" title="">Back</a>
    </center>
</div>
  
@endsection
@section('onPageJs')
 


 <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru

  var uluru = {lat: {{$Vehicles->latitude}}, lng: {{$Vehicles->longitude}}};

  //var uluru = {lat: -25.344, lng: 131.036};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    {{-- <script defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script> --}}
<script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQpp4NeABGHsTSgMWyWtKbuje0MrGhfng&callback=initMap">
    </script>

@endsection