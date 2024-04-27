<?php
include '_dbconnect.php';
$showError = "false";
$exists = false;
$succ = false;
$fail = false;
// $a = 0;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password= $_POST['password'];
    $cpassword= $_POST['cpassword'];
 
 // Checking the validity of email that a user do not have more than one account for same email
   $sql = "SELECT * FROM `user_info` WHERE `email` = '$email'";
   $res  = mysqli_query($conn , $sql);
   $row = mysqli_num_rows($res);
   if($row>0){
    $showerror = "Account already exists";
    header("location:/FORUMS/index.php?error=Accountalreadyexists");
  
    }
    else{
        // Unique email of each users
       if(($password == $cpassword)){
           $hash = password_hash($password , PASSWORD_DEFAULT);
             $sql = "INSERT INTO `user_info` ( `username`, `email`, `password`, `user_date`) VALUES ('$username ', '$email', '$hash', current_timestamp())";
             $result = mysqli_query($conn , $sql);
             if($result){
                $showAlert = true;
                header("location:/FORUMS/index.php?signup=true");
               exit();
             }
       }
       else{
        $showpassError = "Passwords do not match";
        header("location:/FORUMS/index.php?passerror=Passwordsdonotmatch");
       }
    }
}  


?>