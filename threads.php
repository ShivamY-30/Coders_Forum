<?php 
include 'partials/_dbconnect.php';
include 'partials/_navbar.php';
include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';
$id = $_GET['th_id'];

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
<!-- Category details  -->
<?php
$id = $_GET['th_id'];
$sqll = "SELECT * FROM `threadlist` WHERE `thread_id` = '$id'";
$res = mysqli_query($conn , $sqll);
$row = mysqli_fetch_assoc($res);
$titlee = $row['thread_title'];
$descc = $row['thread_description'];
// To ckeck number of recorde present into the databse of $id 
$rowcount=mysqli_num_rows($res);
// echo $rowcount;

 echo '<div class="container my-3">
    
    <div class="jumbotron" style="background-color: rgb(244, 244, 244); border-radius: 8px; padding: 10px;" >
  <h3> Question Title-> '.$titlee.'</h3>
  <p class="lead"> <b>'.$descc.' </b></p>
  <hr class="my-4">

</div>
</div>';

?>

  <!-- all comments start here  -->
  <?php 
  // <!-- Taking input from the form  -->
  $method = $_SERVER["REQUEST_METHOD"];
  if ($method == 'POST') {
    $comment_description = $_POST['comment_desc'];
   
    $comment_description = str_replace("<", "&lt;", $comment_description);
    $comment_description = str_replace(">", "&gt;", $comment_description); 

      

    $sql = "INSERT INTO `answers` ( `comment_desc`, `thread_id`, `user_id`, `username`, `comment_date`) VALUES ( '$comment_description ', '$id', '0', '0',  current_timestamp())";
    $resulttt = mysqli_query($conn, $sql);
  }
  ?>
  <!-- horizontal line  -->
  <hr>

  <h2 class = "text-center">Discussions</h2>;
  <!-- Thread lsiting area starts here   -->

  <!-- form  -->  
  <?php  
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
 echo '<div class="container">
    <!-- <h3 class="text-center my-3">Type Your Comment On Above Mentioned Problem</h3> -->
    <!-- IMPORTANT STUFF IN BELOWSS LINE  -->
    <form action="'. $_SERVER["REQUEST_URI"].' " method="POST" onsubmit="return validateForm()" name = "thread">
      <div class="form-group">
        <label for="exampleFormControlTextarea1"><b>Your Comment On Above Mentioned Problem</b></label>
        <textarea maxlength="500" class="form-control" id="comment_desc" name="comment_desc" rows="5"></textarea>
      </div>
      <button type="submit" class="btn btn-success  my-2">Post Comment</button>
    </form>';
  }else{
    echo '<div class="container">
    <div class="jumbotron" style="background-color: rgb(223, 223, 223); border-radius: 8px; padding: 10px;">
        <h3 class = "text-center  ">!!!You are not logged-in, login to start the Discussion</h3>
    </div>
</div>';
  }
  ?>
  <script>
    function validateForm() {
  let x = document.forms["thread"]["comment_desc"].value;
  if (x == "") {
    alert("Comment section must be filled out");
    return false;
  }
}
</script>

  <?php
 
  $sqll = "SELECT * FROM `answers` WHERE `thread_id` = '$id'";
  $res = mysqli_query($conn, $sqll);
  // To ckeck number of recorde present into the databse of $id 
  $rowcount = mysqli_num_rows($res);
  // echo $rowcount;
  
  if ($rowcount > 0) {
    echo '<h2 class="text-center my-3">All Comments</h2>';


    while ($row = mysqli_fetch_assoc($res)) {
      $username = $row['username'];
      $comment_id = $row['comment_id'];
      $comment_desc = $row['comment_desc'];
      $comment_time = $row['comment_date'];
    

      echo '<div  class="container">
    <div class="media my-1" >
    <div class="container"  style="display: flex; flex-direction: row;">
      <img class="align-self-center mr-0 mx-0" src="img/user4.jpeg" width="40px" alt="Image not found">
      <p class="mx-2 my-2 fw-medium">Anonymous User at '. $comment_time.'</p>
    </div>
        <div class="media-body my-2 fw-medium">
          <p minlength= "1000">' . $comment_desc . '</p>
        </div>
      </div>
</div>';
    }
  } else {
    echo '<div style="min-height: 300px;" class="jumbotron jumbotron-fluid  my-4">
  <div class="container">
    <h3 class="text-center">Congrates You Are The First Here..</h3>
    <p class="lead"><b>Congrates You are the first coder to approach this question start the conversation with your answer. We as a community is here to help you with our all possible capabilities..</b></p>
  </div>
</div>';
  }

  ?>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>

 <?php 
include 'partials/_footer.php';
  ?> 
