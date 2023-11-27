<?php

error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message'])
{
	$message=$_SESSION['message'];

	echo "<script type='text/javascript'>
	alert('$message');

	 </script>";
}



$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";


$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM teacher";
$result=mysqli_query($data,$sql);


$sql2="SELECT * FROM course";
$result2=mysqli_query($data,$sql2);


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">




<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body>



<nav>
	<label class="logo">W-School</label>

<ul>
	<li><a href="">Home</a></li>
	
	
	<li><a href="login.php"class="btn btn-success">Login</a></li>
</ul>
</nav>



<div class="section1">
	
<label class="img_text">We Teach Student With Care</label>
<img class="main_img" src="school_management.jpg">

</div>



<div class="container">

	<div class="row">
		<div class="col-md-4">
			<img class="welcome-img" src="school2.jpg">
			
		</div>
		<div class="col-md-8">
			 <h1>Wel Come to W-School</h1>
			 <p>A school is both the educational institution and building designed to provide learning spaces and learning environments for the teaching of students under the direction of teachers. Most countries have systems of formal education, which is sometimes compulsory. In these systems, students progress through a series of schools that can be built and operated by both government and private organization...

			 	A school is both the educational institution and building designed to provide learning spaces and learning environments for the teaching of students under the direction of teachers. Most countries have systems of formal education, which is sometimes compulsory. In these systems, students progress through a series of schools that can be built and operated by both government and private organization...A school is both the educational institution and building designed to provide learning spaces and learning environments for the teaching of students under the direction of teachers. Most countries have systems of formal education, which is sometimes compulsory. In these systems, students progress through a series of schools that can be built and operated by both government and private organization...A school is both the educational institution and building designed to provide learning spaces and learning environments for the teaching of students under the direction of teachers. Most countries have systems of formal education, which is sometimes compulsory. In these systems, students progress through a series of schools that can be built and operated by both government and private organization... 
			 </p>
		</div>

		
	</div>
	
</div>


<div class="container">

	<div class="row">
		<div class="col-md-4">
			<img class="welcome-img" src="school.jpg">
			
		</div>
		<div class="col-md-8">
			 <h1>About W-School</h1>
			 <p>How to balance these functions appropriately is a question that will probably never be definitively answered to the approval of all. But it is a key one for districts to revisit as they decide what to do with a mammoth, but time-limited infusion of federal funding.

After all, how districts choose to spend that money serves a symbolic role as well as reflects how they’ve weighed the question of their core role. It conveys what they value, how they plan to reach it—and, importantly, what they feel they can manage.

In part, this tension is reemerging because families depended on schools during the pandemic in large numbers and in big ways. Arguably, they were perhaps the only real infrastructure we had to reach 50 million students and their families. But what we also learned, if we hadn’t already, is that that infrastructure is stretched, creaky, and, yes, not particularly efficient. How to balance these functions appropriately is a question that will probably never be definitively answered to the approval of all. But it is a key one for districts to revisit as they decide what to do with a mammoth, but time-limited infusion of federal funding.

After all, how districts choose to spend that money serves a symbolic role as well as reflects how they’ve weighed the question of their core role. It conveys what they value, how they plan to reach it—and, importantly, what they feel they can manage.

In part, this tension is reemerging because families depended on schools during the pandemic in large numbers and in big ways. Arguably, they were perhaps the only real infrastructure we had to reach 50 million students and their families. 
			 </p>
		</div>
		
		
	</div>
	
</div>



<center>
	<h1>Our Teachers</h1>
</center>

<div class="container">

	<div class="row">



<?php

while($info=$result->fetch_assoc())
{



?>


		<div class="col-md-4">
			<img class="teacher" src=" <?php echo "{$info['image']}"   ?>  ">
			

			<h3> <?php echo "{$info['name']}"   ?>  </h3>

			<h4> <?php echo "{$info['description']}"   ?>  </h4>



		</div>
		
	<?php

}

	?>

	</div>
	

</div>







<center>
	<h1>Our Cources</h1>
</center>

<div class="container">

	<div class="row">



<?php

while($info=$result2->fetch_assoc())
{



?>



		<div class="col-md-4">
			<img class="course" src=" <?php echo "{$info['image']}"   ?>  ">
			

			<h3> <?php echo "{$info['name']}"   ?>  </h3>

			<h4> <?php echo "{$info['description']}"   ?>  </h4>



		</div>
		
	<?php

}

	?>





	</div>
	

</div>





<center>
	<h1>Admission Form</h1>

</center>

<div align="center" class="Admission_form">
	<form action="data_check.php" method="POST">
			<div class="adm_int">
				<label class="label_text">Name</label>
				<input type="text" name="name" class="input_deg">
			</div>


			<div class="adm_int">
				<label class="label_text">Email</label>
				<input type="text" name="email" class="input_deg">
			</div>



			<div class="adm_int">
				<label class="label_text">Phone</label>
				<input type="text" name="phone" class="input_deg">
			</div>


			<div class="adm_int">
				<label class="label_text">Message</label>
				<textarea class="input_txt" name="message"></textarea>
			</div>


			<div class="adm_int">
				
				<input class="btn btn-primary" type="submit" value="apply" id="submit" name="apply">
			</div>



	</form>




</div>





       

















</body>
</html>