<?php


namespace App\Http\Controllers\Admin;


use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\IPDataTable;
use App\Models\Group;
use App\Models\IP;
use App\Models\Mikrotik;
use Illuminate\Http\Request;

class IPController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = [
        'name'      => 'required|string',
        'gateway'  => 'required|string',
        'group_id' => 'required|exists:groups,id',
        'mikrotik_id' => 'required|exists:mikrotiks,id'
    ];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\IPDataTable $dataTable
     *
     * @return mixed
     */
    public function index(IPDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.ip.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.ip', $this->formVariables('ip', null, $this->options()));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        if ($request->get('type') == null)
            $request->request->set('type', IP::$types['unknown']);
        return $this->createFlashRedirect(IP::class, $request);
    }

    /**
     * @param \App\Models\IP $ip
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(IP $ip)
    {
        return view('admin.show', ['object' => $ip]);
    }

    /**
     * @param \App\Models\IP $ip
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(IP $ip)
    {
        return view('admin.forms.ip', $this->formVariables('ip', $ip, $this->options()));
    }

    /**
     * @param \App\Models\IP $ip
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(IP $ip, Request $request)
    {
        if ($request->get('type') == null)
            $request->request->set('type', IP::$types['unknown']);
        return $this->saveFlashRedirect($ip, $request);
    }

    /**
     * @param \App\Models\IP $ip
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(IP $ip)
    {
        return $this->destroyFlashRedirect($ip);
    }

    /**
     * @return array
     */
    protected function options()
    {
        return [
            'options' => Group::pluck('name', 'id'),
            'second_options' =>   Mikrotik::pluck('name', 'id'),
        ];
    }
}
