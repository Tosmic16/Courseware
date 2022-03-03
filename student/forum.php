<?php
  session_start();

if (empty($_SESSION['matric'])) {
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
                                    $doubt = $_GET['doubt'];

                                      $q = "SELECT * FROM answerques  INNER JOIN question ON answerques.question = question.id WHERE question = $doubt";
                                      $r = mysqli_query($conn, $q);
                                      if (mysqli_num_rows($r)<=0) {
                                        echo "NO ANSWER YET";

                                      }
                                      while ($row = mysqli_fetch_assoc($r)):
                                        

           ?>
        
             
                
          
         
            <div class="card-body msg_card_body">
                                            <div class="col-lg-12" style="height: 80px;">

              <div class="d-flex justify-content-start mb-4 " style="margin: 0px; border-bottom: 1px solid black">
                <div class="img_cont_msg">
                <img src="1.jpg" class="rounded-circle user_img_msg" style="height: 40px; width: 40px;">
                </div>

                <div class="msg_cotainer" style=" background-color: rgba(225,225,225,0.3);">
                                <?php  echo $row['itext']; ?>

                </div>
              </div>
            </div>

              <div class="d-flex justify-content-start mb-4" style="margin-top: 0px; ">
                 <div class="img_cont_msg" >
                  <img src="1.jpg" class="rounded-circle user_img_msg" style="height: 40px; width: 40px;">
                </div>
              

                <div class="msg_cotainer_send" style="background-color: white; border-bottom: 1px solid black; overflow: auto">
          <?php   echo  $row['answer']; ?>
                  <span style="color: blue"><?php echo $row['time'] ?></span>
               </div>

                </div>
              <?php  endwhile; 
              ?>
             
               
                
              </div>
           
           </div>
          </div>

  
  </body>
</html>
  