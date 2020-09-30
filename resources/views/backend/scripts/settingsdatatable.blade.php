<script type="text/javascript">
$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var table = $("#settingsdatatable-table").DataTable( {
      "serverSide":true, "processing":true, "ajax": {
          "url":"{{route('admin.settings.index')}}", "type":"GET", "data":function(data) {
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
          "data": "segment", "name": "segment", "title": "{{__('datatables.pages.settings.segment') }}", "orderable": true, "searchable": true
      }
      , {
          "data": "key", "name": "key", "title":" {{__('datatables.pages.settings.key') }} ", "orderable": true, "searchable": true
      }
      , {
          "data": "value", "name": "value", "title": "{{__('datatables.pages.settings.value') }}", "orderable": false, "searchable": false
      }
      , {
          "data": "lang", "name": "lang", "title": "{{__('datatables.pages.settings.lang') }}", "orderable": true, "searchable": true
      }
      , {
          "data": "action", "name": "action", "title": "{{__('datatables.actions.actions') }}", "orderable": false, "searchable": false, "width": 230, ", className": "text-center"
      }
      ],
      "dom":"<'row'<'col-md-6 col-sm-6 card-header-title'><'col-md-6 col-sm-6 button-group'B>><'row'<'col-md-12 col-sm-12 top-wrapper'l<'col-md-6 col-sm-12 toolbar'>f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      "order":[[1, "asc"]],
      "buttons":[ {
          "text": "<i class=\"nc-icon nc-simple-add\" style=\"color:white;margin-right:5px;font-weight:600;\"><\/i>{{__('datatables.pages.settings.create') }}", "className":"btn btn-primary btn-sm", "action":function(e, dt, node, config) {
              $("#saveBtn").val("create-role");
              $("#saveBtn").html("{{__('datatables.actions.add') }}");
              $("#id").val("");
              $("#settingForm").trigger("reset");
              $("#modelHeading").html("{{__('datatables.pages.settings.create') }}");
              $("#ajaxModel").modal("show");
          }
      }
      ], "language": {
          "url": "{{asset('vendor/datatables/turkish.json')}}"
      },
      fnInitComplete: function(){
        /*$('div.toolbar').html('<div class="row"><div class="col-md-6 col-sm-12"><select id="dropdown1" class="form-control form-control-sm filter-segment"><option value="">All Segments</option><option value="General Settings">General Settings</option><option value="Mail Setting">Mail Setting</option></select></div><div class="col-md-6 col-sm-12"><select id="dropdown2" class="form-control form-control-sm filter-language"><option value="">All Languages</option><option value="Turkish">Turkish</option><option value="English">English</option></select></div></div>');*/
        $('.toolbar').append($('#filter-wrapper').html());
        $('#dropdown1').on('change', function () {
          table.columns(1).search( this.value).draw();
        });
        $('#dropdown2').on('change', function () {
          table.columns(4).search( this.value).draw();
        });
        $('.filter-wrapper').remove();
      }
  });
  $.get("{{route('admin.settings.create')}}",function(data){
    data.forEach(element=> $('#lang').append('<option "value="'+element.id+'">'+element.value+' </option> '));
      console.log(data);
  });
  $('body').on('click', '.editSetting' , function () {
    var language_id = $(this).data('id');
    $.get("{{ route('admin.settings.index') }}" +'/' + language_id +'/edit', function (data) {
      console.log(data.lang.name);
      $('#lang').append('<option "value="'+data.lang.id+'" selected>'+data.lang.name+' </option> ')
        $('#modelHeading').html("{{__('datatables.pages.settings.edit') }}");
        $('#saveBtn').val("edit-role");
        $('#saveBtn').html("{{__('datatables.actions.edit') }}");
        $('#ajaxModel').modal('show');
        $('#id').val(data.id);
        $('#segment').val(data.segment);
        $('#key').val(data.key);
        $('#value').val(data.value);

    })
 });
  $('#saveBtn').click(function (e) {
  e.preventDefault();
  $(this).html('Gönderiliyor..');
    var form = $('#settingForm').serialize();
    console.log(form);
  $.ajax({
    data: $('#settingForm').serialize(),
    url: "{{ route('admin.settings.store') }}",
    type: "POST",
    dataType: 'json',
    success: function (data) {
        Swal.fire({
          icon: 'success',
          title: '{{__("datatables.alerts.success") }}',
          text: '{{__("datatables.alerts.completed") }}',
          timer: 2000
        });
        $('#settingForm').trigger("reset");
        $('#ajaxModel').modal('hide');
        $('#settingsdatatable-table').DataTable().ajax.reload();
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
        $('#saveBtn').html('{{__("datatables.pages.settings.create") }}');
      }
    });
  });
  $('body').on('click', '.deleteSetting', function () {
      var user_id = $(this).data("id");

      Swal.fire({
        title: '{{__("datatables.alerts.warning-title") }}',
        text: '{{__("datatables.alerts.warning-text") }}',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '{{__("datatables.alerts.confirm-yes") }}',
        cancelButtonText: '{{__("datatables.alerts.confirm-no") }}',
      }).then((result) => {
        if (result.value) {
          $.ajax({
          type: "DELETE",
              url: "{{ route('admin.settings.store') }}"+'/'+user_id,
          success: function (data) {
              Swal.fire({
                  title: '{{__("datatables.alerts.success") }}',
                  text: '{{__("datatables.alerts.completed") }}',
                  icon: 'success',
                  timer: 2000
                });
              $('#settingsdatatable-table').DataTable().ajax.reload();
          },
          error: function (data) {
            Swal.fire(
              '{{__("datatables.alerts.fail-title") }}',
              '{{__("datatables.alerts.fail-text") }} ',
              'error'
            );
            $('#settingsdatatable-table').DataTable().ajax.reload();
          }
        });
      }
    });
  });
});
$(window).on("load", function() {
  $('.card-header-title').html('<h4 style="margin-top:0;">{{__("datatables.pages.settings.title") }}</h4>');
});
</script>
