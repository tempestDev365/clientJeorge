let nav = document.querySelector('.sidebar');
console.log("running");

if (nav) {
    nav.innerHTML = `
    <aside class="shadow-sm sidebar" style="min-height: 100vh; width: 20rem; background-color: #252525;">
            <div class="navbar navbar-expand-sm p-3 flex-column">

                <!--LOGO-->
                <div class="navbar-brand">
                    <img src="../img/logo.png" alt="logo" class="img-fluid rounded-3">
                </div>

                <!--NAVIGATION-->
                <nav>
                    <ul class="ul nav navbar-nav">
                        <li class="nav-item">
                            <a href="./reservation.php" class="nav-link text-light">Reservation</a>
                        </li>
                        <li class="nav-item">
                            <a href="./reservation-w-adv-order.php" class="nav-link text-light">Reservation Advance Order</a>
                        </li>
                        <li class="nav-item">
                            <a href="./online-order.php" class="nav-link text-light">Online Order</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>    
    `;
}