<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>


<body>
	
	<?php

include ('C:\xampp\htdocs\fyp\database.php');
$err = " ";

if (isset($_POST['submit'])) {

$username = $_POST['username'];

$password = md5( $_POST['password']);

	
	$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

		$r = mysqli_query($conn, $sql);

			
			
			if (mysqli_num_rows($r) > 0) {
				    $dat = date("Y-m-d h:i:sa", time());

			$sql = "UPDATE admin SET last_login = '$dat' WHERE username = '$username' ";
				mysqli_query($conn,$sql);
				while ($row = mysqli_fetch_assoc($r)) {

					$user = $row['username'];
					$last = $row['last_login'];
	
}
					
					header('location: home.php?user='.$user.'&last='.$last);
	}


else

	{
		$err ="incorrect username/password combination";
		}
}

?>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" method="post">
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
                <label for="inputEmail">Username</label>
              </div>
              <br>


              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <br>
            <p style="color: red; text-align: center;"> <?php echo $err;  ?>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button name="submit" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">
            </form>
          </div>
        </div>

      </div>

    </div>

  </div>
<style>
body{
	background-repeat:no-repeat;
height:100%;
background-size:cover;
}
</style>
</body>


</html>