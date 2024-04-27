<?php 
include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';
include 'partials/_dbconnect.php';
include 'partials/_navbar.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <link rel="shortcut icon" type="x-icon" href="img/icno.jpeg"> -->
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coder's Forum</title>
    <link rel="icon" type="image/x-icon" href="icno.jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
</head>
<style>
    /* .container{
         display: flex;
         flex-direction: row;
         flex-wrap: wrap;
    } */
 </style>
<body>

<?php


    echo '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img\slide-1.jpeg" class="d-block w-100" alt="Image not found">
      </div>
      <div class="carousel-item">
        <img src="img\slider-2.jpeg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img\slider-3.jpeg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>';
  ?>
<div class="container my-4" style = "display:flex">
<div class="card bg-light mb-3" style="width: 100%;">
  <div class="card-header text-center">Coder's Forum</div>
  <div class="card-body">
    <h5 class="card-title text-center">What are we??</h5>
    <p class="card-text text-center">We provide a platform to all the coders to ask and answer and discuss the coding related question to improve their and other knowledge! So login now to start the discussion!!</p>
  </div>
</div>
</div>

<div class="container my-3">
    <h1 class = "text-center my-3">Lets Discuss</h1>
    <div class="row my-3">
 <?php
  $sqll = "SELECT * FROM `categories`";
  $res = mysqli_query($conn , $sqll);
  while($row = mysqli_fetch_assoc($res)){
    $id = $row['category_id'];
    $title = $row['category_title'];   
    $desc = $row['category_description'];
    echo '<div class=" col-md-4 my-3">
    <div class="card" style="width: 20rem;">
    <img src="img/lg.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
         <h4><a href="threadlist.php?catid='.$id.'">'. $title .'</a></h4>
         <p class="card-text">' .substr($desc , 0 , 100 ).'....</p>
         <a class="btn btn-success" href="threadlist.php?catid='.$id.'">Ask Questions</a>
        </div> 
      
     </div> 
    </div>';
  };
  ?>

</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>



 <?php 
include 'partials/_footer.php';

  ?>