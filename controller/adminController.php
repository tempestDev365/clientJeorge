<?php
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
include './mailerController.php';
function reservationApproved($id){
    include '../database/connection.php';
     $getReservationData = "SELECT * FROM reservations_tbl WHERE id = '$id'";
     $result = $conn->query($getReservationData);
    $row = $result->fetch();
    sendMail($row['email_address'],$row['name'],
    $row['date'],$row['time'],0,"none",$row['transactionRef'],0);
    $qry = "UPDATE reservations_tbl SET status = 'Approved' WHERE id = '$id'";
    $conn->query($qry);
}
function rejectReservation($id){
    include '../database/connection.php';
    $qry = "UPDATE reservations_tbl SET status = 'Rejected' WHERE id = '$id'";
    $conn->query($qry);
}

function reservationWithAdvOrderApproved($id){
    include '../database/connection.php';
    $getReservationData = "SELECT * FROM reservations_with_adv_order_tbl WHERE id = '$id'";
    $result = $conn->query($getReservationData);
    $row = $result->fetch();
    sendMail($row['email'],$row['name'],
    $row['date'],$row['time'],$row['people'],$row['orders'],$row['transactionRef'],$row['total']);
    $qry = "UPDATE reservations_with_adv_order_tbl SET status = 'Approved' WHERE id = '$id'";
    $conn->query($qry);
}
function reservationWithAdvOrderRejected($id){
    include '../database/connection.php';
    $qry = "UPDATE reservations_with_adv_order_tbl SET status = 'Rejected' WHERE id = '$id'";
    $conn->query($qry);
}
function onlineOrderApproved($id){
    include '../database/connection.php';
    $getOrderData = "SELECT * FROM online_order_tbl WHERE id = '$id'";
    $result = $conn->query($getOrderData);
    $row = $result->fetch();
    sendMail($row['email'],$row['name'],"none","none","none",$row['orders'],$row['transactionRef'],$row['total']);
    $qry = "UPDATE online_order_tbl SET status = 'Approved' WHERE id = '$id'";
    $conn->query($qry);
}
function onlineOrderRejected($id){
    include '../database/connection.php';
    $qry = "UPDATE online_order_tbl SET status = 'Rejected' WHERE id = '$id'";
    $conn->query($qry);
}

if($action == 'revesevationrejected'){
    rejectReservation($id);
    header("Location: ../admin/reservation.php");
}
if($action == 'reveservationapproved'){
    reservationApproved($id);
    header("Location: ../admin/reservation.php");
}
if($action == 'reservationAdvOrderApproved'){
    reservationWithAdvOrderApproved($id);
    header("Location: ../admin/reservation-w-adv-order.php");
}
if($action == 'reservationAdvOrderRejected'){
    reservationWithAdvOrderRejected($id);
    header("Location: ../admin/reservation-w-adv-order.php");
}
if($action == 'onlineOrderApproved'){
    onlineOrderApproved($id);
    header("Location: ../admin/online-order.php");
}
if($action == 'onlineOrderRejected'){
    onlineOrderRejected($id);
    header("Location: ../admin/online-order.php");
}
?>