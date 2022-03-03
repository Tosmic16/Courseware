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
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web\css\all.css">
			<link rel="stylesheet" type="text/css" href="lec.css">

</head>
<body>

<header>
		<div class="hat">
			<h1><i class="fas fa-graduation-cap"></i><span class="title-color">CourseWare</h1>
		</div>
		<div class="search_my">
			<form method="POST">
				<input type="text" class="search1" name="query" placeholder="search">
				<button class="button1" name="search" type="submit"><i class="fas fa-search"></i></button>
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
      <a  class="nav-link" href="upload.php">Upload</a>
     </li><li class="nav-item">
      <a  class="nav-link" href="question.php">Forums</a>
     </li>
    </ul>
  </div>
</nav>
</div>
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
          <form action="#" method="POST">
          <input type="submit" class="btn-danger" name="delete" value="delete"></input>
          <a class="btn btn-primary" href="<?php echo $row['material'] ?>">Download (<?php echo $row['seen']; ?>)</a>          <input type="hidden" name="hi" value="<?php echo $row['id']?>">

        </form>

</td>
</tr>
     
 
<?php 

endwhile;
if (isset($_POST['delete'])) {
  $id = $_POST['hi'];
  echo $id;

    $q = "DELETE FROM material WHERE id = '$id' ";
    mysqli_query($conn,$q);
}

if (isset($_POST['search'])) {

  $in = $_POST['query'];

  header('location: search.php?in='.$in);

}
 ?>

</div>
</table>
</div>  

</body>
</html>