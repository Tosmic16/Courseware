    <?php 
                  include ('C:\xampp\htdocs\fyp\database.php');
session_start();
                          $sql = "SELECT * FROM lecturer ";
                          $res = mysqli_query($conn, $sql);
                          if (isset($_POST['submit'])) {
                           $id = $_POST['code'];
                           $title= $_POST['title'];
                           $level = $_POST['level'];
                           $lecturer = $_POST['charge'];

$q = "INSERT INTO course (id, title, level, lecturer)
                    VALUES('$id', '$title', '$level', '$lecturer')";

                    mysqli_query($conn, $q);
                       $qr =  "INSERT INTO taken (course, lecturer)
                    VALUES('$id', '$lecturer')";
                    mysqli_query($conn,$qr);
           }
        
           if ( empty($_SESSION['user']) ) {
 

        $_SESSION['user'] = $_GET['user'];
              $_SESSION['last'] = $_GET['last'];
              if ( empty($_SESSION['user']) ){
                header('location: http://localhost/fyp/admin/login.php');
     }         }
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
    <a href="http://localhost/fyp/admin/lecturers/register.php"><p><i class="fa fa-pencil-alt"></i>Lecturer</p></a>
  </div>
</div>
  <div class="container"  style="background-color: white; padding-bottom: 30px;">
      
        <h class="h2 text-center btn-danger" style="margin-bottom:  60px;" >Register A Course  </h><br><br>
        <form action="" method="post">
                        <div class="form-group">

                 <label>Course Code:</label>
                <input class="form-control" type="text" name="code" required placeholder="Enter Course Code"/>
            </div>
            <div class="form-group">
                <label>Course Title:</label>
                <input class="form-control" type="text" name="title" required placeholder="Enter Course Title"/>
            </div>
            <div class="form-group">
                <label>Level:</label>
                <input class="form-control" type="number" name="level" required placeholder="Enter Level"/>
            </div>
            <div class="form-group">
                <label>Lecturer:</label>


                      <select name="charge" class="form-control">
                          <?php 
                        
                          while ($row = mysqli_fetch_assoc($res)):
                          ?>
                          <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </option>
                        <?php endwhile; ?>
                      </select>           
 </div>
           
           
            <div class="form-group">
                <input class="btn btn-primary btn-block" name="submit" type="submit" value="Submit"/>
            </div>
            <div class="form-group" style="width: 50%">
                  <a href="view.php" style="width: 100%"class="btn btn-secondary">View All</a>
            </div>
        </form>
    </div>
    <style type="text/css">
      body{

   background-image: url('lasuimgs.jpg') ;
   
background-repeat: no-repeat;
 background-attachment: fixed;
  background-size: 100% 100%;

  }
    </style>
   
</body>
</html>