<?php
session_start();



if ( empty($_SESSION['user']) ) {
 

      
              if ( empty($_SESSION['user']) ){
                header('location: http://localhost/fyp/admin/login.php');
              }

}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="course.css">
            <link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web\css\all.css">


</head>
<body>

<div class="header">
  <a href="#default" class="logo"><img src="lasugong-LOGO-favicon-1.jpg" style="height: 80px; width: 120px;">Logo</a>
  <div class="header-right">
    <a href="http://localhost/fyp/admin/home.php"><p><i class="fa fa-home"></i> Home</p></a>
    <a href="http://localhost/fyp/admin/student/register.php"><p><i class="fa fa-graduation-cap"></i> Student</p></a>
    <a href="http://localhost/fyp/admin/course/register.php"><p><i class="fa fa-book"></i> Course</p></a>
  </div>
</div>
<div class="table-responsive" style="background-color: white">
  <table class="table">
  <tr><th colspan="5"><h3>Materials For CSC 41</h3></th></tr>    
  
  <tr>
    <th width="10%">Course Code</th>
        <th width="40%">Title</th>
    <th width="30%">Lecturer In Charge</th>
    <th width="15%">Action</th>
  </tr>
  <?php
                  include ('C:\xampp\htdocs\fyp\database.php');

      $q = "SELECT * FROM course INNER JOIN lecturer ON course.lecturer = lecturer.id";
      $r = mysqli_query($conn,$q);
      while($row = mysqli_fetch_assoc($r)):

  ?>

        <tr>
          <td><?php echo $row['id'] ?></td>
          <td><h6> <?php echo $row['title'] ?></h6></td>
          <td><h5><?php echo $row['name'] ?></h5></td>
        <td>
          <form action="#" method="POST">
                      <input type="hidden" name="hi" value="<?php echo $row['id']?>">

          <input type="submit" class="btn btn-danger" name="delete" value="delete"></input>

        </form>

</td>
</tr>
<?php
endwhile;
if (isset($_POST['delete'])) {
  $lec = $_POST['hi'];

  $qr="DELETE FROM course WHERE id = '$lec' ";
  mysqli_query($conn,$qr);
  header('location: view.php');
}
?>
    <style>
   body{

   background-image: url('lasuimgs.jpg') ;
   
background-repeat: no-repeat;
 background-attachment: fixed;
  background-size: 100% 100%;

  }
</style>
 
</body>
</html>