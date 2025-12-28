<?php include("header.php");?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="card mb-4 mt-5">
                            <div class="card-header bg-primary text-white">
                                
                                Add Category 
                            </div>
                            <div class="card-body">
                            <form method="post">
                            <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Category Name</label>
  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter name"
  pattern="^[A-Za-z\s]{3,50}$" 
  title="Name must be 3-50 characters long and contain only letters and spaces" >
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Category Status</label>
  <select class="form-select" name="status"  aria-label="Default select example">
  <option selected hidden>Open this select menu</option>
  <option value=1>Active</option>
  <option value=0>Deacctive</option>
 
</select>
</div>
<div class="mb-3">
 
  <input type="submit" name="add_btn" class="form-control btn btn-primary"  value="Save">
</div>


                            </form>
                            </div>
                        </div>
                      
                    </div>
                </main>
               
<?php include("footer.php");



if(isset($_POST["add_btn"])){
  $Categoryname=$_POST["name"];
  $CategoryStatus=$_POST["status"];

$nameValidate="SELECT * from tbl_category where category_name = '$Categoryname'";
$NameResult= mysqli_query($con,$nameValidate);
if( mysqli_num_rows($NameResult) == 1){
  echo  "<script>
  alert('The Category is already added now');
</script>"; 
}
else{
  $query="INSERT INTO `tbl_category`( `category_name`,`is_active`) VALUES ('$Categoryname',$CategoryStatus)";
  $result = mysqli_query($con,$query);
if($result){
  echo  "<script>
           alert('The Category is added now');
        </script>"; 
}

}
 

  
}

?>