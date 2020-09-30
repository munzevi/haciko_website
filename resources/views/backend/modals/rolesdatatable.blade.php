
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">{{__('datatables.modals.roles.create') }}
                </h4>
            </div>
            <div class="modal-body">
                <form id="roleForm" name="roleForm" class="form-horizontal">
                    <div class="form-row mb-2">
                       <input type="hidden" name="id" id="id" valu="">
                        <div class="col-sm-6" style="padding-right: 0">
                            <label for="title" class="col-sm-12 control-label">{{__('datatables.modals.roles.title') }}</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="title" value="" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="col-sm-6"  style="padding-left: 0">
                            <label for="name" class="col-sm-12 control-label">{{__('datatables.modals.roles.name') }}</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" value="" maxlength="50" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-12 control-label">{{__('datatables.modals.roles.description') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="description" name="description" maxlength="250">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-12 control-label">{{__('datatables.pages.roles.permissions') }}</label>
                        <div class="col-sm-12">
                            <select name="permissions[]" class="form-control" id="permission_select" multiple>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="guard_name" class="col-sm-12 control-label">Guard</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="guard_name" name="guard_name" value="web" maxlength="50" value="web" readonly>
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
