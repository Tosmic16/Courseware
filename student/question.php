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
  </head>
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
              
                <div class="msg_cotainer" style=" background-color: rgba(225,225,225,0.3); border-bottom: 2px solid black">
                                    <span style="color: black"> <?php echo $row['itext']; ?></span>

                                    <span style="color: blue"> <?php echo $row['time']; ?></span>


                </div>
              </div>
            </div>    
          </a>

                                <?php
endwhile;
                              }

          ?>
        
             
              
         
                         <form method="POST">

            
                <div class="card-footer">
              <div class="input-group">

                <textarea name="doubt" class="form-control type_msg" placeholder="Type A Question..."></textarea>
                <div class="input-group-append">
                  <span class="input-group-text send_btn"><button type="submit" name="subm" value=""><i class="fas fa-location-arrow"></button></i></span>
                </div>

              </div>
            </div>
                  </form>

           <?php
         
           $student = $_SESSION['matric'];
           
                if(isset($_POST['subm'])){
                  $doubt = $_POST['doubt'];


                  $qr = "INSERT INTO question (text, student) VALUES ('$doubt', '$student' )";
                  mysqli_query($conn, $qr);
                }
                if (isset($_POST['search'])) {
                  $quer = $_POST['query'];
                  header('location: qsearch.php?query='.$quer);
                }

           ?>
          </div>

  
  </body>
</html>
  