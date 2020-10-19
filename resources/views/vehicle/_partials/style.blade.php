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

      td {
          cursor: pointer;
      }

      .selected_row {
          background-color: #d0ffd8 !important;
      }
  </style>

@endsection
