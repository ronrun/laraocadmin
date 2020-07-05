<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\User\UserService;
use Validator;
use Lang;

class UserController extends Controller
{

    public function __construct(Request $request, UserService $UserService)
    {
        $this->request = $request;
        $this->UserService = $UserService;
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
        
        $this->previous_url     = route('lang.admin.user.user.index', $queries);
        $this->form_action      = route('lang.admin.user.user.store');
        $this->form_method      = 'post';

        return $this->getForm('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->request->all();

        $validator = $this->validator($data);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $row_id = $this->UserService->create($data);

        return redirect()->route('lang.admin.user.user.edit', $row_id)->with(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "<pre>", print_r('show', 1), "</pre>"; exit;
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

        $this->previous_url = route('lang.admin.user.user.index', array_merge([$id], $queries));
        $this->form_action  = route('lang.admin.user.user.update', array_merge([$id], $queries));
        $this->form_method  = 'put';

        return $this->getForm('edit', $id);
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

        $this->UserService->updateById($id, $data);

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



    public function getList()
    {
        //Language
        $langs = new \stdClass();

        foreach (Lang::get('admin/common/common') as $key => $value) {
            $langs->{$key} = $value;
        }

        foreach (Lang::get('admin/user/user') as $key => $value) {
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
            'filter_username'       => $this->request->query('filter_username', null),
            'filter_name'           => $this->request->query('filter_name', null),
            'filter_email'          => $this->request->query('filter_email', null),
            'filter_active'          => $this->request->query('filter_active', 1),
            'sort'                  => $this->request->query('sort', 'username'),
            'order'                 => $this->request->query('order', 'asc'),
            'limit'                 => $this->request->query('limit', null),
        ];
        $rows = $this->UserService->getRows($filter_data);

        foreach ($rows as $row) {
            $row->url_edit = route('lang.admin.user.user.edit', $row->id);
            $row->active_string = ($row->active==1) ? 'Y' : 'N';
        }

        $data['users'] = $rows;

        $data['filter_username']    = $this->request->input('filter_username', null);
        $data['filter_name']        = $this->request->input('filter_name', null);
        $data['filter_email']       = $this->request->input('filter_email', null);
        $data['filter_active']      = $this->request->input('filter_active', null);

        $data['sort'] = $this->request->query('sort', 'username');
        $data['order'] = ($this->request->query('order')=='asc') ? 'desc' : 'asc';
        $data['sort_username']      = route('lang.admin.user.user.index', ['sort'=>'username', 'order'=>$data['order']]);
        $data['sort_name']          = route('lang.admin.user.user.index', ['sort'=>'name', 'order'=>$data['order']]);

        $data['url_create'] = route('lang.admin.user.user.create');

        return view('admin.user.user_list', $data);
    }


    public function getForm($action, $id = null)
    {
        //Language
        $langs = new \stdClass();

        foreach (Lang::get('admin/common/common') as $key => $value) {
            $langs->{$key} = $value;
        }

        foreach (Lang::get('admin/user/user') as $key => $value) {
            $langs->{$key} = $value;
        }

        $data['heading_title'] = $langs->heading_title;

        $langs->text_form = ($action == 'create') ? $langs->text_add : $langs->text_edit;

        $data['langs'] = $langs;

        //breadcomb
        $data['breadcumbs'][] = array(
            'text' => $langs->text_home,
            'href' => route('lang.home'),
        );
        
        $data['breadcumbs'][] = array(
            'text' => $langs->heading_title,
            'href' => null,
        );

        // Record
        $row = $this->UserService->findIdOrNew($id);
        $data['user'] = $row;

        $data['previous_url'] = $this->previous_url;
        $data['form_action'] = $this->form_action;
        $data['form_method'] = $this->form_method;

        return view('admin.user.user_form', $data);
    }

    public function autocomplete()
    {
        $json = [];

        if(isset($this->request->filter_name) && mb_strlen($this->request->filter_name, 'utf-8') < 1){
            return false;
        }

        $filter_data = array(
            'filter_name'   => $this->request->filter_name,
            'filter_active'   => 1,
            'sort'          => 'name',
            'order'         => 'ASC',
            'limit'         => 10
        );

        $rows = $this->UserService->getRows($filter_data);

        $i = 0;
        foreach ($rows as $row) {
            $json[$i] = array(
                'id' => $row->id,
                'username' => $row->username,
                'name' => strip_tags(html_entity_decode($row->name, ENT_QUOTES, 'UTF-8')),
                'label' => $row->name . '-' . $row->username,
            );
            if(!empty($row->department)){
                $json[$i]['department_id']   = $row->department->id;
                $json[$i]['department_code'] = $row->department->code;
                $json[$i]['department_name'] = $row->department->name;
            }
            $i++;
        }

        $sort_order = array();

        foreach ($json as $key => $value) {
            $sort_order[$key] = $value['name'];
        }

        array_multisort($sort_order, SORT_ASC, $json);

        return response(json_encode($json))->header('Content-Type','application/json');
    }


    public function validator(array $data)
    {
        //Language
        $langs = new \stdClass();

        foreach (Lang::get('admin/user/user') as $key => $value) {
            $langs->{$key} = $value;
        }

        return Validator::make($data, [
            'username' => 'required|regex:/^[\w\s\-]+$/u|min:3',
            'name' => 'required|regex:/^[\w\s\-]+$/u|min:3',
        ],[
            'username.*'    => $langs->error_username,
            'name.*'        => $langs->error_name,
        ]);
    }
}
