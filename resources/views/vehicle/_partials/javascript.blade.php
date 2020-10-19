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
          {data: 'action', name: 'action', orderable: false, searchable: false},
          {data: 'finance_company_name', name: 'finance_company_name'},
          {data: 'regd_num', name: 'regd_num'},
          {data: 'make', name: 'make'},
          {data: 'status', name: 'status'},
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
      });

      /// Filter results from option menu
      $(".finance_office").on('change', function (e) {
        console.log("finance_office changed")
        $vehicles_table.draw();
        e.preventDefault();
      });

      //// Toggle Table Row (check, uncheck)
      $('#vehicles-table tbody').on('click', 'td', function (e) {
        const $tr = e.target.closest('tr')
        const $dt_row = $vehicles_table.row(this);
        $tr.classList.toggle("selected_row");

        if ($tr.classList.contains("selected_row")) {
          $tr.setAttribute("data-selected_row", $dt_row.data().id);
        } else {
          $tr.removeAttribute("data-selected_row");
        }
        // console.log($dt_row.data(), $dt_row.data().id)
        // console.log( $vehicles_table.cell( this ).data());
        // $vehicles_table.column( this ).data();
      })

      // View Assign agent Form (POP Modal)
      $("a.assign_vehicle_btn").click(function (e) {
        let $input_select_vehicles = document.getElementById("input_vehicles");
        let $ul = document.getElementById("ul_selected_rows");
        let $selected_rows = document.getElementsByClassName('selected_row')
        $ul.innerHTML = "";
        let $vehicles_ids = []
        for (const $row of $selected_rows) {
          let $td_value = `ID#${$row.cells[0].textContent}. ${$row.cells[4].textContent}, ${$row.cells[7].textContent}`;
          $vehicles_ids.push($row.cells[0].textContent);
          let li = document.createElement("li");
          li.classList.add("list-group-item");
          li.appendChild(document.createTextNode($td_value));
          $ul.appendChild(li);
        }
        $input_select_vehicles.value = $vehicles_ids;
      });

      //// View Vehicle data in POP modal
      $(document).on('click', '.select_row', function (event) {
        let $model = $("#model_data");
        let $currentRow = $(this).closest("tr");
        let $table_heading_length = $("table > tbody > tr:first > td").length
        let $ul_list = `<ul class='list-group'>`;

        for (let i = 1; i < $table_heading_length; i++) {
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