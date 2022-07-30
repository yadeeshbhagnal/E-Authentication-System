<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
$con=mysqli_connect("localhost","root","","users");
$email=$_POST['Email'];
$password=$_POST['Password'];
$sql = "SELECT email, password FROM info";
$result = $con->query($sql);
$password_already_exist=false;
$email_already_exist=false;
if(($result->num_rows)> 0){
    while($row = $result->fetch_assoc()) {
        if($row["email"]==$email && $row["password"]==$password)
        {
            $password_already_exist=true;
            $email_already_exist=true;
            break;
        }
    }
}
if($password_already_exist==false)
{
	
	echo("<script>alert('Incorrect password or email')</script>");
}

else
{
	$_SESSION["email"]=$email;
	
	header("Location:temp.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.15.4/js/solid.js"
      integrity="sha384-/BxOvRagtVDn9dJ+JGCtcofNXgQO/CCCVKdMfL115s3gOgQxWaX/tSq5V8dRgsbc"
      crossorigin="anonymous"
    ></script>

    <style>
   section { 
   background-image: url("./public/svg/Snow.svg");
   background-size: 1520px 850px;
   }
  .card {
    background-image: url("./public/svg/Color1.svg");
    opacity: 88% ;
    background-size: 1240px 800px;
  }
  i {
    color: white;
  }
  .form-field {
    margin: 14px;
  }
  .form-field input::placeholder {
      color: white;
  }
  .form-field input[type=text], .form-field input[type=password], .form-field input[type=email] {
        color: white;
  }
  .form-item button {
    background-color: #000f1e;
    text-transform: unset !important;
  } 
  .form-item button:hover {
    background-color: #185EA5;
    color: white;
  }
  .fa{
    font-size:24px;
  }
  small{
    color: white
  }
  .material-icons.md-48 { font-size: 10rem; }
    </style>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
  </head>
  <body>
    <section class="vh-100">
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="card text-black m-5" style="border-radius: 30px">
            <div class="card-body m-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p
                    class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 text-white"
                  >
                    Login
                  </p>
                  <form class="mx-1 mx-md-4" action="login.php" method="POST">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <div class="form-field">
                          <input
                            type="email"
                            id="Email"
                            name="Email"
                            class="form-control validate"
                            placeholder="Your Email"
                            pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                            required
                          />
                         
                        </div>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <div class="form-field">
                          <input
                            type="password"
                            id="Password"
                            name="Password"
                            class="form-control"
                            placeholder="Password"
                            required
                          />
                        </div>
                      </div>
                    </div>

                    <div
                      class="d-flex justify-content-center mx-4 mb-3 mb-lg-4"
                    >
                      <div class="form-item">
                        <button
                          type="submit"
                          class="waves-effect waves-light btn"
                        >
                          Login
                          <i class="material-icons right">send</i>
                        </button>
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-check-label text-white">
                          
                          <button type="button"
            class="btn btn-warning btn-lg"
            id="login-button">
            Not Registered
        </button>
                        </label>
                      </div>
                    </div>
                  </form>
                  <script>
        $("#login-button").click(function () {
            window.location.replace("register.php");
        });
    </script>
                </div>
                <div class="col-xl-7 d-flex align-items-center mb-4">
                  <img
                    src="./public/svg/log-in-girl.svg"
                    alt="Sample image"
                    width="80%"
                    height="80%"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>