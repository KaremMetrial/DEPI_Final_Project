<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
                $edit = "<a href='" . route('admin.product.edit', $query->id) . "' class='btn btn-primary'><i class='fas fa-edit'></i></a>";
                $delete = "<a  href='" . route('admin.product.destroy', $query->id) . "' class='btn btn-danger ml-2 delete_item'><i class='fas fa-trash'></i></a>";
                $more = "<div class='btn-group drop-left ml-2'>
            <button type='button' class='btn btn-dark dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class='fas fa-cog'></i>
            </button>
            <div class='dropdown-menu dropleft'>
                <a href='" . route('admin.product-gallery.show',$query->id) . "' class='dropdown-item'>Product Gallery</a>
                <a href='" . route('admin.product-size.show',$query->id) . "' class='dropdown-item'>Product Variants</a>
            </div>
         </div>";

                return $edit . $delete . $more;
            })
            ->addColumn('image', function ($query) {
                $iamge = "<img width='150px' src='" . asset($query->thumb_image) . "'>";
                return $iamge;
            })
            ->addColumn('price' , function ($query){
                return currencyPosition($query->price);
            })
            ->addColumn('offer_price' , function ($query){
                return currencyPosition($query->offer_price);
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    $status = "<span class='badge badge-primary'>Active</span>";
                } else {
                    $status = "<span class='badge badge-danger'>InActive</span>";
                }
                return $status;
            })
            ->addColumn('show at home', function ($query) {
                if ($query->show_at_home == 1) {
                    $show_at_home = "<span class='badge badge-primary'>Yes</span>";
                } else {
                    $show_at_home = "<span class='badge badge-danger'>No</span>";
                }
                return $show_at_home;
            })
            ->rawColumns(['image', 'action', 'status', 'show at home'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
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
                ->width(10),
            Column::make('name'),
            Column::make('image'),
            Column::make('price'),
            Column::make('offer_price'),
            Column::make('short_description'),
            Column::make('status'),
            Column::make('show at home'),
            Column::computed('action')
                ->width(250)
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
