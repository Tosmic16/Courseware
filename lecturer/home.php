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
      	<a  class="nav-link" href="upload.php">Upload</a>
      </li>
     
     <li class="nav-item">
     	<a  class="nav-link" href="tag.php">Tag</a>
     </li>
     <li class="nav-item">
     	<a  class="nav-link" href="Material.php">Materials </a>
     </li><li class="nav-item">
     	<a  class="nav-link" href="question.php">Forums</a>
     </li>
    </ul>
    <form method="POST">
    	    <button class="btn btn-secondary" name="logout">Logout</button>     

    </form>
  </div>
</nav>
</div>
<div class="clearfix"></div>

<div class="left" style="float: left; display: inline-block; width: 60%; padding-top: 7px;">
<div class="container">


<?php

include ('C:\xampp\htdocs\fyp\database.php');
$p = "";

$lec = $_SESSION['lec'];
$sql = "SELECT * FROM taken WHERE lecturer = '$lec' ";

$res = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($res)) {

	$i = $row['course'];
			$q = "SELECT * FROM course WHERE id ='$i' ";
					$r = mysqli_query($conn, $q);

while ($ro = mysqli_fetch_assoc($r)):



	?>
	<div style="background-color: rgb(225,225,225,0.34); border-bottom: 1px solid black; margin: 5px; padding-left: 4px;">
		<?php

$sq = "SELECT * FROM taken WHERE course = '$i' ";
$re = mysqli_query($conn, $sq);

while ($rowl = mysqli_fetch_assoc($re))
	
{
		$g = $rowl['lecturer'];
				$qe = "SELECT name FROM lecturer WHERE id ='$g' ";
				$rest = mysqli_query($conn, $qe);

				while ($rowls = mysqli_fetch_assoc($rest)){

		$p = $p . $rowls['name'].'   ';
}
}
		?>
						<h3> Course Code:	 <?php  echo $row['course'];  ?> </h3>
						<h5 style="color: red;"><?php echo $ro['title']; ?></h5>
						<p style="padding: 0px;">Lecturers: <?php echo  $p ; ?> </p>
							<?php
							if ($ro['level'] < 500) {
								$b = 'Undergraduate';
							}
							else{
								$b = "Postgraduate";
							}
							$p="";
							?>
							<p style="color: black; padding: 0px;">Level: <?php echo $b ?></p1><br>
								<?php 
								if ( $lec == $ro['lecturer']) :
								?>
<a href="tag.php?course='$i'" class="btn btn-danger">Tag</a>
<?php endif; ?>
<a href="upload.php?course='$i'" class="btn btn-primary">Upload</a>
<a href="question.php?course='$i'" class="btn btn-secondary">Forum</a>




	</div>

	
	<?php
endwhile;

}
?>

</div>
</div>
<div  style="float: right; display: fixed; width: 40%; padding: 60px;  background-color: rgb(225,225,225,0.34); overflow: auto; height: 665px;">
	<div class="container">
	

		
	</div>
	
</div>
<?php

	if (isset($_POST['logout'])) {
		
		unset($_SESSION['lec']);
		header('location: login.php');
	}

?>

</body>
</html>