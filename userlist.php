<?php
session_start();
if(!isset($_SESSION['Id'])){
   header('Location: home.php');
}
     require_once("header_admin.php");
?>
<section class="content">
     <div class="col-md-12">
    	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">User List</h3>
            </div>
            <div class="box-body">
            	<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
            <div class="col-sm-3">
              <form action="userlist.php" method="GET">
              <div class="input-group input-group-sm">
                <input type="text" name="q" class="form-control" placeholder="input first name">
                     <span class="input-group-btn">
                      <input type="submit" id="search-btn" name="search" value="ፈሊግ" class="btn btn-info btn-flat"/>
                     </span>
               </div>
             
                   </form>
        
                 </div>
    </div>
                    <div class="row">
                    <div class="col-sm-12">
  <?php
  include "connection.php";
  if (isset($_GET['search'])) {
  

 $search=$_GET['q'];
if(!empty($_GET['q'])){
  $terms=explode(" ",$search);
  $sql="select * from account where ";
    $i=0;

  foreach ($terms as $each) {

   
    # code...
    $i++;
    if ($i==1) {
      # code...
      $sql .="FName LIKE '%$each%' ";
    }
    else{
      $sql .="OR FName LIKE '%$each%'" ;
     }
    }
?>
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" style="width: 100%">
                <thead>
                <tr>
                  
                  <th>የመጀመረያ ስም</th>
                  <th>የአባት ስም</th>
                  <th>የስራ ዘርፍ</th>
                  <th>Status</th>
                  <th>Delete Users</th>
                  <th>Activate User</th>

                </tr>
                </thead>
                <?php
                      
                     
                      $result=mysqli_query($conn,$sql);
                      $count=mysqli_num_rows($result);
                      if($count>0){

                            ?>
                <tbody>
                  <?php   

                 while($row=mysqli_fetch_array($result)){
                     ?>
                <tr>
                  
                  <td><?php echo $row['FName']; ?></td>
                  <td><?php echo $row['LName']; ?></td>
                  <td><?php echo $row['roles']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td><a href='delete_User.php?id=<?php echo $row['id']?>'><i class="fa  fa-remove (alias)"></i></a></td>
                  <td><a href='activate_User.php?id=<?php echo $row['id']?>'><i class="fa fa-user-plus"></i></a></td>
                      
                </tr>
                   <?php
                    }
                   ?>
               </tbody>
               <?php
             }
             ?>
              </table>
              <?php  
             }
           }
            else{
              ?>
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr>
                  
                  <th>የመጀመረያ ስም</th>
                  <th>የአባት ስም</th>
                  <th>የስራ ዘርፍ</th>
                  <th>Status</th>
                  <th>Delete Users</th>
                  <th>Activate User</th>

                </tr>
                </thead>
             

             <?php
                      
                      $sql="select * from account where roles!='Admin' ";
                      $result=mysqli_query($conn,$sql);
                      $count=mysqli_num_rows($result);
                      if($count>0){

                            ?>
                <tbody>
                  <?php   

                 while($row=mysqli_fetch_array($result)){
                     ?>
                <tr>
                  
                  <td><?php echo $row['FName']; ?></td>
                  <td><?php echo $row['LName']; ?></td>
                  <td><?php echo $row['roles']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td><a href='delete_User.php?id=<?php echo $row['id']?>'><i class="fa  fa-remove (alias)"></i></a></td>
                  <td><a href='activate_User.php?id=<?php echo $row['id']?>'><i class="fa fa-user-plus"></i></a></td>
                      
                </tr>
                   <?php
                    }
                   ?>
               </tbody>
                </table>
               <?php
             }}
             ?>
             


             <!--                              -->

            </div>

          </div>
              <div class="row">
               
                      </div>
            </div>

        </div>
      </div></div></section>

<?php

     require_once("footer.php");

?> 
        <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="bower_components/fastclick/lib/fastclick.js"></script>
        <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
         
