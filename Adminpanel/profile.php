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

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="card mb-4 mt-5">
                            <div class="card-header bg-primary text-white">
                                
                                Edit profile
                            </div>
                            <div class="card-body">
                            <form method="post">
                            <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> Name</label>
  <input type="text" name="name" class="form-control"  value="<?php
                                echo $data['name']
                                ?>"   id="exampleFormControlInput1" placeholder="Enter name">
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"> email</label>
  <input type="email" name="email" class="form-control"  value="<?php
                                echo $data['email']
                                ?>"   id="exampleFormControlInput1" placeholder="Enter name">
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
include('footer.php');?>