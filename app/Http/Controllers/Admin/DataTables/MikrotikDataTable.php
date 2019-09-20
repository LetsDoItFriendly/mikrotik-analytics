<?php


namespace App\Http\Controllers\Admin\DataTables;


use App\Base\Controllers\DataTableController;
use App\Models\Mikrotik;

class MikrotikDataTable extends DataTableController
{
    /**
     * @var string
     */
    protected $model = Mikrotik::class;

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['name', 'url'];

    /**
     * Columns to show relations count
     *
     * @var array
     */
    protected $count_join_columns = ['ip_count'];

    /**
     * @var bool
     */
    protected $ops = true;

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->applyScopes(
            Mikrotik::leftJoin('ips', 'mikrotiks.id', '=', 'ips.mikrotik_id')
                ->selectRaw('mikrotiks.*, count(ips.id) as ip_count')
                ->groupBy('mikrotiks.id')
        );
    }
}
