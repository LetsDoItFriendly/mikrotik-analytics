<?php


namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\MikrotikDataTable;
use App\Models\Mikrotik;
use Illuminate\Http\Request;

class MikrotikController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = [
        'name' => 'required|string|max:200',
        'url' => 'required'
    ];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\MikrotikDataTable $dataTable
     *
     * @return mixed
     */
    public function index(MikrotikDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.mikrotik.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.mikrotik', $this->formVariables('mikrotik', null));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->createFlashRedirect(Mikrotik::class, $request);
    }

    /**
     * @param Mikrotik $mikrotik
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(Mikrotik $mikrotik)
    {
        return view('admin.show', ['object' => $mikrotik]);
    }

    /**
     * @param Mikrotik $mikrotik
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(Mikrotik $mikrotik)
    {
        return view('admin.forms.mikrotik', $this->formVariables('mikrotik', $mikrotik));
    }

    /**
     * @param Mikrotik $mikrotik
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Mikrotik $mikrotik, Request $request)
    {
        return $this->saveFlashRedirect($mikrotik, $request);
    }

    /**
     * @param Mikrotik $mikrotik
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Mikrotik $mikrotik)
    {
        return $this->destroyFlashRedirect($mikrotik);
    }

}
