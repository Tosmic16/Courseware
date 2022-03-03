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
                                    $doubt = $_GET['doubt'];
                                      $qr = "SELECT * FROM  question  WHERE id = $doubt";
                                       $re = mysqli_query($conn, $qr);
                                     
                                      while ($row = mysqli_fetch_assoc($re)):

                                        ?>

 <div class="card-body msg_card_body">
              <div class="d-flex justify-content-start mb-4 " style="margin: 0px; border-bottom: 1px solid black">
                <div class="img_cont_msg">
                <img src="1.jpg" class="rounded-circle user_img_msg" style="height: 40px; width: 40px;">
                </div>
                <div class="msg_cotainer" style=" background-color: rgba(225,225,225,0.3);">
                                <?php  echo $row['text']; ?>

                </div>
              </div>
            </div>



                                        <?php

                                      $q = "SELECT * FROM answerques   WHERE question = $doubt";
                                      $r = mysqli_query($conn, $q);
                                      if (mysqli_num_rows($r)<=0) {
                                        echo "NO ANSWER YET";

                                      }
                                      while ($row = mysqli_fetch_assoc($r)):
                                        

           ?>
        
             
              
                                       <div class="col-lg-12" >

           
              <div class="d-flex justify-content-start mb-4" style="margin-top: 0px; ">
                 <div class="img_cont_msg" >
                  <img src="1.jpg" class="rounded-circle user_img_msg" style="height: 40px; width: 40px;">
                </div>
              

                <div class="msg_cotainer_send" style="background-color: white; border-bottom: 1px solid black; width: 100%; display: inline-block;">
          <?php   echo  $row['answer']; ?>
                  <span style="color: blue"><?php echo $row['time'] ?></span>
               

                </div>
                <div class="clearfix"> </div>
              <?php  endwhile; 
            endwhile;
              ?>
              </div>   <div class="d-flex justify-content-start mb-4" style="margin-top: 0px; ">
              
</div>
               
              </div>
            
                                             <div class="col-lg-12" style="height: 80px;">

                 <form method="POST">

            
                <div class="card-footer" >
              <div class="input-group">

                <textarea name="doubt" class="form-control type_msg" placeholder="Type An Answer..."></textarea>
                <div class="input-group-append">
                  <span class="input-group-text send_btn"><button type="submit" name="subm" value=""><i class="fas fa-location-arrow"></button></i></span>
                </div>

              </div>
            </div>
                  </form>
                </div>
           <?php
         
           $lect = $_SESSION['lec'];
           
                if(isset($_POST['subm'])){
                 
                  $answer = $_POST['doubt'];


                  $qr = "INSERT INTO answerques (question, lecturer,answer) VALUES ('$doubt', '$lect','$answer' )";
                  mysqli_query($conn, $qr);
                }

           ?>
            </div>


           
          </div>


  
  </body>
</html>
  