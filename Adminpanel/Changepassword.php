<?php include("header.php");
$userRecord = $_SESSION["adminLogined"];
$query = "SELECT * from tbl_user where user_id = $userRecord ";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
if (isset($_POST['updateBtn'])) {
    $userName = $_POST['name'];
    $useremail = $_POST['email'];
    $query = "UPDATE `tbl_user` SET `name`='$userName', `email`='$useremail' WHERE `user_id`='$userRecord'";
    $result = mysqli_query($con, $query);
    if($result){
        echo "<script>alert('your profile is updated');</script>";
    }
}
?>
<style>
    #error{
        display: none;
    }
</style>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="card mb-4 mt-5">
                            <div class="card-header bg-primary text-white">
                                
                               Change Password
                            </div>
                            <div class="card-body">
                            <form method="post">
                          
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
<div class="mb-3">
 
  <input type="submit" name="updateBtn" class="form-control btn btn-primary"  value="Save">
</div>


                            </form>
                            </div>
                        </div>
                      
                    </div>
                </main> 


<?php
include('footer.php');?>   <?php
$showSuccess = false;




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