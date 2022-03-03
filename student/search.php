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
        <input name='query' type="search" class="search1" placeholder="search">
        <button name="search" class="button1" type="submit"><i class="fas fa-search"></i></button>
      </form>
		</div>
    <div class="home1" style="float: right; margin-right: 20px;">
      <a href="home.php"><h1 style="color: black"><i  class="fas fa-home"></i></h1></a>
    </div>
		<div class="clearfix"></div>
	</header>
<div class="table-responsive">
  <table class="table">
  <tr><th colspan="5"><h3>Search Result</h3></th></tr>    
  
  <tr>
    <th width="10%">Course Code</th>
    <th width="30%">Title</th>
    <th width="40%">Material</th>
    <th width="15%">Action</th>
  </tr>

<?php
        include ('C:\xampp\htdocs\fyp\database.php');


if (isset($_GET['in'])) {
  # code...

$query = $_GET['in'];
}

if (isset($_POST['search'])) {
  $query = $_POST['query'];
  # code...
}
if (!empty($query)) {


  $sql = "SELECT * FROM material WHERE topic LIKE '%$query%' ";
  $q = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($q)){
                $e = $row['course'];
                $sq = "SELECT * FROM course WHERE id = '$e'";
              $res = mysqli_query($conn, $sq);
              while ( $ro = mysqli_fetch_assoc($res)):


?>

         <tr>
          <td><?php echo $row['course'] ?></td>
          <td><?php echo $ro['title'] ?></td>
          <td><?php echo $row['topic'] ?></td>
        <td>
          <form action="#" method="POST">
          <button class="btn-primary">Download (<?php echo $row['seen'] ?>)</button>

        </form>

</td>
</tr>

<?php

     endwhile;
   }
   if (mysqli_num_rows($q) < 1):
   
   ?>
</div>
</table>
</div>

   <div style="margin: 35%; margin-top: 12%; margin-bottom: 0px; border: 2px solid black; text-align: center;">
     <h1>NO RESULT FOUND</h1>
   </div>

<?php
endif;
     }
else{
  echo "<script> alert('no query inputed') </script>";
}



?>


</body>
</html>