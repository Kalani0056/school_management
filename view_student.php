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

$sql="SELECT * FROM user WHERE usertype='student'";

$result=mysqli_query($data,$sql);



?>






<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
	

<?php


include 'admin_css.php';


?>


<style type="text/css">
	
.table_th
{
	padding: 20px;
	font-size: 20px;
}

.table_td
{
	padding: 20px;
	background-color: skyblue;
}

</style>




</head>
<body>



<?php

include 'admin_sidebar.php';

?>


<div class="content">

	<center>
	
<h1>Student Data</h1>


<?php


if(isset($_SESSION['message']))
{
	echo $_SESSION['message'];
}
unset($_SESSION['message']);


?>




<br><br>
<table border="2px">
	

<tr>
	
	<th class="table_th">UserName</th>
	<th class="table_th">Email</th>
	<th class="table_th">Phone</th>
	<th class="table_th">Password</th>
	<th class="table_th">Delete</th>
	

</tr>



<?php

while($info=$result->fetch_assoc())

{

?>






<tr>
	
	<td class="table_td">
		<?php
			echo "{$info['username']}";
		?>

	</td>
	<td class="table_td">
		<?php
			echo "{$info['email']}";
		?>

	</td>
	<td class="table_td">
		<?php
			echo "{$info['phone']}";
		?>

	</td>
	<td class="table_td">
		<?php
			echo "{$info['password']}";
		?>

	</td>

	<td class="table_td">
		<?php
			echo "<a onClick=\" javascript:return confirm('Are you sure to delete?');\" class='btn btn-danger' href='delete.php?student_id={$info['id']}'>Delete </a>";
		?>

	</td>



</tr>

<?php
}

?>


</table>

</center>

</div>




</body>
</html>