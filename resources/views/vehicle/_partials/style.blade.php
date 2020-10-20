@section('css')
  <link rel="stylesheet" href="{{  asset('vendor/dataTables.checkboxes.css') }}">
  <style>
      tbody {
          display: block;
          overflow-y: scroll !important;
      }

      thead {
          display: block;
      }

      .sorting, .sorting_asc, .sorting_desc {
          background: none;
      }

      .selected_row {
          background-color: #d0ffd8 !important;
      }

      #show_vehicle_tbody tr td {
          width: 100%;
          text-transform: capitalize;
      }

  </style>

@endsection
