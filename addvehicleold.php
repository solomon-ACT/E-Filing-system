 <?php
 session_start();
if(!isset($_SESSION['Id'])){
   header('Location: home.php');
}
     require_once("header_admin.php");
     include "connection.php";

if(isset($_POST['submit'])) 
{

//Count total file
    $FileCount=count($_FILES['file']['name']);
	// $code=$_get['code'];
	debug_to_console("sdfsd   " .$FileCount);
	
	$count = 0;

	// for ( $i = 0; $i < $FileCount; $i++ )
	// {
		// $filename = $_FILES[ 'file' ][ 'name' ][ $i ];
		// debug_to_console($filename);
	// }
	
	
	/*Looping over all files*/
	// for ( $i = 0; $i < $FileCount; $i++ )
	// {
		// $filename = $_FILES[ 'file' ][ 'name' ][ $i ];
		

		// /*Select file type*/
		// $FileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );

		// /* Valid file extensions*/
		// $extensions_arr = array( "pdf" );

		// /*Check extension*/
		// if ( in_array( $FileType, $extensions_arr ) )
		// {
			// /*Checking if the file existing*/
			// $sql1 = "SELECT `saleda` FROM `tb_vehicle` WHERE `saleda`='" . str_replace( ".pdf", "", $filename ) . "'";
			// $result = $conn->query( $sql1 );
			// if ( $result->num_rows > 0 ) 
			// {
				
				
				
			// } 
			// else 
			// {
				
					// $filename = str_replace( ".pdf", "", $filename );
					
					// /*PDF db insert sql*/					
					// $sql = "INSERT INTO tb_vehicle(`code`,`saleda`,`url`) VALUES('$code','$filename','$target_file')";
					// /*$result = "INSERT INTO tb_adminhistory(`admin_id`,`saleda_no`,`driver_no`,`user_id`,`date_added`,`date_modified`,`action_type`) VALUES('$adm_id','$filename','$dr_no','$user','$date',' $date_m','$action')";*/
					// if ( mysqli_query( $conn, $sql ) ) {
						
						// $count++;
					// } else {
						// echo 'Error: ' . mysqli_error( $conn );
					// }
				
			// }
		// } else {

			// echo( "<div><span >The file can upload only pdf . . . <br> </span> </div>" );
		// }

	// }
	// echo( "<div><span >From .'$i'.file .'$count'. inserted successfully <br> </span> </div>" );
	
	
	
}
 
 function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>alert('The Output is : " . $output . "' );</script>";
  }
 ?>
   <section class="content">
     <div class="col-md-12">
    	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">የፋይል ማስገቢያ ቀጽ</h3>
            </div>
          <div class="box-body">
           <div class="col-md-6">

          <form role="form" method="POST" action="" enctype="multipart/form-data" >
              
                <div class="form-group">
                <label>ኮድ</label>
                    <select name="code" width="5" class="form-control">
                      <option>ኮድ  ምረጥ</option>
                       <option>1</option>
                       <option>2</option>
                       <option>2A</option>
                       <option>2B</option>
                       <option>2 Motor</option>
                       <option>3 ETH</option>
                       <option>3 AA</option>
                       <option>3A</option>
                       <option>3B</option>
                       <option>3 Motor</option>
                       <option>4 AA</option>
                       <option>4 ETH</option>
                       <option>5 AA</option>
                       <option>5 ETH</option>
                       <option>5 Motor</option>
                       <option>Telalafe</option>
                       <option>Liyu Liyu</option>
                       <option>35</option>
                       <option>35 Motor</option>
                    </select>
                 </div>
                <div class="form-group">
                	
                  <label>ሳሌዳ ቁጥር</label>
                  <input type="text" name="saleda" class="form-control" placeholder="ሳሌዳ ቁጥር አስገባ">
                 </div>
            <div class="form-group">
                
                    <label>ፋይል </label>
                    <input type="file" name="file[]" id="file" multiple>
                
            </div>
              
              <div class="box-footer">
                <input type="submit" name="submit" value="አስቀምጥ">
              </div>
            </form>
          </div>
         </div>
        </div>
      </div></section>
      
  <?php

     require_once("footer.php");

?>          
