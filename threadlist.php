<?php
include 'partials/_dbconnect.php';
include 'partials/_navbar.php';
include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';

?>

<?php
$id = $_GET['catid'];

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
  $id = $_GET['catid'];
  $sql = "SELECT * FROM `categories` WHERE `category_id` = '$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $title = $row['category_title'];
  $desc = $row['category_description'];


  echo '<div class="container" >
    <h1 class ="text-center my-3">Welcome</h1>
    <div class="jumbotron" style="background-color: rgb(223, 223, 223); border-radius: 8px; padding: 10px;" >
  <h2>' . $title . '</h2>
  <p class="lead">' . $desc . '</p>
  <hr class="my-4">
  <p> <h4>Forum Rules</h4>
  Be respectful, even when there\'s a disagreement. <br>
    No foul language or discriminatory comments.<br>
    No spam or self-promotion.<br>
    No links to external websites or companies.<br>
    No NSFW (not safe for work) content.</p>

</div>
</div>';

  ?>
    <!-- horizontal line  -->
    <hr>
    <!-- form  -->
    <?php  
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

  echo '<div class="container">
    <h3 class="text-center my-3">Ask Your Question Here!</h3>
    <!-- IMPORTANT STUFF IN BELOWSS LINE  -->
    <form action="'. $_SERVER["REQUEST_URI"].' " method="POST" id="bookingForm">
    <div class="form-group">
        <label for="exampleFormControlInput1">Question Title</label>
        <input type="text" class="form-control" id="title" name="ques_title"
            placeholder="Your title should be short and simple">
    </div>
    <div class="form-group my-2">
        <label for="exampleFormControlTextarea1">Elaborate Your Concern</label>
        <textarea class="form-control" id="ques_description" name="ques_description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    </form>

    </div>';
    }else{
    echo '<div class="container">
        <div class="jumbotron" style="background-color: rgb(223, 223, 223); border-radius: 8px; padding: 10px;">
            <h3 class = "text-center  ">!!!You are not logged-in, login to ask Questions</h3>
        </div>
    </div>';
    }
    ?>
    <script>
    // get the form
    const form = document.getElementById("bookingForm");

    // get the form controls
    let x = form.elements;

    // Convert the list of form controls to an array and set the required attribute to each control
    Array.from(x).forEach(e => {
        e.setAttribute("required", "");
    })
    </script>
    <?php
  $method = $_SERVER["REQUEST_METHOD"];
  if ($method == 'POST') {
    $titleee = $_POST['ques_title'];
    $desccc = $_POST['ques_description']; 
 
    $titleee = str_replace("<", "&lt;", $titleee);
    $titleee = str_replace(">", "&gt;", $titleee);  

    $desccc = str_replace("<", "&lt;", $desccc );
    $desccc = str_replace(">", "&gt;", $desccc );  

    $sql = "INSERT INTO `threadlist` (  `thread_cat_id`, `thread_title`, `thread_description`, `date`) VALUES ( '$id', '$titleee ', '$desccc', current_timestamp())";
    $resulttt = mysqli_query($conn, $sql);
    if (isset($_POST['submit'])) {
      echo "<meta http-equiv='refresh' content='0'";
    }
  }
  ?>
    <!-- horizontal line  -->
    <hr>

    <!-- Thread lsiting area starts here   -->
    <?php
  // $id = $_GET['catid'];
  $sqll = "SELECT * FROM `threadlist` WHERE `thread_cat_id` = '$id'";
  $res = mysqli_query($conn, $sqll);
  // To ckeck number of recorde present into the databse of $id 
  $rowcount = mysqli_num_rows($res);
  // echo $rowcount;
  

  if ($rowcount > 0) {
    echo '<h2 class="text-center my-3">Asked Questions</h2>';


    while ($row = mysqli_fetch_assoc($res)) {
      // $thread_title = $row['thread_title'];
      $thread_id = $row['thread_id'];
      $thread_title = $row['thread_title'];
      $thread_desc = $row['thread_description'];
      $thread_time = $row['date'];
     
      
      echo '<div  class="container">
          <div class="media my-1">
              <div class="container"  style="display: flex; flex-direction: row;">
                <img class="align-self-center mr-3" src="img/user4.jpeg" width="40px" alt="Image not found">
                <p class="mx-3 my-1 fw-medium"> Anonymous User at '. $thread_time.'</p>
              </div>
        <div class="media-body my-2">
          <h5><a href="threads.php?th_id=' . $thread_id . '">' . $thread_title . '</a></h5  >
          <p>' . $thread_desc . '</p>
         
        </div>
      </div>
</div>';
    }
  } else {
    echo '<div style="min-height: 300px;" class="jumbotron jumbotron-fluid  my-4">
  <div class="container">
    <h3 class="text-center">Congrates You Are The First Here..</h3>
    <p class="lead"><b>Congrates You are the first coder to approach here start the conversation with your Query.. We as a community is here to help you with our all possible capabilities..</b></p>
  </div>
</div>';
  }

  ?>
    <!-- if any problem occurs then i have to uncomment this below div  -->
    <!-- </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>



<?php
include 'partials/_footer.php';
?>