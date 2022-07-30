<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
?>
 
 <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>

section { 
background-image: url("./public/svg/Color1.svg");
background-size: 1620px 800px;
}
.card {
background-image: url("./public/svg/Colored.svg");
opacity: 100% ;
background-size: 800px 500px;
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
                    Greetings <br>
                    <h4 style = "color:white;" >E- Authentication done successfully!!</h4>
                  </p>  

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>
 
</html>