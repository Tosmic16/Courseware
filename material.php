
<!DOCTYPE html>
<html style="scroll-behavior: smooth;">
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web\css\all.css">
			<link rel="stylesheet" type="text/css" href="lecturer/lec.css">

</head>
<body>

<header>
		<div class="hat">
			<h1><i class="fas fa-graduation-cap"></i><span class="title-color">CourseWare</h1>
		</div>
		<div class="search_my">
			<form method="POST">
				<input name='query' type="search" class="search1" placeholder="search">
				<button name="search" class="button1" type="submit"><i class="fas fa-search"></i></button>
			</form>
		</div>
		<div class="clearfix"></div>
	</header>

<div class="table-responsive">
  <table class="table">
  <tr><th colspan="5"><h3>Materials For CSC 41</h3></th></tr>    
  
  <tr>
    <th width="10%">Course Code</th>
    <th width="30%">Title</th>
    <th width="40%">Material</th>
    <th width="15%">Action</th>
  </tr>
 <?php
        include ('C:\xampp\htdocs\fyp\database.php');
        $sql = "SELECT * FROM material INNER JOIN course ON   course.id = material.course  ";
        $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)):

 ?>
        <tr>
          <td><?php echo $row['course'] ?></td>
          <td><?php echo $row['title'] ?></td>
          <td><?php echo $row['topic'] ?></td>
        <td>
          
            <a class="btn btn-primary" href="lecturer/<?php echo $row['material'] ?>" download>Download</a>


</td>
</tr>
     
 
<?php 


endwhile;


if (isset($_POST['search'])) {

  $in = $_POST['query'];

  header('location: search.php?in='.$in);

}
if (isset($_POST['hit'])) {
  $idd =  $_POST['idd'];
  $seen = $_POST['seen'];
  $seen = $seen+1;

  $sqll = "UPDATE material SET seen = $seen WHERE mid= $idd ";
  mysqli_query($conn,$sqll);


$file = $_POST['hitt'];
if (!file_exists($file)) die("File not found");

  header('Content-Disposition: attachment; filename=""'. basename($file) .'"');
  header("Content-Length: ". filesize($file));
  header("Content-Type: application/octet-stream;");
  readfile($file);
}



  if (isset($_POST['logout'])) {
    
    unset($_SESSION['lec']);
    header('location: login.php');
  }


 ?>

</div>
</table>
</div>  

</body>
</html>