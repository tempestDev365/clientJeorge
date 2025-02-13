<?php
include "../database/connection.php";
function resizeImage($file, $max_width, $max_height) {
    list($width, $height) = getimagesize($file);
    $ratio = $width / $height;

    if ($max_width / $max_height > $ratio) {
        $max_width = $max_height * $ratio;
    } else {
        $max_height = $max_width / $ratio;
    }

    $src = imagecreatefromstring(file_get_contents($file));
    $dst = imagecreatetruecolor($max_width, $max_height);

    imagecopyresampled($dst, $src, 0, 0, 0, 0, $max_width, $max_height, $width, $height);

    ob_start();
    imagejpeg($dst);
    $data = ob_get_contents();
    ob_end_clean();

    imagedestroy($src);
    imagedestroy($dst);

    return $data;
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];
    $image = isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name']) ? base64_encode(resizeImage($_FILES['image']['tmp_name'],250,250)) : "no images";
    $paymentRef = $_POST['paymentRef'];
    $orders = $_POST['orders'];
    $total = $_POST['total'];
    $transactionRef = $_POST['transactionRef'];
   $qry = "INSERT INTO `online_order_tbl`(`name`, `address`, `email`, `contact`, `image`, `paymentRef`, `orders`, `total`, `transactionRef`, `date_Created`,`status`) 
   VALUES (?,?,?,?,?,?,?,?,?,NOW(), 'pending')";
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