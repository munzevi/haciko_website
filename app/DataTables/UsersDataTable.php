<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\User;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('role',function($user){
                if(count($user->roles) > 0){
                    return $user->roles->map(function($role){
                        return $role->title;
                    })->implode(', ');
                }else{
                    return 'yok';
                }
            })
            ->addColumn('permission',function($user){
                if(count($user->permissions) > 0){
                    return $user->permissions->map(function($permission){
                        return $permission->title;
                    })->implode(', ');
                }else{
                    return 'yok';
                }
            })
            ->addColumn('action', function($row){
                return '<a href="javascript:void(0)"  data-id="'.$row->id.'" data-original-title="{{__("datatables.actions.edit") }}" class="btn btn-primary btn-sm editUser" style="min-width:110px"><i class="nc-icon nc-settings-gear-65" style="color:white;margin-right:5px;font-weight:600;"></i>'.trans("datatables.actions.delete").'</a><a href="javascript:void(0)" data-id="'.$row->id.'" data-original-title="Sil" class="btn btn-danger btn-sm deleteUser" style="min-width:110px"><i class="nc-icon nc-simple-remove" style="color:white;margin-right:5px;font-weight:600;"></i>'.trans("datatables.actions.delete") .'</a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\RolesDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->with(['roles','permissions'])->newQuery();

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('usersdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom("<'row button-wrapper'<'col-md-3 col-sm-12'l><'col-md-6 col-sm-12 button-group'B><'col-md-3 col-sm-12'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>")
                    ->parameters([
                        'buttons'      => [ 
                           ['text' => '<i class="nc-icon nc-simple-add" style="color:white;margin-right:5px;font-weight:600;"></i>Yeni Kayıt',
                           'className' => 'btn btn-secondary btn-sm',
                           'action' => 'function(e, dt, node, config) { 
                            $("#saveBtn").val("create-user");
                            $("#saveBtn").html("Ekle");
                            $("#id").val("");
                            $("#permissionForm").trigger("reset");
                            $("#modelHeading").html("Kullanıcı Ekleme");
                            $("#ajaxModel").modal("show"); 
                        }'],
                        ['extend'=>'print','text'=>'<i class="nc-icon nc-paper" style="color:white;margin-right:5px;font-weight:600;"></i>yazdır','className'=>'btn btn-secondary btn-sm'], 
                        ['extend'=>'export','text'=>'<i class="nc-icon nc-paper" style="color:white;margin-right:5px;font-weight:600;"></i>Dışa Aktar ','className'=>'btn btn-secondary btn-sm']
                        ],
                        'language' => [
                            'url' => url('vendor/datatables/turkish.json'), 
                        ]
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->width(30),
            Column::make('name')->title('name'),
            Column::computed('roles')->title('Rolleri'),
            Column::computed('permissions')->title('Yetkileri'),
            Column::make('email')->title('Eposta'),
            Column::make('created_at')->title('Oluşturulma'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(230)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users__' . date('YmdHis');
    }
}
