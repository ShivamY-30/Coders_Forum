<?php 
include '_loginmodal.php';
include '_signupmodal.php';
include '_dbconnect.php';
include '_navbar.php';


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coder's Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
    
<body>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  
        $Namee =strip_tags(  $_POST['name']);
        $Emaill = strip_tags( $_POST['mail']);
        $Concernn = strip_tags( $_POST['concern']);

   if(!empty($Namee)){

       $sql =  "INSERT INTO `user_concern` (`name`, `email`,  `concern` , `time`) VALUES ('$Namee' , ' $Emaill','$Concernn' ,current_timestamp())";
       $result = mysqli_query($conn , $sql);
   
   if($result){
       echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
       <strong>Query submitted</strong> Your Query submitted succesfully we will reach you on your email
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
       <strong>Error!</strong>  Some error occured!
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
    }
}

}


?>

<style>
    .container{
        min-height: 700px;
    }
</style>
  <!-- Form  -->
  <div class="container mt-4">
    <form action="/FORUMS/partials/contact.php" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Enter Your Name</label>
        <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" name="mail" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
     
      <div class="mb-3">
        <label for="floatingTextarea">Enter Your Concern</label>
        <textarea class="form-control" name="concern" placeholder="Leave your concern here"
          id="floatingTextarea"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>

<?php 
include '_footer.php';

  ?>