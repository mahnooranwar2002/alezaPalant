<?php include("header.php");
$id=$_GET["id"];
$query="SELECT * from tbl_category where category_id=$id";
$result=mysqli_query($con,$query);
$data= (mysqli_fetch_assoc($result));


?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="card mb-4 mt-5">
                            <div class="card-header bg-primary text-white">
                                
                                Edit Category 
                            </div>
                            <div class="card-body">
                            <form method="post">
                            <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Category Name</label>
  <input type="text" name="name" class="form-control"   value="<?php echo htmlspecialchars($data['category_name']); ?>"  id="exampleFormControlInput1" placeholder="Enter name">
</div>
<div class="mb-3">
<select class="form-select" name="status" required>
                                <option hidden>Select status</option>
                                <option value="1" <?php if ($data['is_active'] == 1) echo 'selected'; ?>>Active</option>
                                <option value="0" <?php if ($data['is_active'] == 0) echo 'selected'; ?>>Deactive</option>
                            </select>
</div>
<div class="mb-3">
 
  <input type="submit" name="update_btn" class="form-control btn btn-primary"  value="Save">
</div>


                            </form>
                            </div>
                        </div>
                      
                    </div>
                </main> 
               
<?php 

include('footer.php');
if(isset($_POST["update_btn"])){
    $Categoryname=$_POST["name"];
    $CategoryStatus=$_POST["status"];
  


    $query="UPDATE `tbl_category` SET `category_name`= '$Categoryname',`is_active`='$CategoryStatus' WHERE category_id = $id";
    $result = mysqli_query($con,$query);
  if($result){
    echo  "<script>
      window.location.href = 'show_Category.php';
          </script>"; 
  }
  
  
   
  
    
  }


 

  


?>