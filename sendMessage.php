<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "godaveplus";

    $con = mysqli_connect($hostname, $username, $password, $dbname);
    if(!$con){
        echo "Database connection error".mysqli_connect_error();
    }

    if(isset($_POST['first-name'])){
        $firstname = mysqli_escape_string($con, $_POST['first-name']);
        $lastname = mysqli_escape_string($con, $_POST['last-name']);
        $email = mysqli_escape_string($con, $_POST['email']);
        $phone = mysqli_escape_string($con, $_POST['phone']);
        $message = mysqli_escape_string($con, $_POST['message']);
        $msg_date = date('y-m-d'). ' at '.date('h:i:s');

        //insert
        $query = "INSERT INTO messages(firstname, lastname, email, phone, message, msg_date)
        VALUES('{$firstname}', '{$lastname}', '{$email}', '{$phone}', '{$message}', '{$msg_date}')";
        $insert = mysqli_query($con, $query);
        if($insert){
            //send message on live server
            echo 'success';
        }else{
            echo 'Sorry your message could not send. Try again later';
        }
    }
?>