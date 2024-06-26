<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/Logic-coders-logo.png">
    <title>Eye protection glasses</title>
    <link rel="stylesheet" href="../css/general.css">
</head>

<!-- eye -->
<body class="product-base eye">
    <?php require '../includes/header.php'; ?>

    <div class="container">

    <div class="content">
        <div class="title">
            <p>Eye protection glasses</p>
        </div>
        <div class="description">
            <p>Introducing our Laptop Eye Protection Glasses: designed specifically to ease eye strain from prolonged
                screen use.
                <br><br>
                These glasses effectively block harmful blue light, reducing eye fatigue and promoting better sleep.
                Equipped with anti-glare coatings, they ensure clear vision in any setting.
                Moreover, their ergonomic design ensures maximum comfort, even during extended wear.
                <br><br>
                If you spend long hours in front of screens, these glasses are an ideal solution to protect your eyes
                and enhance your digital experience.
            </p>
        </div>
    </div>

    <div class="media">
        <div class="video">
            <video controls>
                <source src="../assets/glasses/eyeprotectionvideo.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <div class="slideshow-container">

            <div class="mySlides fade">
                <img src="../assets/glasses/eyeprotectionglasses.png">
            </div>

            <div class="mySlides fade">
                <img src="../assets/glasses/blue.png">
            </div>

            <div class="mySlides fade">
                <img src="../assets/glasses/eye.png">
            </div>



        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

    </div>
    </div>

    <footer>
        <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin"></i></a>
        <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
    </footer>
    <script src="https://kit.fontawesome.com/29186d169c.js" crossorigin="anonymous"></script>
    <script src="../javascript/general.js"></script>
    <script src="../javascript/eye-protection.js"></script>
</body>

</html>