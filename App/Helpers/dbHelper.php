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


    public function query($query, $associate, $params, $columns, $table, $values)
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
        } 
        else
        {
            $results = $results->fetch_all(MYSQLI_ASSOC);
        }

        $this->connection->close();

        return $results;
    }

    public function create($table, $columns=[], $values=[])
    {

        $prepare = "INSERT INTO " . $table . "('".implode("','", $columns)."') VALUES ('" .implode("','", $values).");";
        //^ Cant test til database is finished but I think this should prevent having to add quotations around each variable beforehand? 
        
        $statement = $this->connection->prepare($prepare);
        $statement->execute();

        return true;
    }

    public function read($table, $columns="*", $query=null, $associate=false)
    {
        $prepare = "SELECT ? FROM ?"; 
        //^ removed quotes at the end as I dont think they are needed?

        $params = "ss";

        if($query != null)
        {
            $prepare = $prepare . $query;
        }

        return $this->query($prepare, $associate);
    }

    public function update($table, $columns = [], $values = []) {

    }

    public function delete($table, $columns = [], $values = [])
    {

        $prepare = "DELETE FROM ? WHERE";
        $params = array();
        for($i = 0; $i < count($columns); $i++) //Should go through as many columns are in the array columns and add to the sql statement
        {
            if($i = 0) //This seems like a bad way to check if were on the first run of the for loop but idk how else to do it in php
            {
                $prepare .= " ? = ?";
            }
            else
            {
                $prepare .= " AND ? = ?";
            }
            
            $params[] = $columns[$i];
            $params[] = $values[$i];
        }  

        $statement = $this->connection->prepare($prepare);
        $types = str_repeat("s", count($columns)); //creates the variable types - kind of temp as it wont work with numbers but idk how the database looks yet
        $statement -> bind_param($types, $table, ...$params); //SHOULD go through and attatch a variable to each ? in statement. 
        $statement->execute();

        return true;
    }
    /*
    Tried just taking each string out of the array rather than imploding as I wanted to use "AND" in a delete statement, but not actually removing from the database.
    push#2
    */

    
}