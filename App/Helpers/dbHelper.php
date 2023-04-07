<?php

namespace App\Helpers;
class dbHelper {

    function __construct()
    {
        $this->server = "sp2023.mysql.database.azure.com";
        $this->database = "group17";
        $this->username = "Group17";
        $this->password = "Gr0Up17_Sp";
        $this->port = 3306;

        $this->connection = new \mysqli($this->server, $this->username, $this->password, $this->database, $this->port);
    }

    public function query($query, $associate)
    {
        $statement = $this->connection->prepare($query);

        if($statement == false)
        {
            return header("location: /500");
            // Or...
            // print_r(debug_backtrace());
            // var_dump($query);
            // var_dump($this->connection->error);
            // die();
        }

        $statement->execute();
           
        $results = $statement->get_result();

        if($associate == true)
        {
            $results = $results->fetch_assoc();
        } 
        else
        {
            $results = $results->fetch_all(MYSQLI_ASSOC);
        }

        return $results;
    }

    //If these dont work i sincerely apologise - I'll rewrite them again back to how they used to be 
    public function create($table, $columns=[], $values=[])
    {
        // Inject id/created_at/updated_at into values string
        $values['id'] = $this->count($table)+1;
        $values['updated_at'] = date("Y-m-d H:i:s");
        $values['created_at'] = date("Y-m-d H:i:s");

        // Prepare columns and values string
        $_columns = "";
        $_values = "";
        foreach($columns as $v=>$col)
        {
            if(count($columns) == $v+1)
            {
                $_columns = $_columns . "`".$col."`";
                $_values = $_values . "'".$values[$col]."'";
            } else {
                $_columns = $_columns . "`".$col."`,";
                $_values = $_values . "'".$values[$col]."',";
            }
        }
        
        $prepare = "INSERT INTO " . $table . " (" . $_columns . ") VALUES (" . $_values . ");";
        $statement = $this->connection->prepare($prepare);

        if($statement == false)
        {
            return header("location: /500");;

            // var_dump($this->connection->error);
            // die();
        }

        $statement->execute();
        
        return true;
    }

    public function read($table, $columns="*", $query=null, $associate=false)
    {
        $prepare = "SELECT " . $columns . " FROM " . $table; 

        if($query != null)
        {
            $prepare = $prepare . " " . $query;
        }

        $query = $this->query($prepare, $associate);
        $this->connection->close();

        return $query;
    }

    public function count($table, $column = "id")
    {
        $prepare = "SELECT COUNT(" . $column . ") FROM " . $table;
        $query = $this->query($prepare, true);
        $query = $query['COUNT('.$column.')'];
    
        return $query;
    }

    public function update($table, $id, $values = []) {

        $statement = "UPDATE " . $table . " SET ";
        $values['updated_at'] = date("Y-m-d H:i:s");
        foreach ($values as $v => $val) {
            $i = array_search($v, array_keys($values));

            if(count($values) == $i+1)
            {
                $statement = $statement . $v . " = '" . $val . "'";
            } else {
                $statement = $statement . $v . " = '" . $val . "', ";
            }
        }
        $prepare = $statement . " WHERE id = " . $id;
        
        $statement = $this->connection->prepare($prepare);

        if($statement == false)
        {
            return header("location: /500");;

            // var_dump($this->connection->error);
            // die();
        }

        $statement->execute();
        $this->connection->close();

        return true;
    }

    public function delete($table, $id)
    {
        $prepare = "DELETE FROM " . $table . " WHERE id = '" . $id . "'";
        $statement = $this->connection->prepare($prepare);

        if($statement == false)
        {
            return header("location: /500");;

            // var_dump($this->connection->error);
            // die();
        }
        
        $statement->execute();
        $this->connection->close();

        return true;
    }
    
}