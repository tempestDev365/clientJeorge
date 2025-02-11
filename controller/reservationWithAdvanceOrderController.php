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
    $image = $_POST['image'] ?? "";
    $cartItems = $_POST['cartItems'];
    $paymentRef = $_POST['paymentRef'];
    $transactionRef = $_POST['transactionRef'];

    if(checkFullReservation($conn, $date)){
        echo "<script>alert('Reservation Full!')</script>";
        header("Location: ../pages/reservation.php?error=2");
        return;
    }
    if(checkTimeReservation($conn, $date, $time, $num_of_people)){
        echo "<script>alert('Reservation Full!')</script>";
        header("Location: ../pages/reservation.php?error=3");
        return;
    }



}
function checkFullReservation($conn, $date){
    $qry = "SELECT sum(`number_of_people`) as total FROM reservations_tbl WHERE date = ?";
    $stmt = $conn->prepare($qry);
    $stmt->bindParam(1, $date);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result['total'] >= 25){
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
    if($result['total'] + $num_of_people >= 5){
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

        if($result['total'] >= 5){
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