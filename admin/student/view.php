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
    <link rel="stylesheet" type="text/css" href="student.css">
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
  
  <tr>
    <th width="10%">Image</th>
        <th width="40%">ID</th>
    <th width="30%">Name</th>
    <th width="15%">Action</th>
  </tr>
  <?php
                  include ('C:\xampp\htdocs\fyp\database.php');

      $q = "SELECT * FROM student";
      $r = mysqli_query($conn,$q);
      while($row = mysqli_fetch_assoc($r)):

  ?>

        <tr>
          <td><img style="height: 60px; width: 120px;" src="<?php echo $row['image'] ?>"></td>
          <td><h6> <?php echo $row['matric'] ?></h6></td>
          <td><h5><?php echo $row['name'] ?></h5></td>
        <td>
          <form action="#" method="POST">
                      <input type="hidden" name="hi" value="<?php echo $row['matric']?>">

          <input type="submit" class="btn btn-danger" name="delete" value="delete"></input>
          <a class="btn btn-primary" href="update.php?lec=<?php echo $row['id'] ?>">Update</a>          

        </form>

</td>
</tr>
<?php
endwhile;
if (isset($_POST['delete'])) {
  $lec = $_POST['hi'];

  $qr="DELETE FROM student WHERE matric = '$lec' ";
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