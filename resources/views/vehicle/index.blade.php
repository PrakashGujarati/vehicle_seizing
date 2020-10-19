@extends('layouts.main')
@section('title', __('Vehicle List'))

@section('css')
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
  </style>
  <link rel="stylesheet" href="{{  asset('vendor/dataTables.checkboxes.css') }}">
@endsection

@section('js')
  <script src="{{  asset('vendor/dataTables.checkboxes.min.js') }}"></script>
  {{--  <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/js/dataTables.checkboxes.min.js"></script>--}}
  {{--  DOC:: https://jsfiddle.net/gyrocode/snqw56dw/--}}
@endsection

@section('content')
  <div class="main-content">
    <div class="row">
      <div class="col-md-6">
        <h5>Vehicle List</h5>
      </div>
      <div class="col-md-6">
        <div class="float-md-right">
          <a href="{{ route('Vehicle.create') }}" class="btn btn-sm text-success"> +Add </a>
          <a type="button" href="{{ route('vehicles.create') }}" class="btn btn-sm btn-outline-primary <!--rounded-pill-->">
            <i class=""> </i> Export
          </a>
          <a type="button" href="#" class="btn btn-sm btn-outline-warning {{--rounded-pill--}}"
             data-toggle='modal' data-target='#csv_import_modal'>
            <i class=""> </i> Import
          </a>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <label><strong>Finance Company :</strong></label>
          <label>
            <select id="finance_office" class="form-control finance_office">
              <option value="">--Select Finance--</option>
              @foreach (@$finance_offices as $office)
                <option value="{{$office->finance_company_name}}">{{$office->finance_company_name}}</option>
              @endforeach
            </select>
          </label>
        </div>
      </div>

      <div class="col-12">
        <form id="frm-example" action="/" method="POST">
          <div class="table-responsive">
            <table class="table  <!--table-bordered-->" id="vehicles-table">
              <thead>
              <tr style="position:sticky;">
                <th>#</th>
                <th>Action</th>
                <th>Status</th>
                <th>Id</th>
                <th>Vehicle No</th>
                <th>Make</th>
                <th>Customer Name</th>
                <th>Agreement No</th>
                <th>Prod N</th>
                <th>Region Area</th>
                <th>Office</th>
                <th>Branch</th>
                <th>Cycle</th>
                <th>Paymode</th>
                <th>Emi</th>
                <th>Tet</th>
                <th>Noi</th>
                <th>Allocation Month Grp</th>
                <th>Tenor Over</th>
                <th>Charges</th>
                <th>Gv</th>
                <th>Model</th>
                <th>Chasis Num</th>
                <th>Engine Num</th>
                <th>Rrm Name No</th>
                <th>Rrm Mail Id</th>
                <th>Coordinator mail</th>
                <th>Letter Refernce</th>
                <th>Dispatch Date</th>
                <th>Letter Date</th>
                <th>Valid Date</th>
                <th>Finance Companys</th>
              </tr>
              </thead>
            </table>
          </div>
          <input type="submit" value="Submit">
          <p><b>Selected rows data:</b></p>
          <pre id="example-console-rows"></pre>
          <p><b>Form data as submitted to the server:</b></p>
          <pre id="example-console-form"></pre>
        </form>
      </div>
    </div>
  </div>

  @includeIf('_partial.html_modal', ['modal_title'=> "Detail",]);

  @includeIf('vehicle.csv_import_modal', ['modal_title'=> "Detail",]);

@endsection

@section('onPageJs')
  <script type="text/javascript">
    $(function () {
      let $vehicles_table = $('#vehicles-table').DataTable({
        processing: true,
        serverSide: true,
        {{--ajax: '{!! route('api.vehicles.get') !!}',--}}
        ajax: {
          'url': '{!! route('api.vehicles.get') !!}',
          data: function (d) {
            d.search = $('input[type="search"]').val()
            d.finance_office = $('.finance_office').val()
            return d;
          }
        },
        columns: [
          {data: 'id', name: 'id', orderable: false, searchable: false},
          {data: 'id', name: 'id'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
          {data: 'status', name: 'status'},
          {data: 'finance_company_name', name: 'finance_company_name'},
          {data: 'regd_num', name: 'regd_num'},
          {data: 'make', name: 'make'},
          {data: 'customer_name', name: 'customer_name'},
          {data: 'agreement_no', name: 'agreement_no'},
          {data: 'prod_n', name: 'prod_n'},
          {data: 'region_area', name: 'region_area'},
          {data: 'office', name: 'office'},
          {data: 'branch', name: 'branch'},
          {data: 'cycle', name: 'cycle'},
          {data: 'paymode', name: 'paymode'},
          {data: 'emi', name: 'emi'},
          {data: 'tet', name: 'tet'},
          {data: 'noi', name: 'noi'},
          {data: 'allocation_month_grp', name: 'allocation_month_grp'},
          {data: 'tenor_over', name: 'tenor_over'},
          {data: 'charges', name: 'charges'},
          {data: 'gv', name: 'gv'},
          {data: 'model', name: 'model'},
          {data: 'chasis_num', name: 'chasis_num'},
          {data: 'engine_num', name: 'engine_num'},
          {data: 'rrm_name_no', name: 'rrm_name_no'},
          {data: 'rrm_mail_id', name: 'rrm_mail_id'},
          {data: 'coordinator_mail_id', name: 'coordinator_mail_id'},
          {data: 'letter_refernce', name: 'letter_refernce'},
          {data: 'dispatch_date', name: 'dispatch_date'},
          {data: 'letter_date', name: 'letter_date'},
          {data: 'valid_date', name: 'valid_date'},
        ],
        'columnDefs': [
          {
            'targets': 0,
            'checkboxes': {
              'selectRow': true
            }
          }
        ],
        'select': {
          'style': 'multi'
        },
      });

      $(".finance_office").on('change', function (e) {
        console.log("finance_office changed")
        $vehicles_table.draw();
        e.preventDefault();
      });


      // Handle form submission event
      $('#frm-example').on('submit', function (e) {
        var form = this;
        var rows_selected = $vehicles_table.column(0).checkboxes.selected();

        // Iterate over all selected checkboxes
        $.each(rows_selected, function (index, rowId) {
          // Create a hidden element
          $(form).append(
              $('<input>')
                  .attr('type', 'hidden')
                  .attr('name', 'id[]')
                  .val(rowId)
          );
        });

        // Output form data to a console
        $('#example-console-rows').text(rows_selected.join(","));

        // Output form data to a console
        // $('#example-console-form').text($(form).serialize());

        // Remove added elements
        $('input[name="id\[\]"]', form).remove();

        // Prevent actual form submission
        e.preventDefault();
      });


      $(document).on('click', '.select_row', function (event) {
        let $model = $("#model_data");
        let $currentRow = $(this).closest("tr");
        let $table_heading_count = $("table > tbody > tr:first > td").length
        let $ul_list = `<ul class='list-group'>`;

        for (let i = 1; i < $table_heading_count; i++) {
          let $td = $currentRow.find(`td:eq(${i})`);
          let $th = $td.closest('table').find('th').eq($td.index());
          $ul_list += `<li class='list-group-item'> <span style="font-weight: bold">${$th.html()}</span> : ${$td.text()}</li> `;
        }
        $ul_list += `</ul>`

        //CLEARING THE PREFILLED DATA
        $model.empty();
        //WRITING THE DATA ON MODEL
        $model.append($ul_list);
        // console.log($row)
      });

    }); //// Document load()

  </script>
@endsection

{{--// TODO::DELETE via ajax--}}
{{--/*$('body').on('click', '.deleteProduct', function () {--}}
{{--var product_id = $(this).data("id");--}}
{{--confirm("Are You sure want to delete !");--}}
{{--$.ajax({--}}
{{--type: "DELETE",--}}
{{-- url: "{{ route('api.vehicles.destroy', id) }}"+'/'+product_id,--}}
{{--success: function (data) {--}}
{{--table.draw();--}}
{{--},--}}
{{--error: function (data) {--}}
{{--console.log('Error:', data);--}}
{{--}--}}
{{--});--}}
{{--});*/--}}