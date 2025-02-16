<?php
function getOnlineOrder(){
    include '../database/connection.php';
    $qry = "SELECT * FROM online_order_tbl";
    $stmt = $conn->prepare($qry);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
$orders = getOnlineOrder();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Order</title>

    <!--BOOTSTRAP CDN CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <!--DATA TABLES CDN CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
    
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
                    <li class="breadcrumb-item active" aria-current="page">Online Order</li>
                </ol>
            </nav>

            <div class="container shadow p-3 bg-light rounded-3">
                <table class="table table-striped table-hover table-bordered dt-responsive nowrap" id="table">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>DATE CREATED</th>
                            <th>NAME</th>
                            <th>ADDRESS</th>
                            <th>EMAIL</th>
                            <th>CONTACT</th>
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
                        foreach($orders as $order){
                            $items = json_decode($order['orders'], true);
                            echo '<tr>';
                            echo '<td>'.$order['id'].'</td>';
                            echo '<td>'.$order['date_Created'].'</td>';
                            echo '<td>'.$order['name'].'</td>';
                            echo '<td>'.$order['address'].'</td>';
                            echo '<td>'.$order['email'].'</td>';
                            echo '<td>'.$order['contact'].'</td>';
                            echo '<td>'.$order['message'].'</td>';
                            echo '<td><button class="btn" data-bs-toggle="modal" data-bs-target="#viewImg" onclick = "viewImage('.$order['id'].')" >view</button></td>';
                            echo '<td>'.$order['paymentRef'].'</td>';
                             echo "<td> <ul>
                             <li>Order List</li>";
                            foreach($items['items'] as $orders){
                                echo "<li>".$orders['name']." x ".$orders['quantity']." ".$orders['price']."</li>";
                            }
                            echo "</ul></td>
                            "; 
                            echo '<td>'.$order['total'].'</td>';
                            echo '<td>'.$order['transactionRef'].'</td>';
                            echo '<td>'.$order['status'].'</td>';
                            echo '<td>';
                            echo '<a href = "../controller/adminController.php?id='.$order['id'].'&action=onlineOrderApproved" class="btn btn-sm btn-success">APPROVE</a>';
                            echo '<a href = "../controller/adminController.php?id='.$order['id'].'&action=onlineOrderRejected" class="btn btn-sm btn-danger">CANCEL</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    

    <div class="modal fade" id="viewImg" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" alt="food" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


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
            responsive: true
        });
        async function viewImage(id){
            const response = await fetch(`../controller/viewController.php?id=${id}&action=onlineOrderViewImage`);
            const data = await response.json();
            populateImage(data.image);
        }
        function populateImage(data){
            const img = document.querySelector('#viewImg img');
            img.src = `data:image/jpeg;base64,${data}`;
        }
    </script>

    <!--NAVIGATION JS-->
    <script src="./layout/nav.js"></script>

</body>
</html>


