<?php
include("../connection/connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Verify Email | MyShop</title>
  
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
  </style>
</head>
<body>

<div class="container d-flex align-items-center justify-content-center h-100">
  <div class="col-md-6 col-lg-4">
    <div class="login-container">
      <h3 class="text-center mb-4">Verify Email </h3>

      <!-- ✅ Login Form -->
      <form  method="POST">
        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
          </div>
        </div>

        <!-- Password -->
        <div class="mb-3">
          <label for="password" class="form-label">Otp</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-mobile-retro"></i></span>
            <input type="text" name="otp" class="form-control" id="password" placeholder="Enter your Otp" required>
          </div>
        </div>

        <!-- Remember me & forgot password -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="remember" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
          <a href="forgetpassword.php">Forgot password?</a>
        </div>

        <!-- Submit Button -->
        <div class="d-grid">
          <button type="submit" name="verifyBtn" class="btn btn-primary">Verify</button>
        </div>

        <!-- Register Link -->
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

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if(isset($_POST['verifyBtn'])){
     $mail = $_POST["email"];
    $user_otp = $_POST["otp"]; 
    $Check_email = mysqli_query($con, "SELECT * FROM tbl_user WHERE email = '$mail'");
    
   if(mysqli_num_rows($Check_email) == 1){
        $user_data = mysqli_fetch_assoc($Check_email);
        if ($user_data['is_verify'] == 1) {
          
            echo "<script>alert('This email is already verified!')</script>";
        }
        else {
         if ($user_data['otp'] == $user_otp) {
                $query = "UPDATE `tbl_user` SET `is_verify`='1', `otp`= NULL WHERE `email`='$mail'";
                $res = mysqli_query($con, $query);
            if ($res) {
                    echo "<script>alert('Verification successful! You can now log in.')</script>";
                    echo  "
                    <script>window.location.href = '../Auth/login.php';</script>
                    "; 
                 
                } else {
                    echo "<script>alert('Database error during verification update.')</script>";
                }
            
            } else {
            
                echo "<script>alert('Invalid OTP. Please check the code and try again.')</script>";
            }
        }
    }
    else {
        
        echo "<script>alert('The email address provided is not registered!')</script>";    
    }
}


?>