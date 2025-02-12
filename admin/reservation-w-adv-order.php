<?php
function getReservationsWithAdvOrder(){
    include '../database/connection.php';
    $qry = "SELECT * FROM reservations_with_adv_order_tbl";
    $result = $conn->query($qry);
    return $result;
}
$reservations = getReservationsWithAdvOrder();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation With Advance Order</title>

    <!--BOOTSTRAP CDN CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--DATA TABLES CDN CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">

    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="./assets/main.css">

</head>
<body>

    <!--PARENT CONTAINER-->
    <div class="main-container d-flex" style="min-height: 100vh;">

        <!--SIDEBAR-->
        <aside class="sidebar"></aside>



        <!--MAIN CONTENT-->
        <main class="flex-grow-1 p-3 text-white" style="background-color: #C6953B;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Reservation With Advance Order</li>
                </ol>
            </nav>

            <div class="container shadow p-3 bg-light rounded-3" style="overflow-x: auto; max-height: 80vh;">
                    <table class="table table-striped table-hover table-bordered dt-responsive nowrap" id="table">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>ID</th>
                                <th>DATE CREATED</th>
                                <th>NAME</th>
                                <th>DATE</th>
                                <th>TIME</th>
                                <th>PEOPLE</th>
                                <th>CONTACT</th>
                                <th>EMAIL</th>
                                <th>MESSAGE</th>
                                <th>IMAGE</th>
                                <th>PAYMENT REF</th>
                                <th>ORDERS</th>
                                <th>TOTAL</th>
                                <th>TRANSACTION REF</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        foreach($reservations as $row){
                            $orders = json_decode($row['orders'],true);
                            
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['date_Created']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['date']."</td>";
                            echo "<td>".$row['time']."</td>";
                            echo "<td>".$row['people']."</td>";
                            echo "<td>".$row['contact']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo '<td><button class="btn" data-bs-toggle="modal" data-bs-target="#viewMessage" >view</button></td>';
                            echo '<td><button class="btn" data-bs-toggle="modal" data-bs-target="#viewImg" >view</button></td>';
                            echo "<td>".$row['paymentRef']."</td>";
                            echo "<td> <ul>
                             <li>Order List</li>";
                            foreach($orders['items'] as $order){
                                echo "<li>".$order['name']." x ".$order['quantity']." ".$order['price']."</li>";
                            }
                            echo "</ul></td>

                            ";    
                            echo "<td>".$row['total']."</td>";
                            echo "<td>".$row['transaction_ref']."</td>";
                            echo "<td>".$row['status']."</td>";
                            echo "<td>";
                            echo "<button class='btn btn-sm btn-success'>APPROVE</button>";
                            echo "<button class='btn btn-sm btn-danger'>CANCEL</button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                            ?>
                        </tbody>
                    </table>
            </div>
        </main>
    </div>


    <!--modal-->
    <div class="modal fade" id="viewMessage" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Message here</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewImg" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="../img/dinein.jpg" alt="food" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--modal end-->




    <!--BOOTSTRAP CDN JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--DATA TABLES CDN JS-->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>

    <!--NAVIGATION JS-->
    <script src="./layout/nav.js"></script>

    <script>
       new DataTable('#table', {
        responsive: true,
        autoWidth: false,
        columnDefs: [
        { targets: "_all", className: "text-wrap" } // Ensures text wraps
    ]
});
    </script>

</body>
</html>