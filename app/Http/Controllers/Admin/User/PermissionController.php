<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\User\PermissionService;
use Validator;
use Lang;

class PermissionController extends Controller
{

    public function __construct(Request $request, PermissionService $PermissionService)
    {
        parent::__construct();
        $this->request = $request;
        $this->PermissionService = $PermissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getList();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $queries = $this->request->query();
        
        $this->previous_url = route('lang.admin.user.role.index', $queries);
        $this->form_action = route('lang.admin.user.permission.store');
        $this->form_method = 'post';

        return $this->getForm('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->request->all();

        $validator = $this->validator($data);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $row = $this->PermissionService->create($data);

        $this->previous_url = route('lang.admin.user.permission.index', $data);
        $this->form_action = route('lang.admin.user.permission.update', $row->id);
        $this->form_method = 'put';

        return redirect()->route('lang.admin.user.permission.edit', $row->id)->with(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $queries = $this->request->query();

        $this->previous_url = route('lang.admin.user.permission.index', array_merge([$id], $queries));
        $this->form_action = route('lang.admin.user.permission.update', array_merge([$id], $queries));
        $this->form_method = 'put';

        return $this->getForm('edit',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = $this->request->all();

        $validator = $this->validator($data);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $this->PermissionService->updateById($id, $data);

        return redirect()->back()->with(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // index(), delete() ... 都會呼叫本函數。
    public function getList()
    {
        //Language
        $langs = new \stdClass();

        foreach (Lang::get('admin/common/common') as $key => $value) {
            $langs->{$key} = $value;
        }

        foreach (Lang::get('admin/user/permission') as $key => $value) {
            $langs->{$key} = $value;
        }

        $data['heading_title'] = $langs->heading_title;

        $data['langs'] = $langs;

        //Breadcomb
        $data['breadcumbs'][] = array(
            'text' => $langs->text_home,
            'href' => route('lang.admin.dashboard'),
        );
        
        $data['breadcumbs'][] = array(
            'text' => $langs->heading_title,
            'href' => null,
        );

        //Get Rows
        $filter_data = [
            'filter_name'           => $this->request->query('filter_name', null),
            'filter_description'    => $this->request->query('filter_description', null),
            'sort'                  => $this->request->query('sort', 'name'),
            'order'                 => $this->request->query('order', 'asc'),
            'limit'                 => $this->request->query('limit', null),
        ];
        $rows = $this->PermissionService->getRows($filter_data);
        $data['permissions'] = $rows;

        $data['filter_name'] = $this->request->input('filter_name', null);
        $data['filter_description'] = $this->request->input('filter_description', null);

        $data['sort'] = $this->request->query('sort', 'name');
        $data['order'] = ($this->request->query('order')=='asc') ? 'desc' : 'asc';
        $data['sort_name'] = route('lang.admin.user.permission.index', ['sort'=>'name', 'order'=>$data['order']]);
        $data['sort_description'] = route('lang.admin.user.permission.index', ['sort'=>'description', 'order'=>$data['order']]);

        $data['url_create'] = route('lang.admin.user.permission.create');

        return view('admin.user.permission_list', $data);
    }

    public function getForm($action, $id=null)
    {
        //Language
        $langs = new \stdClass();

        foreach (Lang::get('admin/common/common') as $key => $value) {
            $langs->{$key} = $value;
        }

        foreach (Lang::get('admin/user/permission') as $key => $value) {
            $langs->{$key} = $value;
        }

        $langs->text_form = ($action=='create') ? $langs->text_add : $langs->text_edit;

        $data['heading_title'] = $langs->heading_title;

        $data['langs'] = $langs;

        //breadcomb
        $data['breadcumbs'][] = array(
            'text' => $langs->text_home,
            'href' => route('lang.admin.dashboard'),
        );
        
        $data['breadcumbs'][] = array(
            'text' => $langs->heading_title,
            'href' => url('/'.app()->getLocale().'/admin/user/permission'),
        );

        // Record
        $row = $this->PermissionService->findIdOrNew($id);
        $data['permission'] = $row;

        $data['previous_url'] = $this->previous_url;
        $data['form_action'] = $this->form_action;
        $data['form_method'] = $this->form_method;

        return view('admin.user.permission_form', $data);
    }


    public function validator(array $data)
    {
        //Language
        $langs = new \stdClass();

        foreach (Lang::get('admin/user/permission') as $key => $value) {
            $langs->{$key} = $value;
        }

        return Validator::make($data, [
            'name' => 'required|regex:/^[\w\s\-]+$/u|min:3',
        ],[
            'name.*' => $langs->error_name,
        ]);
    }
}
