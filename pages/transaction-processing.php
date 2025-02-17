<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Fontawesome Link -->
    <script src="https://kit.fontawesome.com/d52215e960.js" crossorigin="anonymous"></script>

    <!-- Google Font and Maps Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- CSS link -->
    <link rel="stylesheet" type="text/css" href="../css/main.css" />

    <title>Menu</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a href="../index.php">
                <img src="../img/logo.png" class="img-fluid" alt="Smooth Day">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-center " id="navbarText">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php/#about-section">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adv-order-menu.php">MENU</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../index.php/#contact-section">CONTACT US</a>
                    </li>
                </ul>
            </div>

            <button class="reserve-btn">
                <a href="reservation.php">Reserve a Table</a>
            </button>

        </div>
    </nav>

    <section class="container-transaction">
        <div class="text-transaction-container">
            <img src="/img/check-icon.png" alt="">

            <h1>TRANSACTION PRCESSING</h1>

            <h3>Please wait a moment, while we are verifying your transaction. You will receive confirmation to your
                email and SMS once it has been verify. Thank you!</h3>
            <h4>For other inquires and problems you may reach us on hygge_testemail@gmail.com and 0912-3456-798.</h4>

            <button class="btn-exit"><a href="../index.php">EXIT</a></button>
        </div>
    </section>



    <!------------Footer Section------------->
    <footer class="footer-section">
        <div class="footer-content-div">
            <div class="footer-div">
                <h3>Restaurant</h3>
                <h4>Unit 8A-1, Rosario Commerical Lane, Rosario Avenue, Rosario Complex, San Pedro City, Laguna 4023
                </h4>
                <h4>Opens Monday - Sunday</h4>
                <h4>Time: 12:00pm - 11:00pm</h4>
                <img src="../img/logo.png" alt="HYGGE" class="img img-fluid">
            </div>

            <div class="footer-div">
                <h3>Quick Links</h3>
                <h4><a href="/index.php">Home</a></h4>
                <h4><a href="../index.php/#about-section">About Us</a></h4>
                <h4><a href="menu.php">Menu</a></h4>
                <h4><a href="../index.php/#contact-section">Contact Us</a></h4>
            </div>

            <div class="footer-div">
                <h3>Services</h3>
                <h4><a href="reservation.php">Reserve a Table</a></h4>
                <h4><a href="menu.php">Order Online</a></h4>
            </div>

            <div class="footer-div">
                <h3>Contact Us</h3>
                <h4>Cellphone: (+63) 912-345-6789</h4>
                <h4>Telephone: (02) 123-4567</h4>
                <h4>Email: hygge_testemail@gmail.com</h4>

                <br>

                <h3>Follow Us</h3>
                <span>
                    <i class="fa-brands fa-square-facebook"></i>
                    <i class="fa-brands fa-square-instagram"></i>
                    <i class="fa-brands fa-tiktok"></i>
                </span>
            </div>
        </div>

    </footer>
</body>

</html>