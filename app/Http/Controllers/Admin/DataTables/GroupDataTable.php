<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Base\Controllers\DataTableController;
use App\Models\Group;

class GroupDataTable extends DataTableController
{

    /**
     * @var string
     */
    protected $model = Group::class;

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['name', 'user_id'];

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
            Group::with('user')->leftJoin('internet_protocols', 'groups.id', '=', 'internet_protocols.group_id')
                ->selectRaw('groups.*, count(internet_protocols.id) as ip_count')
                ->groupBy('groups.id')
        );
    }
}
