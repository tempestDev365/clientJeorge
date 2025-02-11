<?php
include "../database/connection.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];
    $image = base64_encode($_POST['image']);
    $paymentRef = $_POST['paymentRef'];
    $orders = $_POST['orders'];
    $total = $_POST['total'];
    $transactionRef = $_POST['transactionRef'];
   $qry = "INSERT INTO `online_order_tbl`(`name`, `address`, `email`, `contact`, `image`, `paymentRef`, `orders`, `total`, `transactionRef`, `date_Created`) 
   VALUES (?,?,?,?,?,?,?,?,?,NOW())";
   $stmt = $conn->prepare($qry);
   $stmt->bindParam(1,$name);
    $stmt->bindParam(2,$address);
    $stmt->bindParam(3,$email);
    $stmt->bindParam(4,$contact);
    $stmt->bindParam(5,$image);
    $stmt->bindParam(6,$paymentRef);
    $stmt->bindParam(7,$orders);
    $stmt->bindParam(8,$total);
    $stmt->bindParam(9,$transactionRef);
    $stmt->execute();
    header("Location: ../pages/transaction-processing.php");
    
}
?>