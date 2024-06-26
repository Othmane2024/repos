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
            <p>Ergonomic wrist rest</p>
        </div>
        <div class="description">
            <p> Introducing the Ergonomic Wrist Rest - your solution to discomfort during long hours of work or
                gaming. Crafted with premium materials, it ensures optimal support and comfort for your wrists.
                <br><br>
                Its
                ergonomic design promotes natural alignment, reducing strain and fatigue. With a non-slip base, it
                stays securely in place, compatible with a range of devices. Invest in your well-being and
                productivity with the Ergonomic Wrist Rest today.
                <br><br>
            </p>
        </div>
    </div>

    <div class="media">
        <div class="video">
            <video controls>
                <source src="../assets/mat/wristvid1.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <div class="slideshow-container">

            <div class="mySlides fade">
                <img src="../assets/mat/wrist.png">
            </div>

            <div class="mySlides fade">
                <img src="../assets/mat/mouse.jpg">
            </div>

            <div class="mySlides fade">
                <img src="../assets/mat/intromouse.jpg">
            </div>
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