<?php include("header.php");?>
<?php
// for fetch 
              $count_user="SELECT COUNT(*) as total_user from tbl_user where is_admin=0";
              $myuser=mysqli_query($con,$count_user);
              if($myuser){
                $row=mysqli_fetch_assoc($myuser);
                $totaluser=$row['total_user']; }



                $count_Cate="SELECT COUNT(*) as total_cate from tbl_category ";
                $mycate=mysqli_query($con,$count_Cate);
                if($mycate){
                  $row=mysqli_fetch_assoc($mycate);
                  $totalCate=$row['total_cate']; }

                  $count_Pro="SELECT COUNT(*) as total_product from tbl_product";
                  $myPro=mysqli_query($con,$count_Pro);
                  if($myPro){
                    $row=mysqli_fetch_assoc($myPro);
                    $totalproduct=$row['total_product']; }

                    $count_conn="SELECT COUNT(*) as contact from tbl_contact";
                    $myCon=mysqli_query($con,$count_conn);
                    if($myCon){
                      $row=mysqli_fetch_assoc($myCon);
                      $totalContact=$row['contact']; }
                  
                      $count_order="SELECT COUNT(*) as total_oder from tbl_orders;";
                      $myorder = mysqli_query($con,$count_order);
                      if($myorder){
                        $row = mysqli_fetch_assoc($myorder);
                        $totalorder = $row['total_oder']; }

                        $sumquery = "SELECT SUM(total_amount) AS total_amount FROM tbl_orders; ";
                        $outcome = mysqli_query($con, $sumquery);
                        
                        if ($outcome) {
                            $row = mysqli_fetch_assoc($outcome);
                            $totalAmount = $row['total_amount'];
                        } 
                        
                    
                      ?>
              ?>
<div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid px-4">
                    <div class="container py-5">
  <div class="row g-4">
    <div class="col-md-3">
      <div class="counter-card bg-white">
        <div class="counter-number" id="counter1"><?php  echo "
             $totaluser  ";?></div>
        <div class="counter-label">Users</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="counter-card bg-white">
        <div class="counter-number" id="counter2"><?php  echo "
             $totalCate ";?></div>
        <div class="counter-label">Categories</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="counter-card bg-white">
        <div class="counter-number" id="counter3"><?php
        echo "$totalproduct"
        ?></div>
        <div class="counter-label">Products</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="counter-card bg-white">
        <div class="counter-number" id="counter4"><?php
        echo "$totalContact"
        ?></div>
        <div class="counter-label">Contacts</div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid px-4">
  <div class="row">
    <div class="col">
            <div class="card mb-4 mt-1 p-4">
                <h4 class="mb-4">Order Status Chart</h4>
               <?php
               include("chart.php");
               ?>
            </div>
            </div>
            <div class="col">
            <div class="counter-card bg-white">
        <div class="counter-number" id="counter2"><?php  echo "
             $totalorder ";?></div>
        <div class="counter-label">Orders</div>
      </div>
      <div class="counter-card bg-white mt-3">
        <div class="counter-number" id="counter2"><?php  print_r($totalAmount)?></div>
        <div class="counter-label">Earning</div>
      </div>
            </div>
        </div>
        </div>


                          
                            </div>
                        </div>
                      
                    </div>
                </main> 


<?php include("footer.php");?>
<style>
    .counter-card {
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      text-align: center;
      padding: 30px 20px;
      transition: 0.3s;
    }
    .counter-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    .counter-number {
      font-size: 2.5rem;
      font-weight: bold;
      color: #007bff;
    }
    .counter-label {
      font-size: 1.2rem;
      color: #555;
    }
  </style>