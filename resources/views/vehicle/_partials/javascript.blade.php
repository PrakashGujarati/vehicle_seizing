@section('js')
  {{--  <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/js/dataTables.checkboxes.min.js"></script>--}}
  {{--  DOC:: https://www.gyrocode.com/projects/jquery-datatables-checkboxes/--}}
  {{--  DOC:: https://jsfiddle.net/gyrocode/snqw56dw/--}}
@endsection

@section('onPageJs')
  <script type="text/javascript">
    $(function () {
      console.clear()

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
          {data: 'id', name: 'id'},
          {{--{data: 'action', name: 'action', orderable: false, searchable: false},--}}
          {data: 'regd_num', name: 'regd_num'},
          {data: 'chasis_num', name: 'chasis_num'},
          {data: 'engine_num', name: 'engine_num'},
          {data: 'make', name: 'make'},          
          {data: 'customer_name', name: 'customer_name'},
          {data: 'finance_company_name', name: 'finance_company_name'},          
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
          {data: 'rrm_name_no', name: 'rrm_name_no'},
          {data: 'rrm_mail_id', name: 'rrm_mail_id'},
          {data: 'coordinator_mail_id', name: 'coordinator_mail_id'},
          {data: 'letter_refernce', name: 'letter_refernce'},
          {data: 'dispatch_date', name: 'dispatch_date'},
          {data: 'letter_date', name: 'letter_date'},
          {data: 'valid_date', name: 'valid_date'},
          {data: 'status', name: 'status'},
        ],
        
      });

      /// Filter results from option menu
      $(".finance_office").on('change', function (e) {
        console.log("finance_office changed")
        $vehicles_table.draw();
        e.preventDefault();
      });

      $('table').on('click', 'a.vehicle_view_btn', function (e) {
        // console.log(e)
        let $vehicle_id = $(this).data('id');
        let $table_body = $("#show_vehicle_tbody");
        $.get(`{{ route('api.vehicle.get') }}/ ${$vehicle_id}`, function (data, status) {
          // console.log(data)
          if (data) {
            $table_body.empty();
            for (var prop of Object.keys(data)) {
              if (data.hasOwnProperty(prop)) {
                value = data[prop] ? data[prop] : "";
                prop = prop.replaceAll("_", " ")
                $table_body.append(`<tr> <td> ${prop} </td> <td> ${value} </td> </tr>`)
              }
            }
          }
        });
      });

      //// Show Vehicle details/info by row click event
      $('#vehicles-table tbody').on('click', 'td', function (e) {
        const $tr = e.target.closest('tr')
        let $vehicle_id = $tr.getAttribute('data-id')
        let $table_body = $("#show_vehicle_tbody");
        $.get(`{{ route('api.vehicle.get') }}/ ${$vehicle_id}`, function (data, status) {
          // console.log(data)
          if (data) {
            $table_body.empty();
            for (var prop of Object.keys(data)) {
              if (data.hasOwnProperty(prop)) {
                value = data[prop] ? data[prop] : "";
                prop = prop.replaceAll("_", " ")
                $table_body.append(`<tr> <td> ${prop} </td> <td> ${value} </td> </tr>`)
              }
            }
          }
        });
      })
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