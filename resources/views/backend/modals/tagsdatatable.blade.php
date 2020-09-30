
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">{{__('datatables.pages.tags.create') }}
                </h4>
            </div>
            <div class="modal-body">
                <form id="tagForm" name="tagForm" class="form-horizontal">
                    <input type="hidden" name="id" id="id" valu="">
                    <div class="form-group" style="padding-right: 0">
                        <label for="name" class="col-sm-12 control-label">{{__('datatables.pages.tags.name') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group"  style="padding-left: 0">
                        <label for="description" class="col-sm-12 control-label">{{__('datatables.pages.tags.description') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="description" name="description" value="" maxlength="250" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slug" class="col-sm-12 control-label">{{__('datatables.pages.tags.slug') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="slug" name="slug" maxlength="150">
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
