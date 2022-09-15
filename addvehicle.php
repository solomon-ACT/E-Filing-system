 <?php
  session_start();
if(!isset($_SESSION['Id'])){
   header('Location: home.php');
}
     require_once("header_admin.php");
     include ("connection.php");    

if(isset($_POST['submit'])) 
{


	$code = $_POST[ 'code' ];
	
	$date = date( "Y-m-d" );
	$adm_id = $_SESSION[ 'Id' ];

	$action = "Vehicle Added";
	$tmp_name = $_FILES[ 'file' ][ 'tmp_name' ];
	$date_m = '0000-00-00';
	$dr_no = "Null";
	$user = "Null";


	/*Count total uploaded files*/
	$totalfiles = count( $_FILES[ 'file' ][ 'name' ] );
	$count = 0;

	/*Looping over all files*/
	for ( $i = 0; $i < $totalfiles; $i++ )
	{
		$filename = $_FILES[ 'file' ][ 'name' ][ $i ];
		$target_dir = "VehicleData/";
		$target_file = $target_dir . $filename;

		/*Select file type*/
		$FileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );

		/* Valid file extensions*/
		$extensions_arr = array( "pdf" );

		/*Check extension*/
		if ( in_array( $FileType, $extensions_arr ) )
		{
			/*Checking if the file existing*/
			$sql1 = "SELECT `saleda` FROM `tb_vehicle` WHERE `saleda`='" . str_replace( ".pdf", "", $filename ) . "'";
			$result = $conn->query( $sql1 );
			if ( $result->num_rows > 0 ) 
			{
				echo '<script type="text/javascript">';
				echo 'alert("The File is already exist")';
				echo '</script>';
				
			} 
			else 
			{
				 // Upload files and store in database	
				if ( move_uploaded_file( $_FILES[ "file" ][ "tmp_name" ][ $i ], $target_file ) ) 
				{
					/*Iliminating unwanted file name */
					$filename = str_replace( ".pdf", "", $filename );
					
					/*PDF db insert sql*/					
					$sql = "INSERT INTO tb_vehicle(`code`,`saleda`,`url`) VALUES('$code','$filename','$target_file')";
					/*$result = "INSERT INTO tb_adminhistory(`admin_id`,`saleda_no`,`driver_no`,`user_id`,`date_added`,`date_modified`,`action_type`) VALUES('$adm_id','$filename','$dr_no','$user','$date',' $date_m','$action')";*/
					if ( mysqli_query( $conn, $sql ) ) {
						
						$count++;
					} else {
						echo 'Error: ' . mysqli_error( $conn );
					}
					
					echo '<script type="text/javascript">';
					echo 'alert("inserted successfully")';
					echo '</script>';
				 } else {
					 echo '<script type="text/javascript">';
					 echo 'alert("Error in uploading file ")' ;
					 echo '</script>';
				 }
				
		   }
		} else 
		{
			echo '<script type="text/javascript">';
			echo 'alert("The file can upload only pdf . . . " )';
			echo '</script>';
		}

	}
	
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

          <form role="form" method="POST" action="addvehicle.php" enctype="multipart/form-data">
              
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
                       <option>ተላላፊ</option>
                       <option>ልዩ ልዩ</option>
                       <option>35</option>
                       <option>35 Motor</option>
                    </select>
                 </div>
                
            <div class="form-group">
                
                    <label>ፋይል </label>
                    <input type="file" name="file[]" id="file" accept="application/pdf" multiple>
                
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
