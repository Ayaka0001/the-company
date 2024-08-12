<?php

require "Database.php";

class User extends Database{ //can access the protected variables in the Database class.which means is can access the constructor method

    //save a user to the database
   
    public function createUser($request){
    //$request is an array. $request = $first_name, $last_name, $username, $password = $_POST ($_POST is an array of the input value)
        $password = password_hash($request['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (first_name, last_name, username, `password`) 
                VALUES ('".$request['first_name']."','".$request['last_name']."','".$request['username']."','".$password."')";

        if($this->conn -> query($sql)){
            header("location: ../views"); //go to views/index.php
            exit;
        }else{
            die("Error creating the user: " . $this->conn -> error);
        }
    }

    public function login($request){
        //$request will accept the data from the form as an array

        $sql = "SELECT * FROM users WHERE username = '".$request['username']."'";

        $result = $this->conn -> query($sql);

        if($result -> num_rows == 1){ //check if username is found
            //from here down, it is for checking password
            $user = $result -> fetch_assoc(); //get the 1row from sql results as an associative array
            
            if(password_verify($request['password'], $user['password'])){ //check if the password typed in the input matches the password in the database
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['full_name'] = $user['first_name']." ".$user['last_name'];

                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Password is incorrect.");
            }
        }else{
            die("User name not found.");
        }
    }

    //get all users
    public function getAllUsers(){
        $sql = "SELECT * FROM users";
        if($result = $this->conn -> query($sql)){
            return $result;
        }else{
            die("Error returning all users: " . $this->conn -> error);
        }
    }

    //get/find data of a single user
    public function findUser($id){
        $sql = "SELECT * FROM users WHERE id = $id";
        
        if($result = $this->conn -> query($sql)){
            return $result -> fetch_assoc(); //get the 1row from sql results as an associative array
        }else{
            die("Error finding user: " . $this->conn -> error);
        }
    }

    //update user
    public function updateUser($request){
        $sql = "UPDATE users 
                SET first_name = '".$request['first_name']."',
                    last_name = '".$request['last_name']."',
                    username = '".$request['username']."'
                WHERE id = ".$request['id'];

        if($this->conn -> query($sql)){ //successfull update
            //if updated uaer is logged-in user,update the session variable
            session_start();
            if($request['id'] == $_SESSION['id']){
                $_SESSION['username'] = $user['username'];
                $_SESSION['full_name'] = $request['first_name'] . " " . $request['last_name'];    
            } 
            //go to dashboard page
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error updating user: " . $this->conn -> error);
        }
    }

    //delete user
    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE id = $id";
        
        if($this->conn -> query($sql)){
            //success, fo to dashboard
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error deleting user: " . $this->conn -> error);
        }
    }
    
    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        //go to login page
        header("location: ../views");
        exit;
    }

    //upload photo
    public function uploadPhoto($request, $files){
        session_start();
        $id = $_SESSION['id'];
        $file_name = $files['photo']['name'];
        $tmp_name = $files['photo']['tmp_name'];
        
        $sql = "UPDATE users SET photo = '$file_name' WHERE id = $id";
        //updates the photo column in the users table

        if($this->conn -> query($sql)){
            //if updating the photo to the user table is successful
            $destination = "../assets/images/photos/$file_name";
            //move the file to the temporary folder in the photos folder

            if(move_uploaded_file($tmp_name, $destination)){
                //if the file is successfully uploaded to the photos folder, go to profile page
                header("location: ../views/profile.php");
                exit;
            }else{
                die("Error moving photo.");
            }
        }else{
            die("Error updating photo: " . $this->conn -> error);
        }
    }


}
?>