<?php

session_start();
error_reporting();

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

$sql="SELECT * FROM teacher";

$result=mysqli_query($data,$sql);




if (isset($_GET['teacher_id'])){
    $t_id = $_GET['teacher_id'];

    $sql_2 = "DELETE FROM teacher WHERE id='$t_id' ";

    $result_2 = mysqli_query($data, $sql_2);

    if ($result_2) {
        header('location:admin_view_teacher.php');
    }
}




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
	
<h1>View All Teachers Data</h1>





<table border="1px">
	
<tr>

<th class="table_th">Teacher Name</th>
<th class="table_th">About Teacher</th>
<th class="table_th">Image</th>
<th class="table_th">Delete</th>


</tr>


<?php

while($info=$result->fetch_assoc())
{



?>



<tr>

<td class="table_td"><?php echo "{$info['name']}" ?></td>	
<td class="table_td"><?php echo "{$info['description']}" ?></td>	
<td class="table_td"> <img height="100px" width="100px"  src="<?php echo "{$info['image']}" ?>"> 


 </td>

 <td class="table_td">
 	<?php

 	echo "
 	<a onClick=\" javascript:return confirm ('Are you sure...');\" class='btn btn-danger' href='admin_view_teacher.php?teacher_id={$info['id']}'>

 	Delete
    

 	</a>";
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