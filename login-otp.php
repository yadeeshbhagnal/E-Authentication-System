<?php
 $password=$_POST['Password'];
 $email=$_POST['Email'];
$con=mysqli_connect("localhost","root","","users");
if(!$con)
    echo ("failed to connect to database");
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
if($password_already_exist==true)
{
	header("Location: login-otp.php");
}
else
{
    ?>
    <script>
        
    </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <input type="text" class="otp2" name="otp2">one time password for login<br>
        <button onclick="validate()">submit</button>

    </form>
    <script>
        function validate()
        {
            <?php
            $otp = rand(100000,999999);
            // Send OTP
            require_once("mail_function.php");
            $mail_status = sendOTP($email,$otp);
            ?>
            var otp2=("<?php echo($otp)?>");
            console.log(otp2);
           var otp1=document.getElementById("otp2").value;
           console.log(otp1);
           if(otp1 == otp2)
           {
            alert("logged in succesfully");
            window.location.replace("profile.php");
           }
           else
           {
            alert("wrong otp");
           }

        }
    </script>
</body>
</html>