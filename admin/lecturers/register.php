<?php include ('C:\xampp\htdocs\fyp\database.php');

 include('process.php');
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
    <link rel="stylesheet" type="text/css" href="lecturer.css">
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
  <div class="container"  style="background-color: white; padding-bottom: 30px;">
         <p class="h2 text-center btn-danger">Register A Lecturer</p>
        <form  action="#" method="POST" enctype="multipart/form-data">
            <div class="preview text-center">
           
                <img class="preview-img" src="img.jpg" alt="Preview Image" width="200" height="200"/>
                <div class="browse-button">
                    <i class="fa fa-pencil-alt"></i>
            <input class="browse-input"  type="file" required name="fileToUpload"  id="UploadedFile"/>
                </div>
            </div>
             <div class="form-group">
                <label>ID:</label>
                <input class="form-control" type="text" name="id" required placeholder="Enter Lecturer ID"/>
            </div>
            <div class="form-group">
                <label>Full Name:</label>
                <input class="form-control" type="text" name="name" required placeholder="Enter Lecturer Full Name"/>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="email" name="email" required placeholder="Enter  Email"/>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input class="form-control" type="password" name="password" required placeholder="Enter Password"/>
            </div>
            <div class="form-group">
                <label>Gender:</label><br/>
                <label><input type="radio" name="gender" required value="Male" checked /> Male</label>
                <label><input type="radio" name="gender" required value="Female" /> Female</label>
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-block" name="submit" type="submit" value="Submit"/>
            </div>
              <div class="form-group" style="width: 50%">
                  <a href="view.php" style="width: 100%"class="btn btn-secondary">View All</a>
            </div>
        </form>
    </div>
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