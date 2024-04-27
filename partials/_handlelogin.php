<?php
include '_dbconnect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $email = $_POST['loginemail'];
   $pass = $_POST['loginpassword'];
  

   $sql = "SELECT * FROM `user_info` WHERE `email` = '$email'";
   $result = mysqli_query($conn , $sql);
   $numRows = mysqli_num_rows($result);
   if($numRows = 1){
     $row = mysqli_fetch_assoc($result);
     if(password_verify($pass , $row['password'])){
        session_start();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['email'] = $email;
        echo "logged in";
        header("location:/FORUMS/index.php");
     }
     else{
        echo "unable to login";
     }
   }

}

?>