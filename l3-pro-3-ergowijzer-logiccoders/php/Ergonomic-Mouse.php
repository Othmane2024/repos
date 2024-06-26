<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/Logic-coders-logo.png">
    <title>Products</title>
    <link rel="stylesheet" href="../css/general.css">
</head>

<!-- ergomouse -->
<body class='product-base ergomouse'>
    <?php require '../includes/header.php'; ?>

    <div class="container">

    <div class="content">
        <div class="title">
            <p>Ergonomic mouse</p>
        </div>
        <div class="description">
            <p>The ergonomic mouse is a very comforting product and inproves your arm posture.
                <br><br>
                instead of having your wrist uncomfortable on the table, you can now rest it better because of the
                mouse.
                The mouse is a vertical one where your nerves are not being pressed and you can work longer without
                any pain.
                <br><br>
                Also your arm has to turn every time you use a normal mouse, but with this mouse you can keep your
                arm in a natural position.
            </p>
        </div>
</div>

    <div class="media">
        <div class="video">
            <video controls class="product4vid">
                <source src="../assets/ergomuis/english-video-rick.mp4" type="video/mp4">
                <!-- add video  -->
            </video>
        </div>
        <div class="image">
            <div class="image-slider-mouse">
                <div class="slide-mouse active-mouse">
                    <img src="../assets/ergomuis/Ergonomic_mouse.png" alt="">
                </div>
                <div class="slide-mouse">
                    <img src="../assets/ergomuis/ballmouse.jpg" alt="">
                </div>
                <div class="slide-mouse">
                    <img src="../assets/ergomuis/rainbowmouse.webp" alt="">
                </div>
            </div>
        </div>
        <div class="slider-buttons">
            <button id="prev-mouse"><i class="fa-solid fa-caret-left"></i></i></button>
            <button id="next-mouse"><i class="fa-solid fa-caret-right"></i></i></button>
        </div>
    </div>
    </div>

    <footer>
        <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin"></i></a>
        <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
    </footer>

    <script src="../javascript/ergomouse.js"></script>
    <script src="https://kit.fontawesome.com/29186d169c.js" crossorigin="anonymous"></script>
    <script src="../javascript/general.js"></script>
</body>

</html>