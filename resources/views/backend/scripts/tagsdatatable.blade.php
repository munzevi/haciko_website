<script type="text/javascript">
$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

    $("#tagsdatatable-table").DataTable( {
      "serverSide":true, "processing":true, "ajax": {
          "url":"{{route('admin.tags.index')}}", "type":"GET", "data":function(data) {
              for (var i=0, len=data.columns.length;
              i < len;
              i++) {
                  if (!data.columns[i].search.value) delete data.columns[i].search;
                  if (data.columns[i].searchable===true) delete data.columns[i].searchable;
                  if (data.columns[i].orderable===true) delete data.columns[i].orderable;
                  if (data.columns[i].data===data.columns[i].name) delete data.columns[i].name;
              }
              delete data.search.regex;
          }
      }
      , "columns":[ {
          "data": "id", "name": "id", "title": "Id", "orderable": true, "searchable": true, "width": 30
      }
      , {
          "data": "name", "name": "name", "title": "{{__('datatables.pages.tags.name') }}", "orderable": true, "searchable": true
      }
      , {
          "data": "description", "name": "description", "title": "{{__('datatables.pages.tags.description') }}", "orderable": true, "searchable": true
      }
      , {
          "data": "slug", "name": "slug", "title": "{{__('datatables.pages.tags.slug') }}", "orderable": false, "searchable": false
      }

      , {
          "data": "action", "name": "action", "title": "{{__('datatables.actions.actions') }}", "orderable": false, "searchable": false, "width": 230, ", className": "text-center"
      }
      ],
      "dom":"<'row'<'col-md-6 col-sm-6 card-header-title'><'col-md-6 col-sm-12 button-group'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      "order":[[1, "asc"]],
      "buttons":[ {
          "text": "<i class=\"nc-icon nc-simple-add\" style=\"color:white;margin-right:5px;font-weight:600;\"><\/i>{{__('datatables.pages.tags.create') }}", "className":"btn btn-primary btn-sm", "action":function(e, dt, node, config) {
              $("#saveBtn").val("create-tag");
              $("#saveBtn").html("{{__('datatables.actions.add') }}");
              $("#id").val("");
              $("#tagForm").trigger("reset");
              $("#modelHeading").html("{{__('datatables.pages.tags.create') }}");
              $("#ajaxModel").modal("show");
          }
      }
      /*, {
          "extend": "print", "text": "<i class=\"nc-icon nc-paper\" style=\"color:white;margin-right:5px;font-weight:600;\"><\/i>yazd\u0131r", "className": "btn btn-secondary btn-sm"
      }
      , {
          "extend": "export", "text": "<i class=\"nc-icon nc-paper\" style=\"color:white;margin-right:5px;font-weight:600;\"><\/i>D\u0131\u015fa Aktar ", "className": "btn btn-secondary btn-sm"
      }*/
      ], "language": {
          "url": "{{asset('vendor/datatables/turkish.json')}}"
      }
  });

  $('body').on('click', '.editTag' , function () {
    var language_id = $(this).data('id');
    $.get("{{ route('admin.tags.index') }}" +'/' + language_id +'/edit', function (data) {

        $('#modelHeading').html("{{__('datatables.pages.tags.create') }}");
        $('#saveBtn').val("edit-tag");
        $('#saveBtn').html("{{__('datatables.actions.edit') }}");
        $('#ajaxModel').modal('show');
        $('#id').val(data.id);
        $('#name').val(data.name);
        $('#description').val(data.description);
        $('#slug').val(data.slug);
    })
 });
  $('#saveBtn').click(function (e) {
  e.preventDefault();
  $(this).html('Gönderiliyor..');
    var form = $('#tagForm').serialize();
    console.log(form);
  $.ajax({
    data: $('#tagForm').serialize(),
    url: "{{ route('admin.tags.store') }}",
    type: "POST",
    dataType: 'json',
    success: function (data) {
        Swal.fire({
          icon: 'success',
          title: '{{__("datatables.alerts.success") }}',
          text: '{{__("datatables.alerts.completed") }}',
          timer: 2000
        });
        $('#tagForm').trigger("reset");
        $('#ajaxModel').modal('hide');
        $('#tagsdatatable-table').DataTable().ajax.reload();
    },
    error: function (data) {
        var messages = [];
        Object.values(data.responseJSON.errors).forEach(function(value,prop,obj){
          messages += value+'<br>';
        });
         Swal.fire({
            title: '{{__("datatables.alerts.error") }}',
            icon: 'error',
            html: messages,
          });
        $('#saveBtn').html('{{__("datatables.pages.tags.create") }}');
      }
    });
  });
  $('body').on('click', '.deleteTag', function () {
      var user_id = $(this).data("id");
      Swal.fire({
        title: '{{__("datatables.alerts.warning-title") }}',
        text: '{{__("datatables.alerts.warning-text") }}',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '{{__("datatables.alerts.confirm-yes") }}',
        cancelButtonText: '{{__("datatables.alerts.confirm-no") }}',//'{!!trans('form.modal.cancel')!!}'
      }).then((result) => {
        if (result.value) {
          $.ajax({
          type: "DELETE",
          url: "{{ route('admin.tags.store') }}"+'/'+user_id,
          success: function (data) {
              Swal.fire({
                  title: '{{__("datatables.alerts.success") }}',
                  text: '{{__("datatables.alerts.completed") }}',
                  icon: 'success',
                  timer: 2000
                });
              $('#tagsdatatable-table').DataTable().ajax.reload();
          },
          error: function (data) {
            Swal.fire(
              '{{__("datatables.alerts.fail-title") }}',
              '{{__("datatables.alerts.fail-text") }} ',
              'error'
            );
           //console.log('Error:', data);
          }
        });
      }
    });
  });
});
$(window).on("load", function() {
  $('.card-header-title').html('<h4 style="margin-top:0;">{{__("datatables.pages.tags.title") }}</h4>');
});
</script>
