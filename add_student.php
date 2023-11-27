<?php

session_start();

if(!isset($_SESSION['username']))
{
	header("location:login.php");						
}

elseif($_SESSION['usertype']=='student')
{
	header("location:login.php");
}



$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";



$data=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['add_student']))
{
	$username=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$usertype="student";
	$password=$_POST['password'];
	



$check="SELECT * FROM user WHERE username='$username'";

$check_user=mysqli_query($data,$check);

$row_count=mysqli_num_rows($check_user);

if($row_count==1)
{

	echo "<script type='text/javascript'> 

		alert('Data Uploaded Sucessfully....');
		</script>";

}
else
{
	echo "Upload Failed...";
}





	$sql="INSERT INTO user(username,email,phone,usertype,password)VALUES('$username','$email','$phone','$usertype','$password')";

	$result=mysqli_query($data,$sql);

	if($result)
	{
		echo "<script type='text/javascript'> 

		alert('Data Uploaded Sucessfully....');
		</script>";
	}

	else
	{
		echo "Upload Fail!!!!!";
	}

}

?>






<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>





<style type="text/css">
	
label
	{
	display: inline-block;
	text-align: right;
	width: 100px;
	padding-top: 10px;
	padding-bottom: 10px;
	}
.div_deg
	{
		background-color: skyblue;
		width: 400px;
		padding-top: 70px;
		padding-bottom: 70px;
	}


</style>





	

<?php


include 'admin_css.php';


?>




</head>
<body>



<?php


include 'admin_sidebar.php';






?>





<div class="content">
	


<center>


<h1>Add Student</h1>

<div class="div_deg">

<form action="" method="POST">
	
	<div>
		
		<label>Username</label>
		<input type="text" name="name">
	</div>


	<div>
		
		<label>Email</label>
		<input type="email" name="email">
	</div>


	<div>
		
		<label>Phone</label>
		<input type="number" name="phone">
	</div>


	<div>
		
		<label>Password</label>
		<input type="password" name="password">
	</div>


	<div>
		
		
		<input type="submit" name="add_student" value="Add Student" class="btn btn-primary">
	</div>


</form>



</div>

</center>
</div>









</body>
</html>