   
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="userForm" name="userForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id" valu="">
                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">{{__('datatables.modals.users.title') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-12 control-label">{{__('datatables.modals.users.email') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" placeholder="" value="" maxlength="50" required="">                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label">{{__('datatables.modals.users.roles') }}</label>
                        <div class="col-sm-12">
                        <select class="form-control" name="roles[]" id="role_select" multiple required>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>                             
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label">{{__('datatables.modals.users.permissions') }}</label>
                        <div class="col-sm-12">
                        <select class="form-control" name="permissions[]" id="permission_select" multiple required>
                            @foreach($permissions as $permission)
                                <option value="{{$permission->id}}">{{$permission->name}}</option>
                            @endforeach
                        </select>                             
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-12 control-label">{{__('datatables.modals.users.password') }}</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="password" name="password" placeholder="" value="" maxlength="11" required="">                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12 control-label">{{__('datatables.modals.users.password-confirm') }}</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="" value="" maxlength="11" required="">                            
                        </div>
                    </div>
      
                    <div class="col-sm-12">
                     <button type="submit" class="btn btn-primary btn-block" id="saveBtn" value="create">{{__('datatables.modals.users.create') }}
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>