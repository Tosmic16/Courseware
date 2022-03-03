<?php include ('C:\xampp\htdocs\fyp\database.php');

session_start();

$imgs = $_GET['img'];
$email = $_GET['email'];
$id = $_GET['lec'];


if ( empty($_SESSION['user']) ) {
 

      
              if ( empty($_SESSION['user']) ){
                header('location: http://localhost/fyp/admin/login.php');
              }

}
if (isset($_POST['submit'])) {

  


$err = "";

$target_dir = "image/";
$target_file = $target_dir .$name. date("Y_m_d_h_i_s", time()).basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $err =$err."File is not an image.";
        $uploadOk = 0;
    
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG")
 {
    $err=$err. "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script> alert('".$err."Sorry, your file was not uploaded.')</script>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

      
        $q = "INSERT INTO lecturer (id, name, email, sex, image, password)
                  VALUES('$id', '$name', '$email','$sex','$target_file', '$password')";
                mysqli_query($conn, $q);
                        echo "<script> alert('The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.')</script>";

    } else {
        echo "Sorry, there was an error uploading your file.  ";
    }
}
}

?>
                
          
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
           
                <img class="preview-img" src="<?php echo $imgs ?>" alt="Preview Image" width="200" height="200"/>
                <div class="browse-button">
                    <i class="fa fa-pencil-alt"></i>
            <input class="browse-input"  type="file" required name="fileToUpload"  id="UploadedFile"/>
                </div>
            </div>
             
            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="email" name="email" value="<?php echo $email ?>" required placeholder="<?php echo $email ?>"/>
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