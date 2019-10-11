<?php
require_once("Config.php");

class Category extends Config{

    public function save($name)
    {
        $sql = "INSERT INTO categories(category_name)
                VALUES('$name')";
        $result = $this->conn->query($sql);

        if($result === TRUE)
        {
            $_SESSION['message'] = "teacher added successfully";
            header("Location:categories.php");
        }
        else{
            echo $this->conn->error;
        }
    }
    public function getCategory()
    {
        $sql = "SELECT * FROM categories";
        $result = $this->conn->query($sql);

        if($result->num_rows <= 0){
            return false;
        }else{
            $rows = array();

            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }

            return $rows;
        }
    }
    }