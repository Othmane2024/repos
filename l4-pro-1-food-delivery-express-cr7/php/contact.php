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

<h1>Elegant Contact Form</h1>

<div class="user-account">

   <section>
      <div id="close-account"><span>close</span></div>
      <div class="user">
         <p><span>you are not logged in now!</span></p>
      </div>
      <div class="flex">

         <form action="" method="post">
            <h3>login now</h3>
            <input type="email" name="email" required class="box" placeholder="enter your email" maxlength="50">
            <input type="password" name="pass" required class="box" placeholder="enter your password" maxlength="20">
            <input type="submit" value="login now" name="login" class="btn">
         </form>

         <form action="" method="post">
            <h3>register now</h3>
            <input type="text" name="name" required class="box" placeholder="enter your name" maxlength="20">
            <input type="email" name="email" required class="box" placeholder="enter your email" maxlength="50">
            <input type="password" name="pass" required class="box" placeholder="enter your password" maxlength="20">
            <input type="password" name="cpass" required class="box" placeholder="confirm your password" maxlength="20">
            <input type="submit" value="register now" name="register" class="btn">
         </form>

      </div>

   </section>

</div>

<section class="contact" id="contact">

   <h1 class="heading">Contact Us</h1>

   <form action="process_form.php" method="post" class="contact-form">
       <div class="form-group">
           <label for="name">Naam:</label>
           <input type="text" id="name" name="name" required>
           <label for="email">Email:</label>
           <input type="email" id="email" name="email" required>
           <label for="message">Bericht:</label>
           <textarea id="message" name="message" rows="4" required></textarea>
           <input type="submit" value="Verzenden" name="Verzenden" class="form-group">
       </div>
   </form>
</section>

<?php include '../includes/footer.php'; ?>
<script src="../js/script.js"></script>
</body>
</html>