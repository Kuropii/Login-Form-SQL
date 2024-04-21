<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){ 

    //for retrieving the data from index.html $username = $_POSTrusernamel; $password = $_POSTUpassword'il 
    $username = $_POST['username'];
    $password = $_POST['password'];


    //for database connection 
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "login";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error){
        die("Connection Failed: ". $conn->connection_error);
    }

    //write your sql query
    $query = "SELECT * FROM bruv WHERE username = '$username' AND password = '$password'";

    $result=$conn->query($query);

    if($result->num_rows==1){
        //display a page if connected successfully
        header("location: success.html");
        exit();
    }
    else{
        //display a page if connected failed
        header("location: fail.html");
        exit();
    }

    $conn->close();
}   
?>