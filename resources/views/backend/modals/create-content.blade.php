<div id="content-form-page" class="content-form-page" style="color:#66615b;">
    <form id="contentForm" name="contentForm"
        @if(isset($content) && $content->type === 'posts') method="put" action="{{action('CMS\PostsController@update',$content->id) }}"
        @elseif(isset($content)) method="put" action="{{route('admin.'.$type.'.index').'/'.$content->id}}"
        @else method="post" action="{{route('admin.'.$type.'.store')}}"
        @endif class="form-horizontal" novalidate>

        @csrf
        @if(isset($content))
        <input type="hidden" name="id" value="{{$content->id}}">
        @endif

        <div class="form-row" style="margin-bottom: 0;">
            <div class="col-sm-6" style="padding-right: 0">
                <label for="title" class="col-sm-12 control-label">{!! __('datatables.pages.'.$type.'.form.name') !!}</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="name" value="@if(isset($content->name)) {{$content->name}}@endif" maxlength="50" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="banner" class="label-control col-md-12">{{__('datatables.pages.'.$type.'.form.banner')}}</label>
                <div class="input-group">
                    <span class="input-group-btn" style="padding-right:0;">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white" style="margin-top:0;">
                            <i class="fa fa-picture-o"></i> {{__('datatables.pages.'.$type.'.form.choose')}}
                        </a>
                        </span>
                    <input id="thumbnail" class="form-control" type="text" name="banner[banner][value]" style="margin-top:0;margin-right:10px;height:2.3rem;" value="@if(isset($content->banner)) {{$content->banner['banner']['value']}}@endif">
                    <input type="hidden" name="banner[banner][key]" style="margin-top:0;margin-right:10px;height:2.3rem;" value="key">
                </div>
            </div>

            <div class="col-lg-4 mb-3" style="padding-right: 0">
                <label for="title" class="col-sm-12 control-label">{{__('datatables.pages.'.$type.'.form.address')}}</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="slug" name="slug" value="@if(isset($content->slug)) {{$content->slug}}@endif" maxlength="50" required>
                </div>
            </div>
            <div class="col-lg-4  mb-3" >
                <label for="title" class="col-sm-12 control-label">{{__('datatables.pages.'.$type.'.form.title')}}</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="title" name="title" value="@if(isset($content->title)) {{$content->title}}@endif" maxlength="50" required>
                </div>
            </div>
            <div class="col-lg-4  mb-3" >
                <label for="subtitle" class="col-sm-12 control-label">{{__('datatables.pages.'.$type.'.form.subtitle')}}</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="@if(isset($content->subtitle)) {{$content->subtitle}}@endif" maxlength="50" required>
                </div>
            </div>

            <div class="col-lg-4  mb-3" style="padding-right: 0">
                <label for="title" class="col-sm-12 control-label">{{__('datatables.pages.'.$type.'.form.language')}}</label>
                <div class="col-sm-12">
                    <select class="form-control" name="language_id" id="language_id">
                        @foreach($languages as $lang)
                            @if(isset($content->language_id))
                                @if($lang->id == $content->language_id)

                                    <option value="{{$lang->id}}" selected>{{$lang->name}}</option>
                                @endif
                            @endif
                        <option value="{{$lang->id}}">{{$lang->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-4  mb-3" >
                <label for="parent_id" class="col-sm-12 control-label">{{__('datatables.pages.'.$type.'.form.parent')}}</label>
                <div class="col-sm-12">
                    <select class="form-control" name="parent_id" id="parent_id">
                        <option value="" selected disabled>Seçiniz</option>
                        @foreach($pages as $page)
                            @if(isset($content->parent_id))
                                @if($page->id == $content->parent_id)
                                    <option value="{{$page->id}}" selected>{{$page->name}}</option>
                                @endif
                            @endif
                            <option value="{{$page->id}}">{{$page->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4  mb-3" >
                <label for="layout" class="col-sm-12 control-label">{{__('datatables.pages.'.$type.'.form.layout')}}</label>
                <div class="col-sm-12">
                    <select class="form-control" name="layout" id="layout">
                        <option value="standart">Standart Layout</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-row mb-3" style="margin-bottom: 0;@if($type==='blog-categories') display:none;  @endif">
            <div class="col-sm-12 mb-3" style="padding-right: 0">
                <label for="content" class="col-sm-12 control-label">{{__('datatables.pages.'.$type.'.form.content')}}</label>
                <div class="col-sm-12">
                    <textarea id="content" name="content" rows="2" cols="20"  class="form-control">@if(isset($content->content)) {!! $content->content!!}@endif
                    </textarea>
                </div>
            </div>
            <div class="col-sm-12  mb-3" style="padding-right: 0">
                <label for="feature_content" class="col-sm-12 control-label">{{__('datatables.pages.'.$type.'.form.feature_content')}}</label>
                <div class="col-sm-12">
                    <textarea id="feature_content" name="feature_content" class="form-control">@if(isset($content->feature_content)) {!! $content->feature_content!!}@endif
                    </textarea>
                </div>
            </div>
            @if($type === 'posts')
                <div class="form-group col-md-12">
                    <label for="description" class="col-sm-12 control-label">{{__('datatables.pages.'.$type.'.form.tags')}}</label>
                    <div class="col-md-12">
                        <select name="tags[]" class="form-control" id="tags" style="width: 100%;" multiple>
                            @if(isset($content))
                                @foreach($content->tags as $tag)
                                    <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                                @endforeach
                            @endif
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
            <div class="col-md-6 mb-3" style="padding-right:0;">
                <label for="title" class="col-sm-12 control-label">{{__('datatables.pages.'.$type.'.form.seo_title')}}</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="seo_title" name="seo_title" value="@if(isset($content->seo_title)) {{$content->seo_title}} @endif" maxlength="50" required="" style="margin-left:0">
                </div>
            </div>
            <div class="col-md-6 mb-3" style="padding-left:0;">
                <label for="keywords" class="col-sm-12 control-label">{{__('datatables.pages.'.$type.'.form.seo_keywords')}}</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="seo_keywords" name="seo_keywords" value="@if(isset($content->seo_keywords)) {{$content->seo_keywords}} @endif" maxlength="250" required="" style="margin-left:0";>
                </div>
            </div>
            <div class="col-sm-12 mb-3" style="padding-right: 0">
                <label for="description" class="col-sm-12 control-label">{{__('datatables.pages.'.$type.'.form.seo_description')}}</label>
                <div class="col-sm-12">
                    <textarea id="description" name="seo_description" class="form-control">@if(isset($content->seo_title)) {{$content->seo_description}} @endif
                    </textarea>
                </div>
            </div>

            <div class="col-sm-12" style="display: flex;justify-content: space-evenly" >
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="status" name="status" @if(isset($content->show_on_menu) && $content->show_on_menu === 1)  value="true" checked  @endif >
                    <label class="custom-control-label" for="status" name="status"> {{__('datatables.pages.'.$type.'.form.status')}}</label>
                </div>
                @if($type==='pages' )
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="show_at_parent" name="show_at_parent" @if(isset($content->show_on_menu) && $content->show_on_menu === 1)  value="true" checked  @endif >
                    <label class="custom-control-label" for="show_at_parent"> {{__('datatables.pages.'.$type.'.form.show_on_parent')}}</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="show_on_menu" name="show_on_menu" @if(isset($content->show_on_menu) && $content->show_on_menu === 1)  value="true" checked  @endif >
                    <label class="custom-control-label" for="show_on_menu"> {{__('datatables.pages.'.$type.'.form.show_on_menu')}}</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="show_on_footer" name="show_on_footer" @if(isset($content->show_on_footer) && $content->show_on_footer === 1)  value="true" checked  @endif >
                    <label class="custom-control-label" for="show_on_footer"> {{__('datatables.pages.'.$type.'.form.show_on_footer')}}</label>
                </div>
            </div>

            <div class="col-md-12 add-extra mt-3" style="text-align: center; margin-left: 0.7rem;">
                <button class="btn btn-block btn-primary btn-sm mb-2 mr-4" id="add-button"><span><i class="nc-icon nc-simple-add" style="color:white;margin-right:5px;font-weight:600;"></i>{{__('datatables.pages.'.$type.'.form.ekstra')}}</span></button>
                @endif
            </div>
            <div class="col-md-12" id="extra-area">
            </div>
            @if(isset($content->extra_fields))
                <div class="col-md-12">
                @foreach($content->extra_fields as $i => $value)
                    <div class="row" id="area-{{$i}}" data-index="{{$i}}">
                        <div class="col-md-3" style="padding-right:0;">
                            <label for="extra-key" class="col-sm-12 control-label">
                                Alan Açıklaması
                            </label><div class="col-sm-12">
                                <input type="text" class="form-control" id="extra-key" name="extra_fields[{{$i}}][key]" value="{{$value['key']}}" maxlength="250" required="" style="margin-right:0;">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label for="extra-value" class="col-sm-12 control-label">Alan Değeri</label>
                            <div class="col-sm-12" style="padding-right:0;">
                                <input type="text" class="form-control" id="extra_field[{{$i}}][value]" name="extra_fields[{{$i}}][value]" value="{{$value['value']}}" maxlength="250" required="" style="margin-left:0;">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label for="remove-extra" class="col-md-12 label-control">Act</label>
                            <button class="btn btn-danger btn-sm" id="remove-button" data-index="{{$i}}">sil</button>
                        </div>
                    </div>
                @endforeach
                </div>
            @endif

        </div>
    </form>
</div>
