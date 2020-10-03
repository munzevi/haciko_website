<script>
    $(function () {
        $('body').on('click','#sendForm',function(){

            $('#contentForm').submit();
        });
    })
</script>
<script type="text/javascript">
$(window).on("load", function() {
  $('.card-header-title').html('<h4 style="margin-top:0;">{{__('datatables.pages.'.$type.'.title') }}</h4>');
});
$(function () {
    var i = 1;
    $('body').on('click','#add-button',function(e){
        e.preventDefault();
        $('#extra-area').append('<div class="row" id="area-'+i+'" data-index="'+i+'"><div class="col-md-3" style="padding-right:0;"><label for="extra-key" class="col-sm-12 control-label">Alan Açıklaması</label><div class="col-sm-12"><input type="text" class="form-control" id="extra-key" name="extra_fields['+i+'][key]" value="" maxlength="250" required="" style="margin-right:0;"></div></div><div class="col-md-8"><label for="extra-value" class="col-sm-12 control-label">Alan Değeri</label><div class="col-sm-12" style="padding-right:0;"><input type="text" class="form-control" id="extra_field['+i+'][value]" name="extra_fields['+i+'][value]" value="" maxlength="250" required="" style="margin-left:0;"></div></div><div class="col-md-1"><label for="remove-extra" class="col-md-12 label-control">Act</label><button class="btn btn-danger btn-sm" id="remove-button" data-index="'+i+'">sil</button></div></div>')
        i++;
    });
    $('body').on('click','#remove-button',function(){
        var target = $(this).data('index');
        $('#area-'+target).remove();
    });
    $('#status').prop('checked',true);
    $('#status').attr('value',true);
});
</script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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
                cancelButtonText: '{{__("datatables.alerts.confirm-no") }}',//'{!!trans('form.modal.cancel')!!}'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('admin.pages.store') }}"+'/'+user_id,
                        success: function (data) {
                            Swal.fire({
                                title: '{{__("datatables.alerts.success") }}',
                                text: '{{__("datatables.alerts.completed") }}',
                                icon: 'success',
                                timer: 2000
                            });
                            $('#contentsdatatable').DataTable().ajax.reload();
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
</script>
<script>
    var route_prefix = "/admin/filemanager";
</script>


<!-- TinyMCE init -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    var editor_config = {
        path_absolute : "",
        selector: "#content",
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        content_css: ['/assets/css/style.css','/assets/css/bootstrap.min.css'],
        height: 600,
        enterMode: 2,
        // enterMode : CKEDITOR.ENTER_BR,
        // shiftEnterMode : CKEDITOR.ENTER_P,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
    // var scriptLoader = new tinymce.dom.ScriptLoader();
    // scriptLoader.add('https://buba.munzevi.net/assets/js/plugins.js');
    // scriptLoader.add('https://buba.munzevi.net/assets/js/main.js');
</script>
<script>
    var editor_config = {
        path_absolute : "",
        selector: "#feature_content",
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        content_css: '',
        relative_urls: false,
        height: 400,
        autoParagraph : false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>
<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
</script>
<script>
    $('#lfm').filemanager('file', {prefix: route_prefix});
</script>

<script>
    var lfm = function(id, type, options) {
        let button = document.getElementById(id);

        button.addEventListener('click', function () {
            var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
            var target_input = document.getElementById(button.getAttribute('data-input'));
            var target_preview = document.getElementById(button.getAttribute('data-preview'));

            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = function (items) {
                var file_path = items.map(function (item) {
                    return item.url;
                }).join(',');

                // set the value of the desired input to image url
                target_input.value = file_path;
                target_input.dispatchEvent(new Event('change'));

                // clear previous preview
                target_preview.innerHtml = '';

                // set or change the preview image src
                items.forEach(function (item) {
                    let img = document.createElement('img')
                    img.setAttribute('style', 'height: 10rem')
                    img.setAttribute('src', item.url)
                    target_preview.appendChild(img);
                });

                // trigger change event
                target_preview.dispatchEvent(new Event('change'));
            };
        });
    };
</script>
@if($type='posts')
<script>
    var slim = new SlimSelect({
        select: '#parent_id',
        selected:true,
        allowDeselect: true,
    })
</script>
@endif
@if(!$type='posts')
<script type="text/javascript">
    $(function(){
        var slim = new SlimSelect({
            select: '#tags',
            selected:true,
        });
    });
</script>
@endif
