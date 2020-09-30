<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Spatie\Permission\Models\Permission;

class PermissionsDataTable extends DataTable
{
    protected $actions = ['print', 'export', 'create'];

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
            ->addColumn('role',function($permission){
                if($permission->roles()){
                    return $permission->roles->map(function($role){
                        return "<div class='badge badge-pill badge-light text-dark' style='font-size: 14px; font-weight:600;text-transform: capitalize;'><small>{$role->title}</small></div>";
                    })->implode(' ');
//                        return $role->title;
//                    })->implode(', ');
                }else{
                    return 'yok';
                }
            })
            ->addColumn('users',function($permission){
                return $permission->users->count();
            })
            ->addColumn('action', function($row){
                return '<a href="javascript:void(0)"  data-id="'.$row->id.'" data-original-title="Düzenle" class="btn btn-primary btn-sm editPermission" style="min-width:110px"><i class="nc-icon nc-settings-gear-65" style="color:white;margin-right:5px;font-weight:600;"></i>'.trans("datatables.actions.edit") .'</a><a href="javascript:void(0)" data-id="'.$row->id.'" data-original-title="Sil" class="btn btn-danger btn-sm deletePermission" style="min-width:110px"><i class="nc-icon nc-simple-remove" style="color:white;margin-right:5px;font-weight:600;"></i>'.trans("datatables.actions.edit") .'</a>';

            })->rawColumns(['role','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\PermissionsDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Permission $model)
    {
        return $model->with(['users','roles'])->withCount('users')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('permissionsdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom("<'row button-wrapper'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12 button-group'B><'col-md-3 col-sm-12'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>")
                    ->orderBy(1)
                    ->parameters([
                        'buttons'      => [
                           ['text' => '<i class="nc-icon nc-simple-add" style="color:white;margin-right:5px;font-weight:600;"></i>Yeni Kayıt',
                           'className' => 'btn btn-secondary btn-sm',
                           'action' => 'function(e, dt, node, config) {
                            $("#saveBtn").val("create-role");
                            $("#saveBtn").html("Ekle");
                            $("#id").val("");
                            $("#permissionForm").trigger("reset");
                            $("#modelHeading").html("Rol Ekleme");
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
            Column::make('title')->title('İsim'),
            Column::computed('role')->title('Yetki Rolü'),
            Column::make('description')->title('Açıklama'),
            Column::make('name')->title('Kod'),
            Column::make('created_at')->title('Oluşturulma'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(220)
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
        return 'Permissions_' . date('YmdHis');
    }

    public function test()
    {
        //...your code here.
    }
}
