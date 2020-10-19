@extends('layouts.main')
@section('title', __('Vehicle Search List'))
@section('content')
  <div class="main-content">
    <div class="row">
      <div class="col-12">
        <h5>Agents</h5>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table  <!--table-bordered-->" id="user_list_table">
            <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('onPageJs')

  <script type="text/javascript">


    $(document).ready(function () {
      $('.successmessage').css('display', 'none');
      $('.dangermessage').css('display', 'none');


      let $vehicles_table = $('#user_list_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          'url': '{!! route('VehicleSearchlist.datatables') !!}',
        },
        columns: [
          {data: 'id', name: 'id'},
          {data: 'name', name: 'name'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
      });

    });


  </script>



@endsection