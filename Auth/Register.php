<?php
include("../connection/connection.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | MyShop</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  
  <style>

      body {
      background:url('../Website/img/bg-img/3.jpg');
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
    }
  
    .login-container {
      background-color: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    #error{
        display: none;
    }
  </style>
</head>
<body>

<div class="container d-flex align-items-center justify-content-center h-100">
  <div class="col-md-6 col-lg-4">
    <div class="login-container">
      <h3 class="text-center mb-4">Create an account</h3>


      <form  method="POST">
    
        <div class="mb-3">
          <label for="email" class="form-label">Name </label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" name="name" class="form-control" id="email" placeholder="Enter your name" required>
          </div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
          </div>
        </div>
        <p class="text-danger" id="error" >This email is already registered!</p>
      
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
          </div>
        </div>

     
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="remember" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
          <a href="forgetpassword.php">Forgot password?</a>
        </div>

   
        <div class="d-grid">
          <button type="submit" name="register_btn" class="btn btn-primary">register</button>
        </div>

    
        <p class="text-center mt-3">Don't have an account?
          <a href="register.php" class="text-decoration-none text-primary fw-bold">Register</a>
        </p>
        <p class="text-center mt-3">old user?
          <a href="login.php" class="text-decoration-none text-primary fw-bold">weclome back</a>
        </p>
      </form>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


if(isset($_POST['register_btn'])){
$username=$_POST["name"];
$useremail=$_POST["email"];
$user_pass=$_POST["password"];
$eamilExisit="SELECT * FROM tbl_user WHERE email = '$useremail'";
$checkQuery=mysqli_query($con,$eamilExisit );
if( mysqli_num_rows($checkQuery) == 1){
    echo "<script>
    document.getElementById('error').style.display = 'initial';
 </script>";
 
  }
  else{
    // for the random numbers

    $otp = rand(100000, 999999);

    $encrpt_pass=password_hash($user_pass,PASSWORD_DEFAULT);
   $query=" INSERT INTO `tbl_user`( `name`, `email`, `password`, `status`, `is_admin`, `otp`, `is_verify`) VALUES ('$username','$useremail','$encrpt_pass',1,0,'$otp',0)";
   try {
   
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mahnnooranwar191@gmail.com';                     //SMTP username
    $mail->Password   = 'wadewlzuqnvniqly';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($useremail, 'Email Verification');
    $mail->addAddress($useremail, "ecom");     //Add a recipient
  

  
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification';
    $mail->Body    = " There is account created with $useremail and otp is $otp";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $result=mysqli_query($con,$query);
   if($result){
    echo  "<script>
    alert('The account is created now please verify your email ');
  </script>"; 
  echo  "
<script>window.location.href = '../Auth/Verify_email.php';</script>
"; 
   }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

 


  }



}

?>