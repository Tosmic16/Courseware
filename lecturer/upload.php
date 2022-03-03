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
<body>

<header>
		<div class="hat">
			<h1><i class="fas fa-graduation-cap"></i><span class="title-color">CourseWare</h1>
		</div>
		<div class="search_my">
			<form>
				<input type="search" class="search1" placeholder="search">
				<button class="button1" type="submit"><i class="fas fa-search"></i></button>
			</form>
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
      <a  class="nav-link" href="tag.php">Tag</a>
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
 <div class="container">
         <p class="h2 text-center btn-danger">Register A Lecturer</p>
        <form  action="#" method="POST" enctype="multipart/form-data">
           <div class="form-group">
                <label>Course:</label>
                <select name="course">
         <?php
         include ('C:\xampp\htdocs\fyp\database.php');

         $lec = $_SESSION['lec'];

         $sql = "SELECT course FROM taken WHERE lecturer = '$lec' ";
         $res = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_assoc($res)):

         ?>
            <option value="<?php echo $row['course']; ?>"><?php echo $row['course']; ?></option>
            <?php
          endwhile;
          ?>
          </select>
            </div>
            <div class="form-group">
                <label>Topic:</label>
                <input class="form-control" type="text" name="topic" required placeholder="Enter Topic"/>
            </div>
           
            <div class="form-group">
                              <label>Select File:</label><br>

                            <input class="btn btn-primary"  type="file" required name="fileToUpload"  id="UploadedFile"/>

            </div>
          
            <div class="form-group">
                <input class="btn btn-primary btn-block" name="submit" type="submit" value="Submit"/>
            </div>
        </form>
    </div>
    <?php

    if (isset($_POST['submit'])) {
      $course = $_POST['course'];
      $topic = $_POST['topic'];
      $ti = date("Y_m_d h:i:s", time());
               $uploadOk = 1;
               $err ="";


     $i = "SELECT * FROM material";
     $r = mysqli_query($conn, $i);
     $num = mysqli_num_rows($r) + 1;

     $target_dir = "materials/";
     $target_file = $target_dir.$num.".".pathinfo($_FILES["fileToUpload"]['name'],PATHINFO_EXTENSION);
     echo $target_file;

     $FileType = pathinfo($target_file,PATHINFO_EXTENSION);


if($FileType != "docx" && $FileType != "doc" && $FileType != "pdf" && $FileType != "txt" && $FileType != "PNG" && $FileType != "JPEG")
 {
    $err=$err. "Sorry, only pdf, docx,txt & doc files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script> alert('".$err."Sorry, your file was not uploaded.')</script>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

      
        $q = "INSERT INTO material (course, topic, material, tup)
                  VALUES('$course', '$topic', '$target_file','$ti')";
                mysqli_query($conn, $q);
                        echo "<script> alert('The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.')</script>";

    }

    }
  }
    ?>


</body>
</html>