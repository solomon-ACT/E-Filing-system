<?php
session_start();
if(!isset($_SESSION['Id'])){
   header('Location: home.php');
}
    require_once("header_admin.php");

 include "connection.php";
    $id=$_SESSION['Id'];
    
    $sql="select * from account where id='$id'";
    $result=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_array($result)) { 
?>
  <section class="content">
     <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive" src="Image/<?php echo $row['photo'] ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $row['FName'];  echo $row['LName'] ?> </h3>

              <p class="text-muted text-center"><?php echo $row['roles'];?></p>
              
            </div>
         
          </div>
     </div>
  </section>
  <?php
}
    require_once("footer.php");
  ?>          
