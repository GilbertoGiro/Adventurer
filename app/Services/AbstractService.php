<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Intervention\Image\Facades\Image;

abstract class AbstractService{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var array
     */
    protected $result;

    /**
     * @var array
     */
    protected $return;

    /**
     * @var array
     */
    protected $filtersOrder = [
        'query',
        'with',
        'orderByAsc',
        'orderByDesc',
        'paginated',
        'limit'
    ];

    /**
     * Filter constructor.
     *
     * @param Model $model
     */
    protected function __construct(Model $model)
    {
        $this->model = $model;
        $this->filtersOrder = array_merge($this->model->getFillable(), $this->filtersOrder);
    }

    /**
     * Method to get all Model Objects
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Method to get all Model Objects Limited
     *
     * @param int $limit
     * @return mixed
     */
    public function limit(int $limit)
    {
        return $this->model->limit($limit)->get();
    }

    /**
     * Method to get all records based in Request Information
     *
     * @param $columns
     * @param Request $request
     * @param string $format
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function get($columns, Request $request, $format = 'array')
    {
        $this->request = $request;
        $this->result  = $this->model->select($columns);

        $this->request->merge(['limit' => 6]);

        if(empty($this->request->get('paginated'))){
            $this->request->merge(['paginated' => true]);
        }

        if(empty($this->request->get('limit'))){
            $this->request->merge(['limit' => 15]);
        }

        foreach($this->filtersOrder as $key => $value){
            $filter = $this->request->get($value);

            if(!strcmp($value,'orderByAsc') && $this->request->get('orderByDesc')){
                continue;
            }

            if(method_exists($this, $value) && !empty($filter)){
                $this->$value($filter);
            }else{
                if($this->columnExists($value) && !empty($filter)){
                    $this->where($value, $filter);
                }
            }
        }

        $array = ($format === 'array') ? $this->result->toArray() : $this->result;
        $results = (isset($array['data'])) ? $array['data'] : $array;

        $this->return['data']   = (!empty($results['data'])) ? $results['data'] : $results;
        $this->return['count']  = $this->model->count();
        $this->return['filter'] = $this->result->count();

        return $this->return;
    }

    /**
     * Method to find Model Object
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Method to get Model Object information
     *
     * @param int $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->model->find($id);
    }

    /**
     * Method to get Model Object by passed relation of Key => Value
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Collection|static|static[]
     */
    public function findBy(array $data)
    {
        $return = $this->model->all();
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $return = $return->whereIn($key, $value);
                continue;
            }
            $return = $return->where($key, $value);
        }
        return $return->first();
    }

    /**
     * Method to create Model Object
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Method to update Model Object
     *
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id)
    {
        $elem = $this->model->find($id);
        $elem->update($data);

        return $elem;
    }

    /**
     * Method to remove Model Object
     *
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function delete($id)
    {
        if($this->model->delete($id)){
            return [];
        }
    }

    /**
     * Method to prepare Image
     *
     * @param $file
     * @param int $width
     * @return mixed
     */
    public function prepareImage($file, $width = 135)
    {
        $img = Image::make($file);
        $img->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        return $img;
    }

    /**
     * Method to paginate rows
     *
     * @param $value
     */
    private function paginated($value) : void
    {
        $value = json_decode($value);

        if($value){
            $this->result = $this->result->paginate($this->request->get('limit'));

            $this->return['page']  = $this->result->currentPage() - 1;
            $this->return['pages'] = $this->result->lastPage();
        }else{
            $this->result = $this->result->get();
        }
    }

    /**
     * Method to get rows with some associated Table Information
     *
     * @param $value
     */
    private function with($value) : void
    {
        $this->result = $this->result->with($value);
    }

    /**
     * Method to Order Rows by passed Columns
     *
     * @param string $value
     */
    private function orderByAsc(string $value) : void
    {
        $this->result = $this->result->orderBy($value);
    }

    /**
     * Method to Order Rows by passed Columns
     *
     * @param $value
     */
    private function orderByDesc(string $value) : void
    {
        $this->result = $this->result->orderByDesc($value);
    }

    /**
     * Method to check if Column Exists in Eloquent Model
     *
     * @param $value
     * @return mixed
     */
    private function columnExists($value) : bool
    {
        return Schema::hasColumn($this->model->getTable(), $value);
    }

    /**
     * Method to get Model Objects by passed Condition
     *
     * @param $key
     * @param $value
     */
    private function where($key, $value) : void
    {
        if(!((int) $value)){
            $this->result = $this->result->where(function($query) use ($key, $value){
                $query->whereRaw("LOWER({$key}) LIKE LOWER(?)", '%'.$value.'%');
            });
        }else{
            if(is_array($value)){
                $this->result = $this->result->whereIn($key, $value);
            }else{
                $this->result = $this->result->where($key, $value);
            }
        }
    }

    /**
     * Method to get Model Objects by passed Condition
     *
     * @param $value
     */
    private function query($value) : void
    {
        $columns = $this->model->getFillable();

        foreach($columns as $column){
            $type = Schema::getColumnType($this->model->getTable(), $column);

            if($type != 'integer' && $type != 'boolean'){
                if(!in_array(gettype($value), ['integer', 'boolean'])){
                    $this->result = $this->result->orWhere($column, 'LIKE', '%' . $value . '%');
                }
            }else{
                if(!in_array(gettype($value), ['string', 'text'])){
                    $this->result = $this->result->orWhere($column, $value);
                }
            }
        }
    }
}