

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
    <link rel="stylesheet" type="text/css" href="../css/reservation.css" />

    <title>Reservation</title>

</head>

<body>

    <!------------Navbar Section------------->
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


    <!------------Reservation Section------------->
    <div class="reservation-container">
        <div class="image-section">
            <img src="../img/image2.jpg" class="img img-fluid" alt="">
        </div>
        <div class="form-section">
            <h2>RESERVATION</h2>
            <form id="reservation-form" method = "POST" action = "../controller/reservationController.php">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" placeholder="Enter your name" name = "name" required>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" name = "date" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <select id="time" required name ='time'>">
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="2:00 PM">2:00 PM</option>
                            <option value="4:00 PM">4:00 PM</option>
                            <option value="6:00 PM">6:00 PM</option>
                            <option value="8:00 PM">8:00 PM</option>
                            <option value="10:00 PM">10:00 PM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="people">No. of People</label>
                        <input type="text" id="people" name = "people" placeholder="Enter no. of people" required >
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" placeholder="Enter your email" name = "email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Contact Number</label>
                        <input type="text" id="contact" placeholder="Enter your contact number" name = "contact" required>
                    </div>
                </div>
                <input type="hidden" name = "transactionRef" id = "transactionRef" value = "">

                <a href="transaction-processing.php">
                    <button type="submit" class="btn-book-a-table">BOOK A TABLE ONLY</button>
                </a>
               
            </form>
            <a href="adv-order-menu.php">
                <button type="button" class="btn-with-adv-order">BOOK WITH ADVANCE ORDER</button>
            </a>
        </div>
    </div>

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
<script src  = "../script/reservation.js"></script>
    <script>
        const numberOfPeople = document.querySelector('#people')
        numberOfPeople.addEventListener('input', function () {
           if(this.value > 24){
                alert('Sorry, we only accept reservation for 24 people and below.')
                this.value = ''
           }
        })
        const errorParams = new URLSearchParams(window.location.search).get('error')
        const successParams = new URLSearchParams(window.location.search).get('success')
        if(errorParams == 2){
            alert('Reservation Full!')
            window.history.replaceState(null, null, window.location.pathname)
        }
        if(successParams == 1){
            alert('Reservation Successful!')
            window.history.replaceState(null, null, window.location.pathname)
        }
        if(errorParams == 3){
            alert('The limit of per time is 5 pax you might have gone beyond the limit!')
            window.history.replaceState(null, null, window.location.pathname)
        }
        document.getElementById('date').addEventListener('change', async function() {
             const date = this.value
             const api = await fetch(`../controller/reservationController.php?date=${date}&action=checkAvailablePaxPerTime`)
             const data = await api.text()
                document.getElementById('time').innerHTML = data
        });
        const form = document.getElementById('reservation-form')
const transactionRef =document.getElementById('transactionRef')
function generateTransactionRef() {
  const randomNum = Math.floor(Math.random() * 1000000);
  transactionRef.value = `#RSV${randomNum}`;
}
form.addEventListener('submit', generateTransactionRef());
    </script>

</body>

</html>