<?php


namespace App\Http\Controllers\Admin\DataTables;


use App\Base\Controllers\DataTableController;
use App\Models\IP;

class IPDataTable extends DataTableController
{
    /**
     * @var string
     */
    protected $model = IP::class;

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['name', 'gateway', 'type', 'group_id', 'mikrotik_id'];

    /**
     * Columns of relations, relation name as key, relation property as value
     *
     * @var array
     */
    protected $eager_columns = ['group' => 'name'];

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
        return $this->applyScopes(IP::with('group'));
    }

}
