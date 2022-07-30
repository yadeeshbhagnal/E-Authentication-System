<!DOCTYPE html>
<html lang="en">
    <?php
        $conn = mysqli_connect("localhost","root","","users");
        session_start();
     
        // Retrieving otp with session variable
        $otp=$_SESSION["OTP"];
        // echo $otp;
    ?>
 
 <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verification</title>
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
    <style>

section { 
background-image: url("./public/svg/Color1.svg");
background-size: 1620px 800px;
}
.card {
background-image: url("./public/svg/Colored.svg");
opacity: 100% ;
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
          <div class="card text-black m-5" style="border-radius: 30px">
            <div class="card-body m-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p
                    class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 text-white"
                  >
                    Verification
                  </p>
                  <form class="mx-1 mx-md-4" >
            
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa fa-key"></i>
                      <div class="form-outline flex-fill mb-0">
                        <div class="form-field">
                          <input
                            type="text"
                            id="OTP"
                            name="otp"
                            class="form-control"
                            placeholder="Enter OTP"
                            required
                          />
                          <small
                            >OTP has been sent to your registered Email.<br /></small
                          >
                        </div>
                      </div>
                    </div>
                    <div
                      class="d-flex justify-content-center mx-4 mb-3 mb-lg-4"
                    >
                      <div class="form-item">
                        <button
                          type="button"
                          class="waves-effect waves-light btn" id="verify-otp">
                          Verify OTP
                        </button>
                        <button type="button" class="btn btn-primary btn-lg" id="resend-otp">
                        Resend otp</button>
                      </div>
                    </div>
                  </form>
    <script>
        $("#resend-otp").click(function () {
            window.location.replace("temp.php");
        });
        $("#verify-otp").click(function () {
 
            // window.location.replace("index.php");
            var otp1 = document.getElementById("OTP").value;
 
            // alert(otp1);
            var otp2 = ("<?php echo($otp)?>");
             
            // alert(otp2);
            if (otp1 == otp2) {
                <?php
                 $con=mysqli_connect("localhost","root","","users");
                    $username=$_SESSION["username"];
                    $email=$_SESSION["Email"];
                    $password=$_SESSION["Password"];
                 $query="insert into info(username,email,password)
                        values('$username','$email','$password')";
                 $result=mysqli_query($conn,$query);
                 ?>
                window.location.replace("profile.php");

            }
            else {
                alert("otp does not match")
            }
        });
    </script>
</body>
 
</html>