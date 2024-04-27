 <?php  
session_start();

echo '<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/FORUMS/">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/FORUMS/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="partials/contact.php">Contact Us</a>
        </li>
      </ul>';
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo '<P class = "text-light my-2" >Welcome: '. $_SESSION['email'].' </p>
        <a class="btn btn-success mx-4" href="_logout.php">Logout</a>';
      } 
      
      else{
      echo '<div>
        <button class="btn btn-primary mx-3 " data-bs-toggle="modal" data-bs-target="#signModal">SignUp</button>
        <button class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
      </div>';
    }
   echo '</div>
  </div>
  
</nav>';


if(isset($_GET['signup']) && $_GET['signup'] == "true" ){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Signup succesfull</strong> You had succesfully signed up..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

// passerror=Passwordsdonotmatch
elseif(isset($_GET['passerror']) && $_GET['passerror'] == "Passwordsdonotmatch" ){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Signup unsuccesfull</strong> Creadentials are invalid!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

// error=Accountalreadyexists
elseif(isset($_GET['error']) && $_GET['error'] == "Accountalreadyexists" ){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Signup unsuccesfull</strong>  Account with this email already exists try with another email!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


// // if(isset($_GET['login']) && $_GET['login'] == "loginup" ){
// //   echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
// //   <strong>Login succesfull</strong> You are logged in!
// //   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// // </div>';
// }





?>