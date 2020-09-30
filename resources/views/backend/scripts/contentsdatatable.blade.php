<script type="text/javascript">
$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var type = '{{$type}}';
    if(type == 'posts') {
        $("#contentsdatatable-table").DataTable({
            "serverSide": true, "processing": true, "ajax": {
                "url": "{{route('admin.'.$type.'.index')}}", "type": "GET", "data": function (data) {
                    console.log(data)
                    for (var i = 0, len = data.columns.length;
                         i < len;
                         i++) {
                        if (!data.columns[i].search.value) delete data.columns[i].search;
                        if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                        if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                        if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
                    }
                    delete data.search.regex;
                }
            }
            , "columns": [{
                "data": "id", "name": "id", "title": "Id", "orderable": true, "searchable": true, "width": 30
            }
                , {
                    "data": "name",
                    "name": "name",
                    "title": "{{__('datatables.pages.'.$type.'.name') }}",
                    "orderable": true,
                    "searchable": true
                }
                , {
                    "data": "picture",
                    "name": "picture",
                    "title": "{{__('datatables.pages.'.$type.'.picture') }}",
                    "orderable": false,
                    "searchable": false
                }
                , {
                    "data": "tags",
                    "name": "tags",
                    "title": "{{__('datatables.pages.'.$type.'.tags') }}",
                    "orderable": false,
                    "searchable": false
                }

                , {
                    "data": "parent",
                    "name": "parent",
                    "title": "{{__('datatables.pages.'.$type.'.parent') }}",
                    "orderable": false,
                    "searchable": false
                }
                , {
                    "data": "language",
                    "name": "language",
                    "title": "{{__('datatables.pages.'.$type.'.language') }}",
                    "orderable": false,
                    "searchable": false
                }
                , {
                    "data": "layout",
                    "name": "layout",
                    "title": "{{__('datatables.pages.'.$type.'.layout') }}",
                    "orderable": true,
                    "searchable": true
                }
                , {
                    "data": "author",
                    "name": "author",
                    "title": "{{__('datatables.pages.'.$type.'.author') }}",
                    "orderable": false,
                    "searchable": false
                }
                , {
                    "data": "action",
                    "name": "action",
                    "title": "{{__('datatables.actions.actions') }}",
                    "orderable": false,
                    "searchable": false,
                    "width": 230,
                    ", className": "text-center"
                }
            ],

            "dom": "<'row'<'col-md-6 col-sm-6 card-header-title'><'col-md-6 col-sm-12 button-group'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "order": [[1, "asc"]],
            "buttons": [{
                "text": "<i class=\"nc-icon nc-simple-add\" style=\"color:white;margin-right:5px;font-weight:600;\">" +
                    "<\/i>{{__('datatables.pages.'.$type.'.create') }}", "className": "btn btn-primary btn-sm",
                "action": function (e, dt, node, config) {
                    window.location.href = "{{route('admin.'.$type.'.create',['content'=>$type])}}";
                    {{--$("#saveBtn").val("create-content");--}}
                    {{--$("#saveBtn").html("{{__('datatables.actions.add') }}");--}}
                    {{--$("#id").val("");--}}
                    {{--$("#roleForm").trigger("reset");--}}
                    {{--$("#modelHeading").html("{{__('datatables.pages.'.$type.'.create') }}");--}}
                    {{--$("#ajaxModel").modal("show");--}}
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
    }else{
        $("#contentsdatatable-table").DataTable({
            "serverSide": true, "processing": true, "ajax": {
                "url": "{{route('admin.'.$type.'.index')}}", "type": "GET", "data": function (data) {
                    for (var i = 0, len = data.columns.length;
                         i < len;
                         i++) {
                        if (!data.columns[i].search.value) delete data.columns[i].search;
                        if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                        if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                        if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
                    }
                    delete data.search.regex;
                }
            }
            , "columns": [{
                "data": "id", "name": "id", "title": "Id", "orderable": true, "searchable": true, "width": 30
            }
                , {
                    "data": "name",
                    "name": "name",
                    "title": "{{__('datatables.pages.'.$type.'.name') }}",
                    "orderable": true,
                    "searchable": true
                }
                , {
                    "data": "language",
                    "name": "language",
                    "title": "{{__('datatables.pages.'.$type.'.language') }}",
                    "orderable": false,
                    "searchable": false
                }
                , {
                    "data": "parent",
                    "name": "parent",
                    "title": "{{__('datatables.pages.'.$type.'.parent') }}",
                    "orderable": false,
                    "searchable": false
                }
                , {
                    "data": "child_count",
                    "name": "child_count",
                    "title": "{{__('datatables.pages.'.$type.'.child') }}",
                    "orderable": false,
                    "searchable": false
                }
                , {
                    "data": "layout",
                    "name": "layout",
                    "title": "{{__('datatables.pages.'.$type.'.layout') }}",
                    "orderable": true,
                    "searchable": true
                }
                , {
                    "data": "author",
                    "name": "author",
                    "title": "{{__('datatables.pages.'.$type.'.author') }}",
                    "orderable": false,
                    "searchable": false
                }
                , {
                    "data": "action",
                    "name": "action",
                    "title": "{{__('datatables.actions.actions') }}",
                    "orderable": false,
                    "searchable": false,
                    "width": 230,
                    ", className": "text-center"
                }
            ],
            "dom": "<'row'<'col-md-6 col-sm-6 card-header-title'><'col-md-6 col-sm-12 button-group'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "order": [[1, "asc"]],
            "buttons": [{
                "text": "<i class=\"nc-icon nc-simple-add\" style=\"color:white;margin-right:5px;font-weight:600;\">" +
                    "<\/i>{{__('datatables.pages.'.$type.'.create') }}", "className": "btn btn-primary btn-sm",
                "action": function (e, dt, node, config) {
                    window.location.href = "{{route('admin.'.$type.'.create',['content'=>$type])}}";
                    {{--$("#saveBtn").val("create-content");--}}
                    {{--$("#saveBtn").html("{{__('datatables.actions.add') }}");--}}
                    {{--$("#id").val("");--}}
                    {{--$("#roleForm").trigger("reset");--}}
                    {{--$("#modelHeading").html("{{__('datatables.pages.'.$type.'.create') }}");--}}
                    {{--$("#ajaxModel").modal("show");--}}
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
            },


        });
    }

  {{--var PermissionSelectData = [];--}}
  {{--var slim = new SlimSelect({--}}
  {{--    select: '#permission_select',--}}
  {{--    selected:true,--}}
  {{--  })--}}
  {{--$.get("{{ route('admin.'.$type.'.create') } function (data) {--}}
  {{--  data.forEach(element => PermissionSelectData = data);--}}
  {{--    slim.setData(PermissionSelectData);--}}
  {{--})--}}
  $('body').on('click', '.editContent', function () {
    var content_id = $(this).data('id');
    window.location.href = "{{ route('admin.'.$type.'.index') }}" +'/' + content_id +'/edit';
    // var roleSelectedData= [];
    {{--$.get("{{ route('admin.'.$type.'.index') }}" +'/' + content_id +'/edit', function (data) {--}}
    {{--    console.log('editing');--}}
    {{--})--}}
 });

  $('body').on('click', '.deleteContent', function () {
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
          url: "{{route('admin.'.$type.'.index')}}/"+user_id,
          success: function (data) {
              Swal.fire({
                  title: '{{__("datatables.alerts.success") }}',
                  text: '{{__("datatables.alerts.completed") }}',
                  icon: 'success',
                  timer: 2000
                });
              $('#contentsdatatable-table').DataTable().ajax.reload();
          },
          error: function (data) {
            Swal.fire(
              '{{__("datatables.alerts.fail-title") }}',
              '{{__("datatables.alerts.fail-text") }} ',
              'error'
            );
           console.log('Error:', data);
          }
        });
      }
    });
  });
});
$(window).on("load", function() {
  $('.card-header-title').html('<h4 style="margin-top:0;">{{__('datatables.pages.'.$type.'.title') }}</h4>');
});

</script>
{{route('admin.blog-categories.index')}}
