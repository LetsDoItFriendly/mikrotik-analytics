<?php


namespace App\Http\Controllers\Admin;


use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\InternetProtocolDataTable;
use App\Models\Group;
use App\Models\InternetProtocol;
use App\Models\Mikrotik;
use Illuminate\Http\Request;

class InternetProtocolController extends AdminController
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
     * @param \App\Http\Controllers\Admin\DataTables\InternetProtocolDataTable $dataTable
     *
     * @return mixed
     */
    public function index(InternetProtocolDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.internet_protocol.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.internet_protocol', $this->formVariables('internet_protocol', null, $this->options()));
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
            $request->request->set('type', InternetProtocol::$types['unknown']);
        return $this->createFlashRedirect(InternetProtocol::class, $request);
    }

    /**
     * @param \App\Models\InternetProtocol $internet_protocol
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(InternetProtocol $internet_protocol)
    {
        return view('admin.show', ['object' => $internet_protocol]);
    }

    /**
     * @param \App\Models\InternetProtocol $internet_protocol
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(InternetProtocol $internet_protocol)
    {
        return view('admin.forms.internet_protocol', $this->formVariables('internet_protocol', $internet_protocol, $this->options()));
    }

    /**
     * @param \App\Models\InternetProtocol $internet_protocol
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(InternetProtocol $internet_protocol, Request $request)
    {
        if ($request->get('type') == null)
            $request->request->set('type', InternetProtocol::$types['unknown']);
        return $this->saveFlashRedirect($internet_protocol, $request);
    }

    /**
     * @param \App\Models\InternetProtocol $internet_protocol
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(InternetProtocol $internet_protocol)
    {
        return $this->destroyFlashRedirect($internet_protocol);
    }

    /**
     * @return array
     */
    protected function options()
    {
        return [
            'options' => [
                "group" => Group::pluck('name', 'id'),
                "mikrotik" => Mikrotik::pluck('name', 'id')
            ],
        ];
    }
}
