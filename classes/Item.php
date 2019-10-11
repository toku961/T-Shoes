<?php
require_once("Config.php");

class Item extends Config{

    public function save($name,$detail,$quantity,$price)
    {
        $sql = "INSERT INTO Items(item_name,item_details,item_quantity,item_price)
                VALUES('$name','$detail','$quantity','$price')";
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
    public function getItem()
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