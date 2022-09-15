<?php

session_start();
if(!isset($_SESSION['Id'])){
   header('Location: home.php');
}
     require_once("header_admin.php");
     include "connection.php";
?>
    <section class="content" style="height: auto;">
      <div class="col-md-12">
        
           <div class="box">
            <div class="box-header with-border">
              <div class="row">
              <h3 class="box-title" style="padding-left: 10px;">ተሽከርካሪ ዝርዝር</h3>
            </div>
            <div class="row">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                
              <form action="vehiclelist_admin.php" method="POST">
              <div class="col-sm-12">
                  <div class="col-sm-3">
                   <label>ኮድ ምረጥ</</label>
                    <select name="code" width="5" class="form-control">
                       <option></option>
                       <option>1</option>
                       <option>2</option>
                       <option>2A</option>
                       <option>2B</option>
                       <option>2MOTOR</option>
                       <option>3ETH</option>
                       <option>3</option>
                       <option>3A</option>
                       <option>3B</option>
                       <option>3MOTOR</option>
                       <option>4</option>
                       <option>3A ETH</option>
                       <option>3ETH MO</option>
                       <option>5 Motor</option>
                       <option>ET POLICE</option>
                       <option>5 AA</option>
                       <option>5 ETH</option>
                       <option>Telalafe</option>
                       <option>Liyu Liyu</option>
                       <option>35</option>
                       <option>35MOTOR</option>
                       <option>4MOTOR</option>
                       <option>UN</option>
                       <option>UN-MOTOR</option>
                       <option>OAU</option>
                       <option>OAU-MOTOR</option>
                       <option>4ETH</option>
                       <option>4ETH MOTOR</option>
                       <option>5ETH</option>
                       <option>5ETH MOTOR</option>
                       <option>3ETH TRAILER</option>
                       <option>Liyu ETH</option>
                    </select>
                  </div>
                   <div class="col-sm-3">
                    <input type="text" name="q" class="form-control" placeholder="ሳሌዳ ቁጥር አስገባ">
                  </div>
                <div class="col-sm-3">
                     <span class="input-group-btn">
                <input type="submit" name="submit" id="search-btn" value="ፈልግ" class="btn btn-info btn-flat"/>
                     </span></div>
                </div>
      </form>
  
    </div>
    <br>
     </div>
      <div class="row">
    <div class="box-body">
                  
     <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
     
          <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" style="width: 100%">
                <thead>
                <tr>
                 
                  <th >የሳለዳ ቁጥር</th>
                  <th>ኮድ</th>
                  <th>URL</th>
                  <th>ክፈት</th>
                  <th>Remove File</th> 
                </tr>
                </thead>
                <?php
                     if(isset($_POST['submit']))
                           {
                       
                      $sql="select * from tb_vehicle";
                      $result=mysqli_query($conn,$sql);
                      $count=mysqli_num_rows($result);
                      if($count>0){

                            ?>
                <tbody>
                  <?php   

                 while($row=mysqli_fetch_array($result)){
                  if ($_POST['code']==$row['code'] && $_POST['q']==$row['saleda']) {
                 
                  
                     ?>
                <tr>
                                 
                  <td><?php echo $row['saleda']; ?></td>
                  <td><?php echo $row['code']; ?></td>
                  <td><?php echo $row['url']; ?></td>
                   
                  <td>
                    <a href='pdfv_admin.php?url=<?php echo $row['url']?>' target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                   </td>
               
                    <td><a href='remove_vehiclefile.php?url=<?php echo $row['url']?>'><i class="fa  fa-remove (alias)"></i></a>
                   </td>
                </tr>
                   <?php
                   }
                    }
                   ?>
               </tbody>
               <?php
             }
             else{
              echo "no data";
             }
           }
           else{
                              
                      $sql="select * from tb_vehicle";
                      $result=mysqli_query($conn,$sql);
                      $count=mysqli_num_rows($result);
                      if($count>0){

                            ?>
                <tbody>
                <?php   

                 while($row=mysqli_fetch_array($result)){
                 
                     ?>
                <tr>
                   <td><?php echo $row['saleda']; ?></td>
                  <td><?php echo $row['code']; ?></td>
                   <td><?php echo $row['url']; ?></td>
                  <td><a href='pdfv_admin.php?url=<?php echo $row['url']?>' target="_blank"><i class="fa fa-file-pdf-o"></i></a></td>
                   <td><a href='remove_vehiclefile.php?url=<?php echo $row['url']?>'><i class="fa  fa-remove (alias)"></i></a>
                   </td>
                 
                </tr>
                   <?php
                 
                    }
                   ?>
               </tbody>
               <?php
             }
            
           }

           
             ?>
               
             </table>
            </div>
 </div>

            </div>
          </div>


        </div>
      </div></section>

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

<?php
     require_once("footer.php");
?>          
