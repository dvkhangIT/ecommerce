<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
  /**
   * Build the DataTable class.
   *
   * @param QueryBuilder $query Results from query() method.
   */
  public function dataTable(QueryBuilder $query): EloquentDataTable
  {
    return (new EloquentDataTable($query))
      ->addColumn('action', function ($query) {
        $editBtn = '<a href="' . route('admin.category.edit', $query->id) . '" class="btn btn-primary"><i class="far fa-edit"></i></a>';
        $deleteBtn = '<a href="' . route('admin.category.destroy', $query->id) . '" class="btn btn-danger ml-1 delete-item"><i class="far fa-trash-alt"></i></a>';
        return $editBtn . $deleteBtn;
      })
      ->addColumn('icon', function ($query) {
        return '<i style="font-size:40px" class = "' . $query->icon . '"></i>';
      })
      ->addColumn('status', function ($query) {
        if ($query->status == 1) {
          $button = '<label class="custom-switch mt-2">
          <input checked type="checkbox" name="custom-switch-checkbox" class="custom-switch-input change-status" data-id="' . $query->id . '">
          <span class="custom-switch-indicator"></span>
          </label>';
        } else {
          $button = '<label class="custom-switch mt-2">
          <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input change-status" data-id="' . $query->id . '">
          <span class="custom-switch-indicator"></span>
          </label>';
        }
        return $button;
      })
      ->rawColumns(['icon', 'action', 'status'])
      ->setRowId('id');
  }

  /**
   * Get the query source of dataTable.
   */
  public function query(Category $model): QueryBuilder
  {
    return $model->newQuery();
  }

  /**
   * Optional method if you want to use the html builder.
   */
  public function html(): HtmlBuilder
  {
    return $this->builder()
      ->setTableId('category-table')
      ->columns($this->getColumns())
      ->minifiedAjax()
      //->dom('Bfrtip')
      ->orderBy(1)
      ->selectStyleSingle()
      ->buttons([
        Button::make('excel'),
        Button::make('csv'),
        Button::make('pdf'),
        Button::make('print'),
        Button::make('reset'),
        Button::make('reload')
      ]);
  }

  /**
   * Get the dataTable columns definition.
   */
  public function getColumns(): array
  {
    return [
      Column::make('id')
        ->type('string')
        ->width(100),
      Column::make('icon')->width(200),
      Column::make('name'),
      Column::make('status')->width(100),
      Column::computed('action')
        ->exportable(false)
        ->printable(false)
        ->width(200)
        ->addClass('text-center'),
    ];
  }

  /**
   * Get the filename for export.
   */
  protected function filename(): string
  {
    return 'Category_' . date('YmdHis');
  }
}
