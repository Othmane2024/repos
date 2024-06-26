<?php
session_start();
include '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="icon" type="image/x-icon" sizes="32x32" href="../images/headerlogo.png">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Rapid Delivery</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css"> 

</head>

<body>
<?php include '../includes/header.php'; ?> 
   <div><img src="../images/piz.png" class="homepizzaa"></div>

   <div class="home-bg">

      <section class="home" id="home">

         <div class="slide-container">

            <div class="slide active">
               <div class="image">
                  <img src="../images/actie.png" alt="">
               </div>
               <div class="content">
                  <h3>Pizza Extravaganzza + coca</h3>
                  <a href="menu.php"><button class="bestelbutton">BESTEL NU</button></a>
               </div>
            </div>

         </div>

      </section>

   </div>

  <?php include '../includes/footer.php'; ?>
  
   <script src="../js/script.js"></script>
</body>


</html>