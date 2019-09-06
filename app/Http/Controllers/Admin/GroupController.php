<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\GroupDataTable;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = ['name' => 'required|string|max:200',
        'user_id' => 'required|exists:users,id'
    ];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\GroupDataTable $dataTable
     *
     * @return mixed
     */
    public function index(GroupDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.group.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.group', $this->formVariables('group', null));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->createFlashRedirect(Group::class, $request);
    }

    /**
     * @param \App\Models\Group $group
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(Group $group)
    {
        return view('admin.show', ['object' => $group]);
    }

    /**
     * @param \App\Models\Group $group
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(Group $group)
    {
        return view('admin.forms.group', $this->formVariables('group', $group));
    }

    /**
     * @param \App\Models\Group $group
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Group $group, Request $request)
    {
        return $this->saveFlashRedirect($group, $request);
    }

    /**
     * @param \App\Models\Group $group
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Group $group)
    {
        return $this->destroyFlashRedirect($group);
    }
}
