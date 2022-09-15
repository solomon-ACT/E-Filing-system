<?php
session_start();
if(!isset($_SESSION['Id'])){
   header('Location: home.php');
}
    require_once("header_admin.php");
 include "connection.php";
    $tt=$_SESSION['Id'];
    
    $sql="select * from account where id='$tt'";
    $result=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_array($result)) { 
?>
  <section class="content">
     <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">የፋይል ማስገቢያ ቀጽ</h3>
            </div>
          <div class="box-body"> 
<?php
if (isset($_POST["submit"])) {
  include "connection.php";

  $file=$_FILES['file']['tmp_name'];
  $handle=fopen($file, "r");
  $c=0;
  while (($filesop= fgetcsv($handle,1000,","))!=false) {
    $code=$filesop[0];
    $saleda=$filesop[1];
    $url=$filesop[2];
    $sql="insert into tb_vehicle values(NULL,'$code','$saleda','$url')";
    $stmt=mysqli_prepare($conn,$sql);
         mysqli_stmt_execute($stmt);
    $c=$c+1;
  }
  if ($sql) {
   
     echo "<script>alert('vehicle data has been uploaded ')</script>";
  }
  else{
    echo "sorry! Unable to import";
  }
  }
?>
  <form enctype="multipart/form-data" method="POST" role="form">
    <div class="form-group">
      <Label for="exampleInputFile">File Upload
      </Label>
      <input type="file" name="file" size="150">
      <p class="help-block">Only Exel/CSV File Import</p>
    </div>
    <button type="submit" class="btn btn-default" name="submit" value="Submit">Upload</button>
    </div>
  </form>
</div></div></div></section>
  <?php
}
    require_once("footer.php");
  ?>          
