<?php
if(!empty($_GET['id'])){
	//require connection
	require_once 'includes/db.php';
	$st_id=$_GET['id'];
	$del_query="DELETE FROM `student` WHERE id='".$st_id."'";
	$result=mysqli_query($conn,$del_query);
	if($result){
		header('location:/StudentInformation/index.php?msg=del');
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>