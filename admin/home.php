<?php
      session_start();

?>



<!DOCTYPE html>
<html>
<head>
  <title></title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
                <link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web\css\all.css">


</head>
<body>

<div class="header">
  <a href="#default" class="logo"><img src="lasugong-LOGO-favicon-1.jpg" style="height: 80px; width: 120px;">Logo</a>
  <div class="header-right">
    <a href="student\register.php"><p><i class="fa fa-graduation-cap"></i> Student</p></a>
    <a href="lecturers\register.php"><p><i class="fa fa-pencil-alt"></i> Lecturer</p></a>
    <a href="course\register.php"><p><i class="fa fa-book"></i> Course</p></a>
  </div>
</div>
<style type="text/css">
p{
  color: white;
}
.header {
  overflow: hidden;
  background-color: #000000;
  padding: 20px 10px;
}

/* Style the header links */
.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}

/* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

/* Change the background color on mouse-over */
.header a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the active/current link*/
.header a.active {
  background-color: dodgerblue;
  color: white;
}

/* Float the link section to the right */
.header-right {
  float: right;
}

/* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}
body{
   
    background-image: url('lasuimgs.jpg') ;
   
background-repeat: no-repeat;
 background-attachment: fixed;
  background-size: 100% 100%;

}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}
.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-body {
  padding: 2rem;
  text-align: center;
  font-size: 30px;
}
</style>

          <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center"><b>Admin</b></h5>
            <br>
           <?php 

if ( empty($_SESSION['user']) ) {
 

        $_SESSION['user'] = $_GET['user'];
              $_SESSION['last'] = $_GET['last'];
              if ( empty($_SESSION['user']) ){
                header('location: login.php');
              }

}
                  echo "Username: " .$_SESSION['user'];
                  echo "<br><br>Last Login: ". $_SESSION['last'];
            ?><form method="post">
            <br><input class="btn btn-primary" type="submit" name="logout" value="logout"></form>

<?php
            if (isset($_POST['logout'])) {

                header('location: login.php');
                session_unset($_SESSION['user']);
                session_unset($_SESSION['last']);

            }
?>

          </div>
        </div>

      </div>

    </div>

  </div>
           
          
</body>
</html>