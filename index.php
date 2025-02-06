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

    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="icon" href="img/logo.png">
    <title>HYGGE Restaurant</title>


</head>

<body>

    <!-------------Nav Section------------->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a href="index.php">
                <img src="img/logo.png" class="img-fluid" alt="Smooth Day">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-center " id="navbarText">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about-section">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/menu.php">MENU</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contact-section">CONTACT US</a>
                    </li>
                </ul>
            </div>

            <button class="reserve-btn">
                <a href="/pages/reservation.php">Reserve a Table</a>
            </button>

        </div>
    </nav>



    <!-------------Hero Section------------->
    <section class="container-fluid hero-section">
        <div class="hero-text">
            <h1>Elevate Your Dining Experience</h1>
            <p>Experience the warmth of home with the taste of something extraordinary.</p>
            <div class="hero-buttons">
                <a href="/pages/reservation.html" class="reserve-btn">Reserve a Table</a>
                <a href="/pages/menu.html" class="order-btn">Order Online</a>
            </div>
        </div>
        <div class="hero-image ">
            <img src="/img/food-image.jpg" class="img img-fluid" alt="Delicious food">
        </div>
    </section>



    <!-------------About Us Section------------->
    <section class="about-section" id="about-section">
        <div class="image-gallery">
            <img src="img/aboutus-image.png" alt="Hygge restaurant front">

        </div>
        <div class="about-content">
            <h2>About Us</h2>
            <hr>
            <p>Welcome to Hygge Restaurant, where warmth, comfort, and great food come together. Inspired by the Danish
                concept of hygge—a feeling of coziness and well-being—we create a relaxed dining experience with
                delicious, thoughtfully prepared dishes.</p>
            <p>Whether you're here for a casual meal or a special occasion, our inviting ambiance and friendly service
                will make you feel right at home. Come and savor the simple joys of good food and great company at Hygge
                Restaurant.</p>

            <div class="visit-us">
                <h2>Visit Us</h2>
                <hr>
                <p>Rosario Commercial Lane, Rosario Avenue, Rosario Complex, San Pedro City, Laguna 4023</p>
                <p>Opens Monday - Sunday</p>
                <p>Time: 11:00am - 11:00pm</p>
            </div>
        </div>
    </section>



    <!-------------Options Section------------->
    <section class="options-section">
        <div class="options-div">
            <a href="/pages/reservation.php">
                <div class="option-card">
                    <i class="fas fa-utensils"></i>
                    <h3>BOOK A TABLE</h3>
                    <p>Make a reservation in our restaurant.</p>
                </div>
            </a>
            <a href="/pages/adv-order-menu.php">
                <div class="option-card">
                    <i class="fas fa-concierge-bell"></i>
                    <h3>ADVANCE ORDER</h3>
                    <p>Make a reservation with advance order</p>
                </div>
            </a>
            <a href="/pages/menu.php">
                <div class="option-card">
                    <i class="fas fa-shopping-cart"></i>
                    <h3>ORDER ONLINE</h3>
                    <p>Delivery your food at home.</p>
                </div>
            </a>
           
            <a href="#contact-section">
                <div class="option-card">
                    <i class="fas fa-phone"></i>
                    <h3>CONTACTS</h3>
                    <p>Contact us for further information.</p>
                </div>
            </a>
        </div>
    </section>



    <!-------------Signature Dishes Section------------->
    <section class="signature-dishes-section">
        <div class="signature-dishes-header">
            <div class="dish-header-div">
                <h1>SIGNATURE DISHES</h1>
                <a href="menu.html" class="signature-dishes-menu-btn">MENU</a>
            </div>
            <hr>
            <p>"A Symphony of Flavors, Crafted to Perfection."</p>

        </div>
        <div class="dishes-container">
            <div class="dish-card">
                <img src="img/SD1.jpg" alt="Crispy Fried Enoki">
            </div>
            <div class="dish-card">
                <img src="img/SD2.jpg" alt="Cereal Tres Leches">

            </div>
            <div class="dish-card">
                <img src="img/SD3.jpg" alt="Grilled Pork Chops">

            </div>
            <div class="dish-card">
                <img src="img/SD4.jpg" alt="Oven Baked Ribs">

            </div>
            <div class="dish-card">
                <img src="img/SD5.jpg" alt="Quattro Formaggi Pizza">

            </div>
            <div class="dish-card">
                <img src="img/SD6.jpg" alt="Slow Roasted Angus Beef">

            </div>
            <div class="dish-card">
                <img src="img/SD7.jpg" alt="Grilled Pork Belly">

            </div>
            <div class="dish-card">
                <img src="img/SD8.jpg" alt="Grilled Pork Belly">

            </div>
        </div>
    </section>



    <!-----------Reservation Section-------------->
    <section class="reservation-delivery-section">
        <div class="reservation-section">
            <div class="content">
                <h1>Ready to Dine in?</h1>
                <p>We got you.</p>
                <a href="reservation.html" class="btn">Reserve a Table</a>
            </div>
            <div class="image-dine-in">
                <img src="img/dinein.jpg" alt="Hygge Restaurant Sign">
            </div>
        </div>

        <div class="delivery-section">
            <div class="image-reservation">
                <img src="img/delivery.jpg" alt="Food Delivery Options">
            </div>
            <div class="content">
                <h1>Tired of going out?</h1>
                <p>We also have delivery.</p>
                <a href="menu.html" class="btn">Order Online</a>
            </div>
        </div>
    </section>



    <!-------------Reviews Section------------->
    <section class="review-section">
        <div class="reviews-container">
            <div class="header-review">
                <h1>CUSTOMER REVIEWS</h1>
                <div class="stars">★★★★★</div>
            </div>
            <hr>
            <p class="subtitle">“We appreciate you more than words can express! Thank you for allowing us to be a
                part of your dining experiences.”</p>

            <div class="reviews">
                <div class="review-card">
                    <h3>JUAN DELA CRUZ</h3>
                    <p>“Amazing food and great ambiance! Will definitely come back.”</p>
                </div>
                <div class="review-card">
                    <h3>MARY REYES</h3>
                    <p>“Friendly staff and cozy atmosphere—perfect for a date night.”</p>
                </div>
                <div class="review-card">
                    <h3>RALPH MUDIO</h3>
                    <p>“Loved the flavors! Everything was fresh and delicious.”</p>
                </div>
                <div class="review-card">
                    <h3>FRED RIVERA</h3>
                    <p>“Clean restaurant, great vibes, and outstanding food!”</p>
                </div>
            </div>

        </div>
    </section>

    <!-------------Contacts and Map Section------------->
    <section class="contact-section" id="contact-section">
        <div class="contact-container">
            <div class="map-section">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.5725765493876!2d121.04313918540468!3d14.336242547720127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d72d51d5da87%3A0xb830b1dac44dd913!2sHygge%20Restaurant!5e0!3m2!1sen!2sph!4v1737797075908!5m2!1sen!2sph"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <p>Rosario Commercial Lane, Rosario Avenue, Rosario Complex, San Pedro City, Laguna 4023
                </p>
            </div>
            <div class="contact-details">
                <h2>KEEP IN TOUCH WITH US</h2>
                <hr>
                <p>
                    <i class="fa-solid fa-mobile-screen"></i> (+63) 912-3456-789<br>
                    <i class="fa-solid fa-phone"></i>(02) 123-4567<br>
                    <i class="fa-solid fa-envelope"></i><a href="/">hygge_testemail@gmail.com</a>
                </p>
                <div class="social-icons">
                    <a href="/" title="Facebook"><i class="fa-brands fa-square-facebook"></i></a>
                    <a href="/" title="Instagram"><i class="fa-brands fa-square-instagram"></i></a>
                    <a href="/" title="Tiktok"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
        </div>
    </section>



    <!--------- Footer Section ------------->
    <footer class="footer-section">
        <div class="footer-content-div">
            <div class="footer-div">
                <h3>Restaurant</h3>
                <h4>Rosario Commerical Lane, Rosario Avenue, Rosario Complex, San Pedro City, Laguna 4023
                </h4>
                <h4>Opens Monday - Sunday</h4>
                <h4>Time: 11:00am - 11:00pm</h4>
                <img src="img/logo.png" alt="" class="img img-fluid">
            </div>

            <div class="footer-div">
                <h3>Quick Links</h3>
                <h4><a href="index.php">Home</a></h4>
                <h4><a href="#about-section">About Us</a></h4>
                <h4><a href="menu.php">Menu</a></h4>
                <h4><a href="#contact-section">Contact Us</a></h4>
            </div>

            <div class="footer-div">
                <h3>Services</h3>
                <h4><a href="pages/reservation.php">Reserve a Table</a></h4>
                <h4><a href="pages/menu.php">Order Online</a></h4>
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