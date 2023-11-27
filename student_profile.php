<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location: login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

$name = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username='$name' ";

$result = mysqli_query($data, $sql);
$info = mysqli_fetch_assoc($result);

if (isset($_POST['update_profile'])) {
    $s_email = $_POST['email'];
    $s_phone = $_POST['phone'];
    $s_password = $_POST['password'];

    $update_sql = "UPDATE user SET email='$s_email', phone='$s_phone', password='$s_password' WHERE username='$name'";

    $result_update = mysqli_query($data, $update_sql);
    if ($result_update) {
        header('location: student_profile.php');
    } else {
        echo "Error updating record: " . mysqli_error($data);
    }
}
?>






<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="admin.css">



<?php

include 'student_css.php';


?>

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
	width: 500px;
	padding-top: 70px;
	padding-bottom: 70px;
}



</style>



</head>
<body>





<?php

include 'student_sidebar.php';


?>

<div class="content">
	<center>
		<h1>Update Profile</h1>
		<br>

<form action="" method="POST">
	<div class="div_deg">
	


<div>
	<label>Email</label>
	<input type="text" name="email" value="<?php echo "{$info['email']}" ?>">
</div>

<div>
	<label>Phone</label>
	<input type="text" name="phone" value="<?php echo "{$info['phone']}" ?>">
</div>

<div>
	<label>Password</label>
	<input type="password" name="password" value="<?php echo "{$info['password']}" ?>">
</div>
<div>	
	<input class="btn btn-success"  type="submit" name="update_profile" value="submit">


</div>
</form>


</div>

</center>

</body>
</html>