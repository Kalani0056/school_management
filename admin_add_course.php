<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location: login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['add_course'])) {
    $t_name = $_POST['name'];
    $t_description = $_POST['description'];
    
    
    $file = $_FILES['image'];
    $file_name = $file['name']; 
    $temp_file_location = $file['tmp_name']; 
    
   
    $uploads_directory = "./image/";
    $dst_db = "image/" . $file_name; 
    $dst = $uploads_directory . $file_name; 
    
   
    if (move_uploaded_file($temp_file_location, $dst)) {
      
        $sql2 = "INSERT INTO course (name, description, image) VALUES ('$t_name', '$t_description', '$dst_db')";
        $result2 = mysqli_query($data, $sql2);

        if ($result2) {
           
            header('location: admin_add_course.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($data);
        }
    } else {
        echo "Error uploading file!";
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
	
.div_deg
{
	background-color: skyblue;
	padding-top: 70px;
	padding-bottom: 70px;
	width: 500px;
}



</style>


</head>
<body>



<?php


include 'admin_sidebar.php';






?>





<div class="content">
	<center>
<h1>Add Courses</h1>

<br><br>

<div class="div_deg">
	
<form action="" method="POST" enctype="multipart/form-data">
	
<div>
	<label>Course Name</label>
	<input type="text" name="name">
</div>
<br>

<div>
	<label>Course Description</label>
	<textarea name="description"></textarea>
</div>

<br>
<div>
	<label>Image</label>
	<input type="file" name="image">
</div>
<br>

<div>
	
	<input type="submit" name="add_course" value="Add Course" class="btn btn-primary">
</div>


</form>


</div>


</center>






</div>











</body>
</html>