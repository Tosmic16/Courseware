<?php

if (isset($_POST['submit'])) {

	$id = $_POST['id'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$sex = $_POST['gender'];
	$password = md5($_POST['password']);


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