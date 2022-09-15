<?php
session_start();
include "connection.php";
if (isset($_GET['url'])) {
	
	$url=$_GET['url'];
	$action="Vehicle Modified";
	$date=date("Y-m-d");
    $adm_id=$_SESSION['Id'];
    $sql="select * from tb_vehicle where url='$url'";
    $sql1= $conn->query($sql);
    $row = $sql1->fetch_assoc();
    $saleda=$row['saleda'];

    $result1=mysqli_query($conn,"insert into tb_adminhistory values('NULL','$adm_id','$saleda','NULL','NULL','NULL','$date','$action')");

	$result=mysqli_query($conn,"delete from tb_vehicle where url='$url'");
    

	$source='VehicleData/'.$url.'';
	if (unlink($source)) {
		header('Location: vehiclelist_admin.php');
	}
	else{
		header('Location: vehiclelist_admin.php');
	}
	
}
?>