<script type="text/javascript">
$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

    $("#rolesdatatable-table").DataTable( {
      "serverSide":true, "processing":true, "ajax": {
          "url":"{{route('admin.roles.index')}}", "type":"GET", "data":function(data) {
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
          "data": "title", "name": "title", "title": "{{__('datatables.pages.roles.title') }}", "orderable": true, "searchable": true
      }
      , {
          "data": "description", "name": "description", "title": "{{__('datatables.pages.roles.description') }}", "orderable": true, "searchable": true
      }
      , {
          "data": "permission", "name": "permission", "title": "{{__('datatables.pages.roles.permissions') }}", "orderable": false, "searchable": false
      }
      , {
          "data": "name", "name": "name", "title": "{{__('datatables.pages.roles.code') }}", "orderable": true, "searchable": true
      }
      , {
          "data": "action", "name": "action", "title": "{{__('datatables.actions.actions') }}", "orderable": false, "searchable": false, "width": 230, ", className": "text-center"
      }
      ],
      "dom":"<'row'<'col-md-6 col-sm-6 card-header-title'><'col-md-6 col-sm-12 button-group'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      "order":[[1, "asc"]],
      "buttons":[ {
          "text": "<i class=\"nc-icon nc-simple-add\" style=\"color:white;margin-right:5px;font-weight:600;\"><\/i>{{__('datatables.pages.roles.create') }}", "className":"btn btn-primary btn-sm", "action":function(e, dt, node, config) {
              $("#saveBtn").val("create-role");
              $("#saveBtn").html("{{__('datatables.actions.add') }}");
              $("#id").val("");
              $("#roleForm").trigger("reset");
              $("#modelHeading").html("{{__('datatables.pages.roles.create') }}");
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

  var PermissionSelectData = [];
  var slim = new SlimSelect({
      select: '#permission_select',
      selected:true,
    })
  $.get("{{ route('admin.roles.create') }}", function (data) {
    data.forEach(element => PermissionSelectData = data);
      slim.setData(PermissionSelectData);
  })
  $('body').on('click', '.editRole', function () {
    var role_id = $(this).data('id');
    var roleSelectedData= [];

    $.get("{{ route('admin.roles.index') }}" +'/' + role_id +'/edit', function (data) {
      var permissions = data.permissions;
        permissions.forEach(function(element){
          $('#permission_select').append('<option value="'+element.id+'" selected>'+element.name+'</option>');
        });
        $('#modelHeading').html("{{__('datatables.pages.roles.create') }}");
        $('#saveBtn').val("edit-role");
        $('#saveBtn').html("{{__('datatables.actions.edit') }}");
        $('#ajaxModel').modal('show');
        $('#id').val(data.id);
        $('#name').val(data.name);
        $('#title').val(data.title);
        $('#description').val(data.description);

    })
 });
  $('#saveBtn').click(function (e) {
  e.preventDefault();
  $(this).html('Gönderiliyor..');
    var form = $('#roleForm').serialize();
  $.ajax({
    data: $('#roleForm').serialize(),
    url: "{{ route('admin.roles.store') }}",
    type: "POST",
    dataType: 'json',
    success: function (data) {
        Swal.fire({
          icon: 'success',
          title: '{{__("datatables.alerts.success") }}',
          text: '{{__("datatables.alerts.completed") }}',
          timer: 2000
        });
        $('#roleForm').trigger("reset");
        $('#ajaxModel').modal('hide');
        $('#rolesdatatable-table').DataTable().ajax.reload();
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
        $('#saveBtn').html('{{__("datatables.modals.users.create") }}');
      }
    });
  });
  $('body').on('click', '.deleteRole', function () {
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
              url: "{{ route('admin.roles.store') }}"+'/'+user_id,
          success: function (data) {
              Swal.fire({
                  title: '{{__("datatables.alerts.success") }}',
                  text: '{{__("datatables.alerts.completed") }}',
                  icon: 'success',
                  timer: 2000
                });
              $('#rolesdatatable-table').DataTable().ajax.reload();
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
  $('.card-header-title').html('<h4 style="margin-top:0;">{{__("datatables.pages.roles.title") }}</h4>');
});
</script>
