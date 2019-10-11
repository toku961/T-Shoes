<?php
require_once("Config.php");

class User extends Config{

    public function register($email,$fname,$lname,$address,$number,$password)
    {
        //encrypt the password
        $hash_password = md5($password);
        $sql = "INSERT INTO users(user_email,user_fname,user_lname,user_address,user_number,user_password)
                             VALUES('$email','$fname','$lname','$address','$number','$hash_password')";
        $result = $this->conn->query($sql);

        if($result === TRUE){
            header("Location:index.php");
        }
        else{
            echo $this->conn->error;
        }
    }

    public function login($email,$password)
    {
        $hash_password = md5($password);
        $sql = "SELECT * FROM users
                WHERE user_email = '$email'
                AND user_password = '$hash_password'";
        $result = $this->conn->query($sql);

        if($result->num_rows <= 0)
        {
            return "Invalid Username or Password";
        }
        else{
            //set the session value
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];

            if($row['user_role'] === 'admin'){
                header("Location:pages/index.php");
            }
            elseif($row['user_role'] === 'user'){
                header("Location:pages/index.php");
            }
        }
    }
    public function logout()
    {
        session_destroy();
        header("Location:login.php");
    }
}