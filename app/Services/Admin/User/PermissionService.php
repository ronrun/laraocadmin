<?php

namespace App\Services\Admin\User;

use Illuminate\Http\Request;
use App\Services\Service;

class PermissionService extends Service
{
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->request = $request;
        $this->modelName = "\Spatie\Permission\Models\Permission";
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

        $sort = $data['sort'] ?? 'name';
        $order = $data['order'] ?? 'asc';
        $limit = $data['limit'] ?? $this->setting->get('config_limit_admin');

        $query->orderBy($sort, $order);

        $rows = $query->paginate($limit);

        foreach ($rows as $row) {
            $row->url_edit = route('lang.admin.user.permission.edit', $row->id);
        }

        return $rows;
    }

    public function getAllRows()
    {
        $rows = $this->model->all();

        return $rows;
    }

    public function create(array $data)
    {
        $row = $this->model->firstOrCreate(['name' => $data['name'], 'description' => $data['description'] ]);
        
        return $row;
    }

    public function updateById($id, $data)
    {
        $row = $this->model->find($id);

        $row->name = $data['name'];
        $row->description = $data['description'] ?? '';

        $row->save();
    }

}