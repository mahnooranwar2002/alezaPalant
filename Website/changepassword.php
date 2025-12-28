<?php include('Navbar.php');
 

 if (!isset($userRecord)) {
    echo "<script>window.location.href = '../Auth/login.php';</script>";
   
}
?>


<style>
    #error{
        display: none;
    }
</style>
    <div class="breadcrumb-area">
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
            <h2>Change Password</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Change  Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
   
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-white">
                        <h4 class="mb-0 text-white">Change Password</h4>
                    </div>
                    <div class="card-body p-4">
                        <form  method="POST">
                            <div class="form-group mb-3">
                                <label for="fullName" class="form-label font-weight-bold"> New password</label>
                                <input type="text" class="form-control" id="fullName" name="password"
                                 required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email" class="form-label font-weight-bold"> Confirm password </label>
                               
                                <input type="email" class="form-control" id="email" name="confirmPass"  >
                                <p class="text-danger" id="error" >The comfirm password is not match with password</p>
      
                            </div>

                            <!-- <div class="form-group mb-3">
                                <label for="phone" class="form-label font-weight-bold">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="(555) 123-4567">
                            </div> -->

                         

                            <div class="mt-4 text-right">
                                <button type="submit" name="updateBtn" class="btn card-header btn-lg text-white">
                                    <i class="fa fa-save"></i> Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('Footer.php');?>
    
    <style>
        
  .card-header{
  background-color: #70c745;

  }
    </style>
   <?php
$showSuccess = false;

$userRecord = $_SESSION["userLogined"];


if (isset($_POST['updateBtn'])) {
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPass'];
   
    
    if($confirmPass === $password){
     
        $encrptPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE `tbl_user` SET `password`='$encrptPassword' WHERE `user_id`='$userRecord'";
        $result = mysqli_query($con, $query);
        if ($result) {
            $showSuccess = true;
        }
    }
    else{
        echo "<script>
        document.getElementById('error').style.display = 'initial';
     </script>";
    }
 
}
?>
<?php if ($showSuccess): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        title: 'pasword Change Updated!',
        text: 'Your pasword Change Updated was successfully updated.',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
<?php endif; ?>
