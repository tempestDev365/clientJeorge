<?php
include "../database/connection.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    $time = $_POST['time'];
    $num_of_people = $_POST['people'];
    $email = $_POST['email'];
    $contact_number  = $_POST['contact'];
    $transactionRef = $_POST['transactionRef'];
    $image = base64_encode($_POST['image']) ?? "";
    $cartItems = $_POST['cartItems'];
    $paymentRef = $_POST['paymentRef'];
    $transactionRef = $_POST['transactionRef'];
    $total = $_POST['total'];
    $message = $_POST['comment'];
    if(checkFullReservation($conn, $date, $time)){
      header("Location: ../pages/adv-order-payment.php?error=2");
        return;
    }
    if(checkTimeReservation($conn, $date, $time, $num_of_people)){
        header("Location: ../pages/adv-order-payment.php?error=3");
        return;
    }
   $qry = "INSERT INTO `reservations_with_adv_order_tbl`( `name`, `date`, `time`, `people`, `email`, `contact`, `message`, `paymentRef`, `orders`, `total`, `transactionRef`, `image`, `date_Created`)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
    $stmt = $conn->prepare($qry);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $date);
    $stmt->bindParam(3, $time);
    $stmt->bindParam(4, $num_of_people);
    $stmt->bindParam(5, $email);
    $stmt->bindParam(6, $contact_number);
    $stmt->bindParam(7, $message);
    $stmt->bindParam(8, $paymentRef);
    $stmt->bindParam(9, $cartItems);
    $stmt->bindParam(10, $total);
    $stmt->bindParam(11, $transactionRef);
    $stmt->bindParam(12, $image);
    $stmt->execute();
    header("Location: ../pages/transaction-processing.php?transactionRef=$transactionRef");


}
function checkFullReservation($conn, $date, $time){
    $qry = "SELECT sum(`number_of_people`) as total FROM reservations_tbl WHERE date = ? AND time = ?";
    $stmt = $conn->prepare($qry);
    $stmt->bindParam(1, $date);
    $stmt->bindParam(2, $time);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result['total'] >= 24){
        return true;
    }else{
        return false;
    }
}
function checkTimeReservation($conn, $date, $time, $num_of_people){
    $qry = "SELECT sum(`number_of_people`) as total FROM reservations_tbl WHERE date = ? AND time = ?";
    $stmt = $conn->prepare($qry);
    $stmt->bindParam(1, $date);
    $stmt->bindParam(2, $time);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result['total'] + $num_of_people > 25){
        return true;
    }else{
        return false;
    }
}

function checkAvailablePaxPerTime($date){
    include "../database/connection.php";
    $times = ['12:00 PM', '2:00 PM', '4:00 PM', '6:00 PM', '8:00 PM', '10:00 PM'];

    foreach($times as $time){
        $qry = "SELECT sum(`number_of_people`) as total FROM reservations_tbl WHERE date = ? AND time = ?";
        $stmt = $conn->prepare($qry);
        $stmt->bindParam(1, $date);
        $stmt->bindParam(2, $time);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
            header("Content-Type: application/json");

        if($result['total'] >= 24){
            echo "<option value='$time' disabled>$time</option>";

        }else{
            echo "<option value='$time'>$time</option>";
        }
       
    }
    
}
$action = $_GET['action'];
$date = $_GET['date'];

 if($action == "checkAvailablePaxPerTime"){
    checkAvailablePaxPerTime($date);
}
?>