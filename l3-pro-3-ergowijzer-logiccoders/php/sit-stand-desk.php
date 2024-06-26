<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/Logic-coders-logo.png">
    <title>Products</title>
    <link rel="stylesheet" href="../css/general.css">
</head>

<!-- ssd -->

<body class='product-base ssd'>
    <?php require '../includes/header.php'; ?>


    <div class="container">

        <div class="content">
            <div class="title">
                <p>Sit/Stand Desk</p>
            </div>
            <div class="description">
                <p>
                    Elevate your productivity with our versatile stand-sit desk, designed to optimize your workspace and enhance your well-being.
                    <br><br>
                    Experience the benefits of alternating between sitting and standing seamlessly. With our ergonomic crank handle, adjusting the desk's height not only provides customizable comfort but also offers an immediate workout for your arm muscles, promoting a healthier work routine.
                    <br><br>
                    Enjoy a clutter-free workspace with the crank handle's convenient storage beneath the table, ensuring a sleek and organized appearance.
                    <br><br>
                    Adapt the desk to your preferred working position effortlessly, thanks to its height adjustability ranging from 70 to 120 cm. Whether seated or standing, find the perfect ergonomic setup to support your productivity and comfort.
                    <br><br>
                    Embrace modern aesthetics with the table's wooden finish, adding a touch of sophistication to your workspace while blending seamlessly with any décor.
                </p>
            </div>
        </div>

        <div class="media">
            <div class="video">
                <video controls>
                    <source src="../assets/ssd/sit-stand-desk ergowijzer.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="image">
                <div class="image-container">
                    <img src="../assets/sit-stand-desk/low.tif" alt="Sit/Stand Desk">
                </div>
                <div class="controlls">
                    <!-- <button class='left' onclick="left()"><i class="fa fa-chevron-left"></i></button>
                    <button class='right' onclick="right()"><i class="fa fa-chevron-right"></i></button> -->
                    <button class='up' onclick="up()"><i class="fa fa-chevron-up"></i></button>
                    <button class='down' onclick="down()"><i class="fa fa-chevron-down"></i></button>

                </div>
                <p id='subtext'></p>
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
    <script src="../javascript/sit-stand.js"></script>
</body>

</html>