<?php

session_start();
if(!isset($_SESSION['username']))
{
	header("location:login.php");
}
elseif($_SESSION['usertype']=='admin')
{
	header("location:login.php");
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



</head>
<body>





<?php

include 'student_sidebar.php';


?>



</body>
</html>