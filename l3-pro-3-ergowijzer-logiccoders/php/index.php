<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/Logic-coders-logo.png">
    <title>Ergowijzer</title>
    <link rel="stylesheet" href="../css/general.css">
</head>

<body>
    <?php require '../includes/header.php'; ?>

    <div class="main-container">
        <div class="title"><span class="left-side-title">Ergo</span><span class="right-side-title">Wijzer</span></div>
        <div class="text-home">
            <p>Welcome to Ergowijzer, your ultimate guide to ergonomic devices and tools! We understand the importance
                of maintaining a healthy and comfortable workspace, which is why we're dedicated to providing you with
                comprehensive information and resources on ergonomics. <br>Whether you're setting up a home office,
                revamping your workplace, or simply looking to improve your posture and well-being, Ergowijzer has you
                covered. From ergonomic chairs and standing desks to mouse pads and keyboard trays, we've curated a
                selection of products designed to enhance your comfort and productivity.<br><br>At Ergowijzer, we
                believe that everyone deserves to work and live comfortably. Join us on the journey to better ergonomics
                – explore our site, discover innovative solutions, and take the first step towards a healthier, happier
                you. Welcome to a world of ergonomic excellence with Ergowijzer!</p>
        </div>
        <div class="scroll-btn">Products</div>
        <div class="product1">
            <div class="imageholder">
                <img src="../assets/mat/wrist.png">
            </div>
            <div class="text-products">
                <h1>
                    <?php echo $product1name; ?>
                </h1>
            </div>
        </div>

        <div class="product2-low">
            <div class="imageholder">
                <img src="../assets/glasses/back.png">
            </div>
            <div class="text-products">
                <h1>
                    <?php echo $product2name; ?>
                </h1>
            </div>
        </div>
        <div class="product3">
            <div class="imageholder"><img src='../assets/keyboard/Ergonomic_keyboard.png'></div>
            <div class="text-products">
                <h1>
                    <?php echo $product3name; ?>
                </h1>
            </div>
        </div>
        <div class="product4-low">
            <div class="imageholder"><img src='../assets/ergomuis/Ergonomic_mouse.png'></div>
            <div class="text-products">
                <h1>
                    <?php echo $product4name; ?>
                </h1>
            </div>
        </div>
        <div class="product5">
            <div class="imageholder"><img src='../assets/ssd/mid.webp'></div>
            <div class="text-products">
                <h1>
                    <?php echo $product5name; ?>
                </h1>
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
</body>

</html>