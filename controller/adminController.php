<?php
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
include './mailerController.php';
function reservationApproved($id){
    include '../database/connection.php';
     $getReservationData = "SELECT * FROM reservations_tbl WHERE id = '$id'";
     $result = $conn->query($getReservationData);
    $row = $result->fetch();
    sendMail($row['email'],$row['name'],
    $row['date'],$row['time'],"none",$row['transaction_ref'],0);
    $qry = "UPDATE reservations_tbl SET status = 'Approved' WHERE id = '$id'";
    $conn->query($qry);
}
function rejectReservation($id){
    include '../database/connection.php';
    $qry = "UPDATE reservations_tbl SET status = 'Rejected' WHERE id = '$id'";
    $conn->query($qry);
}

if($action == 'revesevationrejected'){
    rejectReservation($id);
}
if($action == 'reveservationapproved'){
    reservationApproved($id);
}
?>