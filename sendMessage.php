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
            $to = 'info@godaveplus.com';
                    
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            $headers .= "From: Possible client <".$email."> " . "\r\n" .
            "Reply-To: ".$email."" . "\r\n" .
            "X-Mailer: PHP/" . phpversion();
            
            $subject = "Godave Plus Company LTD. ";
            
            
            $messageSend = " 
                <html>
                    <body>
                        <h4> Message from Godave plus website </h4> <br>
                        Full Name:  ".$firstname. ' '. $lastname."<br>
                        Email: ".$email."<br>
                        Phone : ".$phone." <br> <br><br>
                        <h4> Message</h4> <br>
                        ".$message."
                    </body>
                </html> 
            "; 

            mail ($to, $subject, $messageSend, $headers);
        }else{
            echo 'Sorry your message could not send. Try again later';
        }
    }
?>