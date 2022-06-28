<?php
   
    // Database connection
    include('connection.php');
    
    // Error & success messages
    global $success_msg, $email_exist, $emptyError1, $emptyError2, $emptyError3, $emptyError4, $emptyError5;
    
    if(isset($_POST["submit"])) {
        $firstname     = $_POST["firstname"];
        $lastname      = $_POST["lastname"];
        $email         = $_POST["email"];
        $mobile        = $_POST["mobile"];
        $password      = $_POST["password"];
        $password2     = $_POST["password2"];
        // verify if email exists
        $emailCheck = $connection->query( "SELECT * FROM users WHERE email = '{$email}' ");
        $rowCount = $emailCheck->fetchColumn();
        // PHP validation
        
        //check for input in all fields, if not filled in --> error message
        if(empty($firstname) ||  empty($lastname) || empty($email) || empty($mobile) || empty($password) || empty($password2)) {
            header("Location: reg.php?signup=empty");
        }   

        if(!empty($firstname) &&  !empty($lastname) && !empty($email) && !empty($mobile) && !empty($password) && !empty($password2)){
            

            // check if user email already exist --> error message
            if($rowCount > 0) {
                header("Location: reg.php?signup=email");

            // check for required password length --> error message
            } elseif(strlen($password)<5) {
                header("Location: reg.php?signup=password");
            
            //check for password matching --> error message
            } elseif ($_POST["password"] != $_POST["password2"]) {
                header("Location: reg.php?signup=matching");
            } else {
            // Password hash
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $sql = $connection->query("INSERT INTO users (firstname, lastname, email, mobile, password, date_time) 
            VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$mobile}', '{$password_hash}', now())");
            
                if(!$sql){
                    die("MySQL query failed!" . mysqli_error($connection));
                } else {
                    $success_msg = '<div class="alert alert-success">
                        User registered successfully!
                </div>';

                header("Location: regsuccess.php");
                }

                }
            }
        }      
        
    
?>