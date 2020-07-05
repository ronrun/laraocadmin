<?php

namespace App\Services\Admin\User;

use Illuminate\Http\Request;
use App\Services\Service;

class UserService extends Service
{
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->request = $request;
        $this->modelName = "\App\Models\Admin\User";
        $this->model = new $this->modelName;
        $this->table = $this->model->getTable();
    }

    public function findIdOrNew($id)
    {
        $model = new $this->modelName;

        if(empty($id)){
            $row = $model;
        }else{
            $row = $model->find($id);
        }

        if (is_subclass_of($row, 'Illuminate\Database\Eloquent\Model')) {
            return $row;
        }

        return false;        
    }

    public function create(array $data)
    {
        $row= new $this->modelName;
        $row->username = $data['username'];
        $row->name = $data['name'];
        $row->email = $data['email'] ?? '';
        $row->mobile = $data['mobile'] ?? '';
        $row->password = !empty($data['password']) ? bcrypt($data['password']) : $row->password;
        $row->save();

        return $row->id;
    }

    public function getRows($data)
    {
        $model = new $this->modelName;
        $query = $model->query();

        //Columns
        $columns = $this->getTableColumnsByModel($this->model);

        foreach ($columns as $column) {
            $key = 'filter_' . $column;
            if(!empty($data[$key])){
                $value = $data[$key];

                //find empty or null
                if($value === '='){
                    $query->where(function ($query) use($column) {
                        $query->where($column, '')->orWhereNull($column);
                    });
                }
                //not equil
                else if(stripos($value, '<>') === 0){
                    $value = substr($value,2);
                    $query->where($column, '<>', $value);
                }
                //match
                else{  
                    $query->where(function ($query) use($column, $value) {
                        $patternChs = str_replace('*', '(.*)', ChtToChs($value));
                        $patternCht = str_replace('*', '(.*)', ChsToCht($value));
                        $query->whereRaw("$column REGEXP '^$patternChs$' OR $column REGEXP '^$patternCht$' ");
                    });
                }
            }
        }

        $sort = $data['sort'] ?? 'username';
        $order = $data['order'] ?? 'asc';
        $limit = $data['limit'] ?? $this->setting->get('config_limit_admin');

        $query->orderBy($sort, $order);

        $rows = $query->paginate($limit);

        return $rows;
    }

    public function getAllRows()
    {
        $rows = $this->model->all();

        return $rows;
    }

    public function updateById($id, $data)
    {
        $row = $this->model->find($id);

        $row->name = $data['name'] ?? $row->name;
        $row->email = $data['email'] ?? $row->email;
        $row->mobilephone = $data['mobilephone'] ?? $row->mobilephone;
        $row->password = !empty($data['password']) ? bcrypt($data['password']) : $row->password;

        if($row->isDirty()){
            $row->save();
        }

        return true;
    }


}