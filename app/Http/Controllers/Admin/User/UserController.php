<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Setting\Users\PermissionService;
use App\Services\Setting\Users\RoleService;
use App\Services\User\UserService;
use Lang;

class UserController extends Controller
{

    public function __construct(Request $request, UserService $UserService, RoleService $RoleService, PermissionService $PermissionService)
    {
        $this->request = $request;
        $this->UserService = $UserService;
        $this->RoleService = $RoleService;
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
        $params  = $this->request->query();
        $queryString = http_build_query($params);
        $this->to_list_url = route('lang.setting.users.user.index');
        $this->form_method = 'post';
        //$this->form_action = url('/'.app()->getLocale().'/setting/user/user/store');
        $this->form_action = route('lang.setting.users.user.store');
        return $this->getForm('create', null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requests = $this->request->except(['id']);

        // $validator = $this->validator($requests);
        // if ($validator->fails()) {
        //     return redirect()->back()->withInput()->withErrors($validator);
        // }

        if(!$this->formValidate($this->request)){
            return redirect()->back()->withInput();
        }

        $row_id = $this->UserService->create($requests);

        $queries = [];

        foreach ($requests as $key => $val) {
            if(strpos($key, 'filter_') === 0 ){
                $queries[$key] = $val;
            }
        }

        return redirect()->route('lang.setting.users.user.edit', $row_id)->with(['success' => '已新增']);
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
        $this->to_list_url = route('lang.setting.users.user.edit', array_merge([$id], $queries));
        $this->form_method = 'put';
        $this->form_action = route('lang.setting.users.user.update', array_merge([$id], $queries));
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
        if(!$this->formValidate($this->request)){
            return redirect()->back()->withInput();
        }

        $data = $this->request->except(['id']);

        $this->UserService->updateById($id, $data);

        return redirect()->back()->with(['success' => '更新成功']);
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
        foreach (Lang::get('common/common') as $key => $value) {
            $arr[$key] = $value;
        }

        foreach (Lang::get('user/user') as $key => $value) {
            $arr[$key] = $value;
        }
        
        $langs = (object)$arr;

        $data['langs'] = (object)$arr;

        $data['heading_title'] = $langs->heading_title;

        //Breadcomb
        $data['breadcumbs'][] = array(
            'text' => $langs->text_home,
            'href' => route('lang.home'),
        );
        
        $data['breadcumbs'][] = array(
            'text' => $langs->heading_title,
            'href' => null,
        );


        $urlParameters = $this->request->query();

        $query = User::whereRaw('1=1');

        //從網址參數預先取得本次資料列排序邏輯。
        $sort = $this->request->query('sort', 'id');
        $order = $this->request->query('order', 'DESC');

        //用於資料表格的欄位名稱，標記某欄排序，呈現正反序符號。
        if (isset($this->request->sort)) {
            $data['sort'] = $this->request->query('sort');
        } else {
            $data['sort'] = 'id';
        }

        if (isset($this->request->order)) {
            $data['order'] = $this->request->query('order');
        } else {
            $data['order'] = 'DESC';
        }

        $arrFilters = ['username', 'name', 'email'];

        foreach ($arrFilters as $field) {
            $key = 'filter_' . $field;
            if(null !== $this->request->query($key)){
                $value = $this->request->query($key);
                $value = str_replace('*', '%', $value);
                $query->where($field, 'like', $value);
            } 
        }

        $query->orderBy($sort, $order);

        $rows = $query->paginate(10);

        foreach ($rows as $row) {
            $row->url_edit = route('lang.setting.users.user.edit', $row->id);
        }

        $data['users'] = $rows;

        if($data['order'] == 'ASC'){
            $url_order = 'DESC';
        }else{
            $url_order = 'ASC';
        }

        //資料列排序
        $data['sort_id'] = route('lang.setting.users.user.index', ['sort'=>'id', 'order'=>$url_order]);
        $data['sort_username'] = route('lang.setting.users.user.index', ['sort'=>'username', 'order'=>$url_order]);
        $data['sort_name'] = route('lang.setting.users.user.index', ['sort'=>'name', 'order'=>$url_order]);
        $data['sort_email'] = route('lang.setting.users.user.index', ['sort'=>'email', 'order'=>$url_order]);

        //網址搜尋參數
        $data['filter_name'] = $this->request->input('filter_name', null);
        $data['filter_username'] = $this->request->input('filter_username', null);
        $data['filter_email'] = $this->request->input('filter_email', null);
        $data['filter_status'] = $this->request->input('filter_status', null);
        $data['sort'] = $sort;
        $data['order'] = $order;

        //表單
        $data['url_create'] = route('lang.setting.users.user.create');


        return view('setting.users.user_list', $data);

    }


    public function getForm($action, $id = null)
    {

        //Language
        foreach (Lang::get('common/common') as $key => $value) {
            $arr[$key] = $value;
        }

        foreach (Lang::get('user/user') as $key => $value) {
            $arr[$key] = $value;
        }

        $arr['text_form'] = !isset($id) ? $arr['text_add'] : $arr['text_edit'];
        
        $langs = (object)$arr;

        $data['langs'] = (object)$arr;

        //breadcomb
        $data['breadcumbs'][] = array(
            'text' => $langs->text_home,
            'href' => route('lang.home'),
        );
        
        $data['breadcumbs'][] = array(
            'text' => $langs->heading_title,
            'href' => url('/'.app()->getLocale().'/programs/p0001'),
        );

        $queries  = $this->request->query();
        $queryString = http_build_query($queries);

        // User
        $user = $this->UserService->findIdOrNew($id);
        $data['user'] = $user;

        $data['to_list_url'] = $this->to_list_url;
        $data['form_action'] = $this->form_action;
        $data['form_method'] = $this->form_method;

        return view('setting.users.user_form', $data);
    }


    public function formValidate()
    {
        try {
            $this->validate($this->request, [
                'name' => 'required|regex:/^[\w\s\-]+$/u|min:2|max:20',
                'password' => 'sometimes|nullable|min:6|max:20',
                'email' => 'sometimes|nullable|email',
            ], [
                'name.*' => '請輸入姓名，長度在 2 至 20 位字元之間',
                'password.*' => '密碼長度在 6 至 20 位字元之間',
                'email.*' => '請輸入有效郵件地址',
            ]);

            return true;
        }catch(\Illuminate\Foundation\Validation\ValidationException $e){
            return false;
        }    
    }

    public function autocomplete()
    {
        $json = [];

        if(isset($this->request->filter_name) && mb_strlen($this->request->filter_name, 'utf-8') < 1){
            return false;
        }

        if(isset($this->request->filter_code) && mb_strlen($this->request->filter_code, 'utf-8') < 3){
            return false;
        }

        if(!isset($this->request->filter_code) && !isset($this->request->filter_name)){
            return false;
        }

        $filter_data = array(
            'filter_name'   => '*'.$this->request->filter_name.'*',
            'filter_code'   => '*'.$this->request->filter_code.'*',
            'filter_status'   => 'Y',
            'sort'          => 'name',
            'order'         => 'ASC',
            'start'         => 0,
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

    public function department_autocomplete()
    {
        $json = [];

        if(!isset($this->request->filter_name) || mb_strlen('$this->request->filter_name', 'utf-8') < 2){
            return false;
        }

        $filter_data = array(
            'filter_name'   => '*'.$this->request->filter_name.'*',
            'filter_status'   => 'Y',
            'sort'          => 'GEM02',
            'order'         => 'ASC',
            'start'         => 0,
            'limit'         => 10
        );

        $departments = $this->UserService->getDepartments($filter_data);
        foreach ($departments as $department) {
            $json[] = array(
                'department_id' => $department->GEM01,
                'department_name' => $department->GEM02,
            );
        }

        $sort_order = array();

        foreach ($json as $key => $value) {
            $sort_order[$key] = $value['department_name'];
        }

        array_multisort($sort_order, SORT_ASC, $json);

        return response(json_encode($json))->header('Content-Type','application/json');
    }
}
