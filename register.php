<!DOCTYPE html>
<html lang="en">
 
<?php
    // $sign_btn="btn";
    session_start();
    if(isset($_SESSION["logged-in"])){
        header("Location:profile.php");
    }
    $username="sign up";
    $login_btn="Login";
    if(isset($_SESSION["username"])){
        $username=$_SESSION["username"];
        $login_btn="Logout";
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $con=mysqli_connect("localhost","root","","users");
        
        if(!$con)
            echo ("failed to connect to database");
        $username1=$_POST['username'];
        $prefix="_";
        $username=$prefix.$username1;
        $password=$_POST['Password'];
        $repassword=$_POST['RePassword'];
        $email1=$_POST['Email'];
        $email=strval($email1);
        // echo $email;
       
        if($password!=$repassword){
            echo("<script>alert('password does not match')</script>");
            // echo $password.$repassword;
        }
        else{
            if(strlen($password)<8){
                echo(
    "<script>alert('password length must be atleast 8')</script>");
            }
            else{
                $query="insert into info(username,email,password)
                        values('$username','$email','$password')";
 
                $sql = "SELECT username, password FROM info";
                $result = $con->query($sql);
                $username_already_exist=false;
                $email_already_exist=false;
 
                // Checking already registered user exist
                if(($result->num_rows)> 0){
                    while($row = $result->fetch_assoc()) {
 
                        // echo "<br> id: " . $row["id"] .
                            " - username= " . $row["username"] .
                            " password= " . $row["password"] . "<br>";
 
                        if($row["username"]==$username){   
                            $username_already_exist=true;
                            break;
                        }
                        if($row["email"]==$email){   
                            $email_already_exist=true;
                            break;
                        }
                    }
                }
 
                // echo($ok);
                if($username_already_exist==false){
 
                    // This is my hosting mail
                    $otp = rand(100000,999999);
                    // Send OTP
                    require_once("mail_function.php");
                    $mail_status = sendOTP($email,$otp);
                    $_SESSION["username"]=$username;
                    $_SESSION["OTP"]=$otp;
                    $_SESSION["Email"]=$email;
                    $_SESSION["Password"]=$password;
                    header("Location:verify-otp.php");
                    
                }
                 else {
                    echo(
            "<script>alert('username  already taken')</script>");
                }
            }
        }
      
    }
?>
 
 
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
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
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <style>

    section { 
  background-image: url("./public/svg/Snow.svg");
  background-size: 1620px 800px;
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
      color: white ;
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
          <div class="card text-black m-4" style="border-radius: 30px">
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p
                    class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 text-white"
                  >
                    Sign up
                  </p>
                  <form class="mx-1 mx-md-4" action="register.php" method="POST">
                    
                    <div class="d-flex flex-row align-items-center mb-3">
                      <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <div class="form-field">
                          <input
                            type="text"
                            id="username"
                            name="username"
                            class="form-control"
                            placeholder="username"
                            required
                          />
                        </div>
                      </div>
                    </div>

                    

                    <div class="d-flex flex-row align-items-center mb-1">
                      <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <div class="form-field">
                          <input
                            type="email"
                            id="Email"
                            name="Email"
                            class="form-control"
                            placeholder="E-mail"
                            pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                            required
                            
                          />
                        </div>
                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-3">
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

                    <div class="d-flex flex-row align-items-center mb-3">
                      <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <div class="form-field">
                          <input
                            type="password"
                            id="RePassword"
                            name="RePassword"
                            class="form-control"
                            placeholder="Confirm Password"
                            required
                          />
                        </div>
                      </div>
                    </div>

                    <div
                      class="d-flex justify-content-center mx-4 mb-3 mb-lg-3"
                    >
                      <div class="form-item">
                        <button
                          type="submit"
                          class="waves-effect waves-light btn"
                          id="btn"
                          name="btn"
                        >
                          Sign Up
                          <i class="material-icons right">send</i>
                        </button>
                      </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                      <label class="form-check-label text-white" for="">
                    
                        <button type="button"
                               class="btn btn-warning btn-lg"
                               id="login-button">
                                 Already Registered
        </button>
                      </label>
                    </div>
                  </form>

                  <script>
        $("#login-button").click(function () {
            window.location.replace("login.php");
        });
    </script>
                </div>
                <div class="col-xl-7 d-flex align-items-center mb-4">
                  <img id="svg"
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