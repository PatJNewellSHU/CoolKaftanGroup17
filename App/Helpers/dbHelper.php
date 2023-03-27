<?php

namespace App\Helpers;

// Info: Slowly integrating and adding to this file into the rest of the project, 
//       should make database interactions look sexy

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

    public function get($table, $columns="*", $query=null, $associate=false)
    {
        $prepare = "SELECT " . $columns . " FROM " . $table . " ";

        if($query != null)
        {
            $prepare = $prepare . $query;
        }

        return $this->query($prepare, $associate);
    }

    public function query($query, $associate)
    {
        $statement = $this->connection->prepare($query);

        if($statement == false)
        {
            return header("location: /500");;

            // var_dump($this->connection->error);
            // die();
        }

        $statement->execute();
           
        $results = $statement->get_result();

        if($associate == true)
        {
            $results = $results->fetch_assoc();
        } else {
            $results = $results->fetch_all();
        }

        $this->connection->close();

        return $results;
    }

    public function add($table, $columns=[], $values=[])
    {

        $prepare = "INSERT INTO " . $table . "(".implode(', ', $columns).") VALUES (" .implode(', ', $values).");";
        
        $statement = $this->connection->prepare($prepare);
        $statement->execute();

        return true;
    }

}