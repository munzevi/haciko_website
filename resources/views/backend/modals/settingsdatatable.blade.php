
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">{{__('datatables.pages.settings.create') }}
                </h4>
            </div>
            <div class="modal-body">
                <form id="settingForm" name="settingForm" class="form-horizontal">
                       <input type="hidden" name="id" id="id" valu="">
                        <div class="form-group" style="padding-right: 0">
                            <label for="name" class="col-sm-12 control-label">{{__('datatables.pages.settings.segment') }}</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="segment" name="segment"  required="">
                                    @foreach(config('cms.setting_segments') as $key => $segment)
                                  <option value="{{$key}}">{{$segment}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group"  style="padding-left: 0">
                            <label for="key" class="col-sm-12 control-label">{{__('datatables.pages.settings.key') }}</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="key" name="key" value="" maxlength="50" required="">
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="value" class="col-sm-12 control-label">{{__('datatables.pages.settings.value') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="value" name="value" maxlength="250">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="language_id" class="col-sm-12 control-label">{{__('datatables.pages.settings.lang') }}</label>
                        <div class="col-sm-12">
                            <select name="language_id" class="form-control" id="lang">

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                     <button type="submit" class="btn btn-primary btn-block" id="saveBtn" value="create">{{__('datatables.actions.add')}}
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
