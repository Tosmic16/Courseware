<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <?php
             $link= "../lecturer/";

	$id = $_GET['id'];
	echo $id;
        include ('C:\xampp\htdocs\fyp\database.php');
        $sql = "SELECT * FROM material WHERE mid= $id  ";
        $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)):

 ?>
        <a  class="btn btn-primary" href="<?php echo $link.$row['material'] ?>" download>download</a>
<?php
endwhile;

?>

</body>
</html>