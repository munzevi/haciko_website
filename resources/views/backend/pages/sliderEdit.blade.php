@extends('backend.layouts.master')

@push('styles')
    <style type="text/css" media="screen">
        .button-group{
            text-align: right;
        }
        input[type="text"] {
            height:2.3rem;
        }
        #thumbnail2{
            margin-top:12px;
        }
        .input-group{
            margin-bottom: 0;
        }
        .addTitle, .addSubtitle{
            float:right;
            cursor:pointer;
        }

    </style>
@endpush
@section('page_header')
    {{__('datatables.pages.sliders.header') }}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card ">
            <div class="card-title px-3">
                    <span style="display: flex;justify-content: space-between;align-items: center;">
                        <h4>{{__('datatables.pages.sliders.create') }}</h4>
                        <a href="{{route('admin.sliders.index')}}" class="btn btn-warning btn-sm"><i class="nc-icon nc-minimal-left mr-2"></i>{{__('datatables.modals.sliders.back')}}</a>
                    </span>
                <hr style="margin:0;padding:0;">
            </div>
            <div class="card-body px-2 pt-0">
                @if(isset($slider->path))
                    <form id="roleForm" name="roleForm" class="form-horizontal mx-3" action="{{route('admin.sliders.update',$slider->id)}}" method="put">
                        @csrf
                        @foreach($slider->path as $key => $value)
                            <span id="slider-{{$key}}" >
                            @if($loop->first)
                                <div class="col-md-12" style="display:flex;justify-content:flex-end;padding:0;margin:0;" data-id="{{$key}}" id="add-image"><button class="btn btn-sm btn-primary"><i class="nc-icon nc-simple-add"></i>İmaj Ekle</button></div>
                            @else
                                <div class="col-md-12" style="display:flex;justify-content:flex-end;padding:0;margin:0;" data-id="{{$key}}" id="remove-image"><button class="btn btn-sm btn-danger"><i class="nc-icon nc-simple-remove"></i>İmajı Sil</button></div>
                            @endif

                        <div class="form-row ">
                            <div class="col-md-6">
                                <label for="path" class="label-control">{{__('datatables.modals.sliders.image') }}</label>
                                <div class="input-group">
                                    <span class="input-group-btn" style="padding:0;">
                                    <a id="lfm-{{$key}}" data-input="thumbnail-{{$key}}" data-preview="holder" class="btn btn-primary text-white" style="margin:0;">
                                      <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                    </span>
                                    <input id="thumbnail-{{$key}}" class="form-control" type="text" name="path[{{$key}}]" value="{{$value}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="meta-alt" class="label-control">{{__('datatables.modals.sliders.meta-alt') }}</label>
                                @if(isset($slider->mataAlt[$key]))
                                <input type="text" class="form-control" name="meta-alt[{{$key}}]" value="{{($slider->metaAlt[$key])}}" id="meta-alt-{{$key}}">
                                @else
                                <input type="text" class="form-control" name="meta-alt[{{$key}}]" value="" id="meta-alt-{{$key}}">
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label for="meta-title" class="label-control">{{__('datatables.modals.sliders.meta-title') }}</label>
                                <input type="text" class="form-control" name="meta-title[{{$key}}]" @if(isset($slider->metaTitle[$key])) value="{{$slider->metaTitle[$key]}}" @else value="" @endif id="meta-title-{{$key}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6" id="title-column-{{$key}}">
                            @foreach($slider->title[$key] as $k=>$v)
                                    <span id="title-{{$k}}">
                                    <label for="title" class="label-control mt-2" style="width: 100%;">{{__('datatables.modals.sliders.title') }}
                                    <span data-id="{{$k}}" class="addTitle" id="addTitle">
                                            @if($loop->first)
                                            <small class="text-success">{{__('datatables.modals.sliders.add-title') }}</small>
                                        @else
                                            <small class="text-danger">{{__('datatables.modals.sliders.remove-title') }}</small>
                                        @endif                                    </span>
                                    </label>
                                <input type="text" class="form-control" name="title[{{$key}}][]" id="title-{{$k}}" value="{{$v}}">
                            </span>
                                @endforeach

                            </div>
                            <div class="col-md-6" id="subtitle-column-{{$key}}">
                                @foreach($slider->subtitle[$key] as $k=>$v)
                                    <span id="subtitle-column-1">
                                    <label for="subtitle" class="label-control  mt-2" style="width: 100%;">{{__('datatables.modals.sliders.subtitle') }}
                                        <span data-id="1" class="addSubtitle" id="addSubtitle">
                                            @if($loop->first)
                                                <small class="text-success">{{__('datatables.modals.sliders.add-subtitle') }}</small>
                                            @else
                                            <small class="text-danger">{{__('datatables.modals.sliders.remove-subtitle') }}</small>
                                            @endif
                                    </span>
                                    </label>
                                    <input type="text" class="form-control" name="subtitle[{{$key}}][]" id="subtitle-{{$k}}" value="{{ $v }}">
                                </span>
                                @endforeach

                            </div>
                        </div>
                    </span>
                        @endforeach
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
                                <select name="content_id" class="form-control" id="">
                                    @foreach($pages as $page)
                                        <option value="{{$page->id}}">{{$page->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @else
                    <form id="roleForm" name="roleForm" class="form-horizontal mx-3" action="{{route('admin.sliders.store')}}" method="post">
                        @csrf
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
                                    <input id="thumbnail-1" class="form-control" type="text" name="path[1]" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="meta-alt" class="label-control">{{__('datatables.modals.sliders.meta-alt') }}</label>
                                <input type="text" class="form-control" name="meta-alt[1]" value="" id="meta-alt-1">
                            </div>
                            <div class="col-md-3">
                                <label for="meta-title" class="label-control">{{__('datatables.modals.sliders.meta-title') }}</label>
                                <input type="text" class="form-control" name="meta-title[1]" value=""  id="meta-title-1">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6" id="title-column-1">
                                <span id="title-1">
                                    <label for="title" class="label-control mt-2" style="width: 100%;">{{__('datatables.modals.sliders.title') }}
                                    <span data-id="1" class="addTitle" id="addTitle">
                                        <small class="text-success">{{__('datatables.modals.sliders.add-title') }}</small>
                                    </span>
                                    </label>
                                <input type="text" class="form-control" name="title[1][]" id="title-1" value="">
                            </span>
                            </div>
                            <div class="col-md-6" id="subtitle-column-1">
                                <span id="subtitle-column-1">
                                    <label for="subtitle" class="label-control  mt-2" style="width: 100%;">{{__('datatables.modals.sliders.subtitle') }}
                                        <span data-id="1" class="addSubtitle" id="addSubtitle">
                                        <small class="text-success">{{__('datatables.modals.sliders.add-subtitle') }}</small>
                                    </span>
                                    </label>
                                    <input type="text" class="form-control" name="subtitle[1][]" id="subtitle-1" >
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
                            <select name="content_id" class="form-control" id="">
                                @foreach($pages as $page)
                                    <option value="{{$page->id}}">{{$page->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                @endif
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-block btn-primary" id="saveBtn">{{__('datatables.modals.sliders.add') }}</button>
            </div>
        </div>
        </form>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('backend/assets/vendor/DataTables/datatables.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/DataTables/buttons.server-side.js')}}"></script>
    @include('backend.scripts.slidersdatatable')
@endsection
