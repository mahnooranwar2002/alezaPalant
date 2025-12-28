<?php
include("../connection/connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | MyShop</title>
  
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
      <h3 class="text-center mb-4">Welcome Back 👋</h3>

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
          <label for="password" class="form-label">Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
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
          <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
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

// if(isset($_POST['login_btn'])){
//   $userEmail=$_POST["email"];
//   $password=$_POST["password"];
//   $Query="SELECT * from tbl_user where email= '$userEmail'";
//   $userRecord=mysqli_query($con,$Query);
//    if(mysqli_num_rows($userRecord)==1){
//     $loginedData = mysqli_fetch_assoc($userRecord);
//     $check_password = password_verify($password,$loginedData["password"]);
// // $_SESSION["userLogined"]=$loginedData['user_id'];
// if($check_password){
// if($loginedData['status'] == 1){
// if($loginedData['is_admin'] == 1){
//      $_SESSION["adminLogined"] = $loginedData['user_id'];
//    echo "<script>
//     window.location.href = '../Adminpanel/index.php';
// </script>";
// }
// else{
//      $_SESSION["userLogined"] = $loginedData['user_id'];
//    echo "<script>
//     window.location.href = '../Website/index.php';
// </script>";
// }
// }
// }else{
//   echo  "<script>
//   alert('your account is deactivate by admin');
// </script>"; 
// }

//    }else{
//     echo  "<script>
//     alert('email or password  is invalid');
//   </script>"; 
//    }

// }

if (isset($_POST['login_btn'])) {
    $userEmail = $_POST["email"];
    $password = $_POST["password"];

    // Query user by email
    $query = "SELECT * FROM tbl_user WHERE email = '$userEmail'";
    $userRecord = mysqli_query($con, $query);

    if (mysqli_num_rows($userRecord) == 1) {
        $loginedData = mysqli_fetch_assoc($userRecord);

        // ✅ Check password (using hash)
        $check_password = password_verify($password, $loginedData["password"]);

        if ($check_password) {
            // ✅ Check if account is active
            if ($loginedData['status'] == 1) {

              if($loginedData['is_verify'] == 1){
                if ($loginedData['is_admin'] == 1) {
                    $_SESSION["adminLogined"] = $loginedData['user_id'];
                    echo "<script> window.location.href = '../Adminpanel/index.php';</script>";
                } else {
                    $_SESSION["userLogined"] = $loginedData['user_id'];
                    echo "<script>window.location.href = '../Website/index.php';</script>";
                }
              }else{
                echo "<script>alert('Your account is not verify yet.');</script>"; 
              }
            } else {
                echo "<script>alert('Your account is deactivated by admin.');</script>";
            }

        } else {
            echo "<script>alert('Invalid email or password.');</script>";
        }

    } else {
        echo "<script>alert('Invalid email or password.');</script>";
    }
}

?>