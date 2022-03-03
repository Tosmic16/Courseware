<?php
session_start();
if (empty($_SESSION['lec'])) {
    header('location: login.php');

}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Chat</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">

            <link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web\css\all.css">
                      <link rel="stylesheet" type="text/css" href="forum.css">


  ;
  </head>
  <!--Coded With Love By Mutiullah Samim-->
  <body>
    <header>
    <div class="hat">
      <h1><i class="fas fa-graduation-cap"></i><span class="title-color">CourseWare</h1>
    </div>
    
    <div class="search_my">
      <form method="POST">
        <input name='query' type="search" class="search1" placeholder="search">
        <button name="search" class="button1" type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
    <div class="home1" style="float: right; margin-right: 20px;">
      <a href="home.php"><h1 style="color: black"><i  class="fas fa-home"></i></h1></a>
    </div>
    <div class="clearfix"></div>
  </header>
           <div class="container" style="background-color: white;">

          <?php


                      include ('C:\xampp\htdocs\fyp\database.php');

                        $q = "SELECT * FROM question";
                        $res = mysqli_query($conn, $q);
                        if (mysqli_num_rows($res)==0) {
                          $err = "No Question At All";  
                        }
                              else{
                                while ($row = mysqli_fetch_assoc($res)):
                                  # code...
                                ?>


                                    <a href="forum.php?doubt=<?php echo $row['id'] ?>">
            <div class="card-body msg_card_body">
              <div class="d-flex justify-content-start mb-4 " style="margin: 0px;">
                <div class="img_cont_msg">
                  <img src="1.jpg" class="rounded-circle user_img_msg" style="height: 40px; width: 40px;">
                </div>
                <div class="msg_cotainer" style=" background-color: rgba(225,225,225,0.3); border-bottom: 2px solid black">
                                    <span style="color: black"> <?php echo $row['itext']; ?></span>

                                    <span style="color: blue"> <?php echo $row['time']; ?></span>
                                    <form method="POST">
                                                                        <input type="hidden" name="quest" value="<?php echo $row['id'] ?>">

                                  <button name="dele">  <span class="fas fa-trash"></span></button>
</form>
                </div>
              </div>
            </div>    
          </a>

                                <?php
endwhile;
                              }

if (isset($_POST['dele'])) {
  
  $id = $_POST['quest'];

  $qr= "DELETE FROM question WHERE id= $id";
  mysqli_query($conn,$qr);


}

          ?>
        
             
              
         
                      
          </div>

  
  </body>
</html>
  