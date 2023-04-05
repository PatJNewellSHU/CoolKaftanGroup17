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
        $this->conditions[] = $item." ".$del." '".$value ."'";
        return $this;
    }

    public function get()
    {
        $queryString = "";
        foreach ($this->conditions as $key => $value) {
            if($key == 0)
            {
                $queryString = "WHERE " . $queryString . $value;
            } else {
                $queryString = $queryString . " AND " . $value;
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

    public function find($id)
    {
        return $this->where('id', '=', $id)->get()[0];
    } 

    public function delete()
    {
        // ... TODO
    }

    public function create($data)
    {
        // ... TODO
    }

    public function edit($data)
    {
        // ... TODO
    }
            
}