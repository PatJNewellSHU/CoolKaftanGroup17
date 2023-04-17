<?php

namespace App\Models;

use App\Helpers\dbHelper;

// Work in progress, pls be kind

abstract class Model {

    public $connection;
    public $conditions = [];

    public function __construct()
    {
        $this->connection = new dbHelper();

        foreach ($this->columns as $value) {
            $this->$value = $value;
        }
    }

    public function where($item, $del="=", $value)
    {

        $this->conditions['lim-'.count($this->conditions)] = $item." ".$del." '".$value ."'";

        return $this;
    }

    public function orWhere($item, $del="=", $value)
    {
        $this->conditions['exp-'.count($this->conditions)] = $item." ".$del." '".$value ."'";
        return $this;
    }

    public function get()
    {
        $queryString = "";

        foreach ($this->conditions as $key => $value) {
            if(\str_contains($key, 'lim-'))
            {
                // limit
                if(\str_contains($key, '-0'))
                {
                    $queryString = "WHERE " . $queryString . $value;
                } else {
                    $queryString = $queryString . " AND " . $value;
                }
            }

            if(\str_contains($key, 'exp-'))
            {
                if(\str_contains($key, '-0'))
                {
                    $queryString = "WHERE " . $queryString . $value;
                } else {
                    $queryString = $queryString . " OR " . $value;
                }
            }

            if(\str_contains($key, 'order')){
                $order = explode('=', $value);
                $queryString = $queryString . " ORDER BY " . $order[0] . " " . $order[1]; 
            }

            if(\str_contains($key, 'limit')){
                $queryString = $queryString . " LIMIT " . $value;
            }
        }

        $results = $this->connection->read($this->table, '*', $queryString);

        if(count($results) < 1)
        {
            return null;
        }

        $models = [];

        foreach ($results as $key => $result) {
            $model = new (get_called_class());
            foreach($model->columns as $col)
            {
                $model->$col = $result[$col];
            }

            $models[] = $model;
        }
        
        return $models;
    }

    public function limit($limit)
    {
        $this->conditions['limit'] = $limit;
        return $this;
    }

    public function orderBy($column, $value)
    {
        $this->conditions['order'] = $column."=".$value;
        return $this;
    }

    public function find($id)
    {
        return $this->where('id', '=', $id)->get()[0];
    } 

    public function delete()
    {
        return $this->connection->delete($this->table, $this->id);
    }

    public function create($data=[])
    {
        $create = $this->connection->create($this->table, $this->columns, $data);

        if($create == true)
        {
            $model = new (get_called_class());
            $count = $this->connection->count($this->table);
            $model = $model->find($count);

            return $model;
        }

        return false;
    }

    public function edit($data=[])
    {
    
        $edit = $this->connection->update($this->table, $this->id, $data);
        
        if($edit == true)
        {
            return $this;
        }

        return false;
    }
            
}
