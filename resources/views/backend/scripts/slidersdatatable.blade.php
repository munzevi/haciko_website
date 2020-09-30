<script>
    var route_prefix = "/admin/filemanager";
</script>
<script>
    $(function () {
        let titleIndex =2;
        let subtitleIndex =2;
        let imageIndex = 1;
        $('body').on('click','#addTitle',function(e){
            e.preventDefault();
            var target = $(this).data('id')
            $('#title-column-'+target).append("<span id=\"title-column-"+titleIndex+"\"><label for=\"title\" class=\"label-control mt-2\" style=\"width: 100%;\">{{__('datatables.modals.sliders.title') }}<span data-id=\""+titleIndex+"\" class=\"addTitle\" id=\"removeTitle\"> <small>{{__('datatables.modals.sliders.remove-title') }}</small> </span> </label> <input type=\"text\" class=\"form-control\" name=\"title["+imageIndex+"][]\"></span>");
            titleIndex++;
        });
        $('body').on('click','#removeTitle',function(e){
            e.preventDefault();
            var target = $(this).data('id');
            $("#title-column-"+target).remove();
        });
        $('body').on('click','#addSubtitle',function(e){
            e.preventDefault();
            var target = $(this).data('id')
            $('#subtitle-column-'+target).append("<span id=\"subtitle-column-"+subtitleIndex+"\"><label for=\"subtitle\" class=\"label-control mt-2\" style=\"width: 100%;\">{{__('datatables.modals.sliders.subtitle') }}<span data-id=\""+subtitleIndex+"\" class=\"addTitle\" id=\"removeSubtitle\"> <small>{{__('datatables.modals.sliders.remove-subtitle') }}</small> </span> </label> <input type=\"text\" class=\"form-control\" name=\"subtitle["+imageIndex+"][]\"></span>");
            subtitleIndex++;
        });
        $('body').on('click','#removeSubtitle',function(e){
            e.preventDefault();
            var target = $(this).data('id');
            $("#subtitle-column-"+target).remove();
        });
        $('body').on('click','#add-image',function(e) {
            e.preventDefault();
            titleIndex++;
            subtitleIndex++;
            imageIndex++;
            $("#slider-1").append("                    <span id=\"slider-"+imageIndex+"\" >\n" +
                "    <div class=\"col-md-12\" style=\"display:flex;justify-content:flex-end;padding:0;margin:0;margin-top:15px;\" ><button class=\"btn btn-sm btn-danger\" id=\"remove-image\" data-id=\""+imageIndex+"\" ><i class=\"nc-icon nc-simple-remove\"></i>İmajı Sil</button></div>\n" +                "                        <div class=\"form-row\">\n" +
                "                            <div class=\"col-md-6\">\n" +
                "                                <label for=\"path\" class=\"label-control\">{{__('datatables.modals.sliders.image') }}</label>\n" +
                "                                <div class=\"input-group\">\n" +
                "                                    <span class=\"input-group-btn\" style=\"padding:0;\">\n" +
                "                                    <a id=\"lfm-"+imageIndex+"\" data-input=\"thumbnail-"+imageIndex+"\" data-preview=\"holder\" class=\"btn btn-primary text-white\" style=\"margin:0;\">\n" +
                "                                      <i class=\"fa fa-picture-o\"></i> Choose\n" +
                "                                    </a>\n" +
                "                                    </span>\n" +
                "                                    <input id=\"thumbnail-"+imageIndex+"\" class=\"form-control\" type=\"text\" name=\"path["+imageIndex+"]\">\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "                            <div class=\"col-md-3\">\n" +
                "                                <label for=\"metaAlt\" class=\"label-control\">{{__('datatables.modals.sliders.metaAlt') }}</label>\n" +
                "                                <input type=\"text\" class=\"form-control\" name=\"metaAlt["+imageIndex+"]\" id=\"metaAlt-"+imageIndex+"\">\n" +
                "                            </div>\n" +
                "                            <div class=\"col-md-3\">\n" +
                "                                <label for=\"metaTitle\" class=\"label-control\">{{__('datatables.modals.sliders.metaTitle') }}</label>\n" +
                "                                <input type=\"text\" class=\"form-control\" name=\"metaTitle["+imageIndex+"]\" id=\"metaTitle-"+imageIndex+"\">\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                        <div class=\"form-row\">\n" +
                "                            <div class=\"col-md-6\" id=\"title-column-"+titleIndex+"\">\n" +
                "                            <span id=\"title-"+titleIndex+"\">\n" +
                "                                <label for=\"title\" class=\"label-control mt-2\" style=\"width: 100%;\">{{__('datatables.modals.sliders.title') }}\n" +
                "                                <span data-id=\""+titleIndex+"\" class=\"addTitle\" id=\"addTitle\">\n" +
                "                                    <small class=\"text-danger\">{{__('datatables.modals.sliders.add-title') }}</small>\n" +
                "                                </span>\n" +
                "                                </label>\n" +
                "                                <input type=\"text\" class=\"form-control\" name=\"title["+imageIndex+"][]\" id=\"title"+titleIndex+"\">\n" +
                "                            </span>\n" +
                "\n" +
                "                            </div>\n" +
                "                            <div class=\"col-md-6\" id=\"subtitle-column-"+subtitleIndex+"\">\n" +
                "                                <span id=\"subtitle-column-"+subtitleIndex+"\">\n" +
                "                                <label for=\"subtitle\" class=\"label-control  mt-2\" style=\"width: 100%;\">{{__('datatables.modals.sliders.subtitle') }}\n" +
                "                                    <span data-id=\""+subtitleIndex+"\" class=\"addSubtitle\" id=\"addSubtitle\">\n" +
                "                                    <small class=\"text-danger\">{{__('datatables.modals.sliders.add-subtitle') }}</small>\n" +
                "                                </span>\n" +
                "                                </label>\n" +
                "                                <input type=\"text\" class=\"form-control\" name=\"subtitle["+imageIndex+"][]\" id=\"subtitle"+subtitleIndex+"\">\n" +
                "                                </span>\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                    </span>");
            $('#lfm-'+imageIndex).filemanager('file', {prefix: route_prefix});

        });
        $('body').on('click','#remove-image',function(e){
            e.preventDefault();
            var target = $(this).data('id');
            $("#slider-"+target).remove();
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#slidersdatatable-table").DataTable( {
            "serverSide":true, "processing":true, "ajax": {
                "url":"{{route('admin.sliders.index')}}", "type":"GET", "data":function(data) {
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
                    "data": "picture", "name": "picture", "title": "{{__('datatables.pages.sliders.picture') }}", "orderable": true, "searchable": true
                }
                , {
                    "data": "content", "name": "content", "title": "{{__('datatables.pages.sliders.content') }}", "orderable": true, "searchable": true
                }
                , {
                    "data": "created_at", "name": "created_at", "title": "{{__('datatables.pages.sliders.created_at') }}", "orderable": true, "searchable": true
                }

                , {
                    "data": "action", "name": "action", "title": "{{__('datatables.actions.actions') }}", "orderable": false, "searchable": false, "width": 230, ", className": "text-center"
                }
            ],
            "dom":"<'row'<'col-md-6 col-sm-6 card-header-title'><'col-md-6 col-sm-12 button-group'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "order":[[1, "asc"]],
            "buttons":[ {
                "text": "<i class=\"nc-icon nc-simple-add\" style=\"color:white;margin-right:5px;font-weight:600;\"><\/i>{{__('datatables.pages.sliders.create') }}", "className":"btn btn-primary btn-sm", "action":function(e, dt, node, config) {
                    window.location = "{{route('admin.sliders.create')}}";
                }
            }
            ], "language": {
                "url": "{{asset('vendor/datatables/turkish.json')}}"
            }
        });
        $('body').on('click', '.deleteSlider', function () {
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
                        url: "{{ route('admin.sliders.store') }}"+'/'+user_id,
                        success: function (data) {
                            Swal.fire({
                                title: '{{__("datatables.alerts.success") }}',
                                text: '{{__("datatables.alerts.completed") }}',
                                icon: 'success',
                                timer: 2000
                            });
                            $('#slidersdatatable-table').DataTable().ajax.reload();
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
        $('.card-header-title').html('<h4 style="margin-top:0;">{{__("datatables.pages.sliders.title") }}</h4>');
    });

</script>

<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
</script>
<script>
    $('#lfm-1').filemanager('file', {prefix: route_prefix});
</script>
