
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">{{__('datatables.pages.sliders.create') }}

                </h4>
            </div>
            <div class="modal-body">
                <form id="roleForm" name="roleForm" class="form-horizontal">
                    <span id="slider-1" >
                        <div class="col-md-12" style="display:flex;justify-content:flex-end;padding:0;margin:0;" data-id="1" id="add-image"><button class="btn btn-sm btn-primary"><i class="nc-icon nc-simple-add"></i>İmaj Ekle</button></div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="path" class="label-control">{{__('datatables.modals.sliders.image') }}</label>
                                <div class="input-group">
                                    <span class="input-group-btn" style="padding:0;">
                                    <a id="lfm-1" data-input="thumbnail-1" data-preview="holder" class="btn btn-primary text-white" style="margin:0;">
                                      <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                    </span>
                                    <input id="thumbnail-1" class="form-control" type="text" name="path[1]">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="metaAlt" class="label-control">{{__('datatables.modals.sliders.metaAlt') }}</label>
                                <input type="text" class="form-control" name="metaAlt[1]" id="metaAlt-1">
                            </div>
                            <div class="col-md-3">
                                <label for="metaTitle" class="label-control">{{__('datatables.modals.sliders.metaTitle') }}</label>
                                <input type="text" class="form-control" name="metaTitle[1]" id="metaTitle-1">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6" id="title-column-1">
                            <span id="title-1">
                                <label for="title" class="label-control mt-2" style="width: 100%;">{{__('datatables.modals.sliders.title') }}
                                <span data-id="1" class="addTitle" id="addTitle">
                                    <small>{{__('datatables.modals.sliders.add-title') }}</small>
                                </span>
                                </label>
                                <input type="text" class="form-control" name="title[1][]" id="title">
                            </span>

                            </div>
                            <div class="col-md-6" id="subtitle-column-1">
                                <span id="subtitle-column-1">
                                <label for="subtitle" class="label-control  mt-2" style="width: 100%;">{{__('datatables.modals.sliders.subtitle') }}
                                    <span data-id="1" class="addSubtitle" id="addSubtitle">
                                    <small>{{__('datatables.modals.sliders.add-subtitle') }}</small>
                                </span>
                                </label>
                                <input type="text" class="form-control" name="subtitle[1][]" id="subtitle">
                                </span>
                            </div>
                        </div>
                    </span>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="type" class="label-control mt-2" style="width: 100%;">{{__('datatables.modals.sliders.type') }}
                            </label>
                            <select name="type" class="form-control" id="">
                                <option value="gallery">Galeri</option>
                                <option value="slider">Slider</option>
                            </select>

                        </div>
                        <div class="col-md-6">
                            <label for="description" class="label-control  mt-2" style="width: 100%;">{{__('datatables.modals.sliders.page') }}
                            </label>
                            <select name="content" class="form-control" id="">
                                @foreach($pages as $page)
                                <option value="{{$page->id}}">{{$page->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-block btn-primary" id="saveBtn">{{__('datatables.modals.sliders.add') }}</button>
            </div>
        </div>
    </div>
</div>
