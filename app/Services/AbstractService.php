<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

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
    protected $filtersOrder;

    /**
     * Filter constructor.
     *
     * @param Model $model
     */
    protected function __construct(Model $model)
    {
        $this->model = $model;
        $this->filtersOrder = $this->model->getFillable();
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
     * Method to get all records based in Request Information
     *
     * @param $columns
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function get($columns = '*', Request $request)
    {
        $this->request = $request;
        $this->result  = $this->model->select($columns);

        foreach($this->filtersOrder as $key => $value){
            $filter = $this->request->get($value);

            if($this->columnExists($value) && !empty($filter)){
                $this->where($value, $filter);
            }
        }

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

        foreach($data as $key => $value){
            if(is_array($value)){
                $return = $return->whereIn($key, $value);
                continue;
            }

            $return = $return->where($key, $value);
        }

        return $return;
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
     * @return array
     */
    public function update(array $data, int $id)
    {
        $elem = $this->model->find($id);

        if($elem->update($data)){
            return ['status' => '00'];
        }

        return ['status' => '01', 'message' => 'Não foi possível atualizar o registro'];
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
            return ['status' => '00'];
        }

        return ['status' => '01', 'message' => 'Não foi possível excluir o registro'];
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
        $type = Schema::getColumnType($this->model->getTable(), $key);

        if(!in_array($type, ['integer', 'boolean'])){
            $value = (string) $value;

            $this->result = $this->result->where(function($query) use ($key, $value){
                $query->whereRaw("LOWER({$key}) LIKE LOWER(?)", '%'.$value.'%');
            });
        }else{
            $this->result = $this->result->where($key, $value);
        }
    }
}
