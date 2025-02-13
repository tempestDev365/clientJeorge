<?php
$id = $_GET['id'] ?? null;
$action = $_GET['action'] ?? null;  
function getImageReservationsWithAdvOrder($id){
    include '../database/connection.php';
    $qry = "SELECT * FROM reservations_with_adv_order_tbl WHERE id = ?";
    $stmt = $conn->prepare($qry);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['image'];
}
function getImageOnlineOrder($id){
    include '../database/connection.php';
    $qry = "SELECT * FROM online_order_tbl WHERE id = ?";
    $stmt = $conn->prepare($qry);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['image'];
}

function getMessageReservationsWithAdvOrder($id){
    include '../database/connection.php';
    $qry = "SELECT * FROM reservations_with_adv_order_tbl WHERE id = ?";
    $stmt = $conn->prepare($qry);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['message'];
}
if($action == 'reservationWithAdvOrderViewImage'){
      header('Content-Type: application/json');
    echo json_encode(['image' => getImageReservationsWithAdvOrder($id)]);
}
if($action == 'reservationWithAdvOrderViewMessage'){
      header('Content-Type: application/json');
    echo json_encode(['message' => getMessageReservationsWithAdvOrder($id)]);
}
if($action == 'onlineOrderViewImage'){
      header('Content-Type: application/json');
    echo json_encode(['image' => getImageOnlineOrder($id)]);
}
?>