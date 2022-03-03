<?php
session_start();
if (empty($_SESSION['lec'])) {
    header('location: login.php');

}
?>

<!DOCTYPE html>
<html style="scroll-behavior: smooth;">
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="..\bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="..\fontawesome-free-5.8.1-web\css\all.css">
			<link rel="stylesheet" type="text/css" href="lec.css">

</head>
<body style="background-color: grey;">

<header>
		<div class="hat">
			<h1><i class="fas fa-graduation-cap"></i><span class="title-color">CourseWare</h1>
		</div>
	
		<div class="clearfix"></div>
	</header>
	<div class="nav1">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-control="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigaton">
		<span class="navbar-toggler-icon"></span>
	</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto">
       <li class="nav-item">
      <a  class="nav-link" href="home.php">Home</a>
     </li>
    <li class="nav-item">
        <a  class="nav-link" href="upload.php">Upload</a>
      </li>
     
    
     <li class="nav-item">
      <a  class="nav-link" href="material.php">Materials</a>
     </li><li class="nav-item">
      <a  class="nav-link" href="question.php">Forums</a>
     </li>
    </ul>
  </div>
</nav>
</div>

<div class="tagger" style=" background-color:white; margin-left: 400px; margin-right: 400px; margin-top: 50px;">
  <div class="container">

    <form method="POST">
      <H3 style="text-align: center; padding-bottom: 35px;">Tag Lecturers Partaking In This Course</H3>

    <?php
include ('C:\xampp\htdocs\fyp\database.php');

$sql = "SELECT * FROM lecturer";
$res = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($res)):
?>
<div style="display: inline-block; padding-right: 102px; padding-left:  10px; padding-bottom: 10px;">
 <input type="checkbox" name="tagged[]" value="<?php echo $row['id'] ?>" > <?php echo $row['name'] ?></input>
  </div>



<?php

endwhile;
?>
<br>
<center style="padding: 5px; padding-top: 43px;">
<input class="btn btn-primary" type="submit" name="submit" value="Done">
</center>
    </form>
  </div>
  </div>
  
</div>
<?php
if (isset($_POST['submit'])) {
  $course =$_GET['course'];
 $tagged = $_POST['tagged'];
 foreach ($tagged as  $value) {
   $q = "INSERT INTO taken (course, lecturer)
                  VALUES('$course', '$value')";

  mysqli_query($conn,$q);
 }


}

?>
</body>
</html>