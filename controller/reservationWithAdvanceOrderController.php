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

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $date = date('Y-m-d', strtotime($_POST['date'] ?? ''));
    $time = $_POST['time'] ?? '';
    $num_of_people = intval($_POST['people'] ?? 0);
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    
    // ✅ Fix for "Data too long for column 'contact'"
    $contact_number = preg_replace('/\D/', '', $_POST['contact'] ?? ''); // Remove non-numeric characters
    $contact_number = substr($contact_number, 0, 15); // Limit length to 15 characters

    $transactionRef = $_POST['transactionRef'] ?? '';
    $image = isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])
        ? base64_encode(resizeImage($_FILES['image']['tmp_name'], 250, 250))
        : "no images";

    $cartItems = $_POST['cartItems'] ?? '';
    $paymentRef = $_POST['paymentRef'] ?? '';
    $transactionRef = $_POST['transactionRef'] ?? '';
    $total = floatval($_POST['total'] ?? 0);
    $message = htmlspecialchars(trim($_POST['comment'] ?? ''));

    if (checkFullReservation($conn, $date, $time)) {
        header("Location: ../pages/adv-order-payment.php?error=2");
        exit;
    }
    
    if (checkTimeReservation($conn, $date, $time, $num_of_people)) {
        header("Location: ../pages/adv-order-payment.php?error=3");
        exit;
    }

    $qry = "INSERT INTO `reservations_with_adv_order_tbl`
        (`name`, `date`, `time`, `people`, `email`, `contact`, `message`, `paymentRef`, `orders`, `total`, `transactionRef`, `image`, `date_Created`, `status`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), 'pending')";
    
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
    exit;
}

function checkFullReservation($conn, $date, $time) {
    $qry = "SELECT SUM(`number_of_people`) AS total FROM reservations_tbl WHERE date = ? AND time = ?";
    $stmt = $conn->prepare($qry);
    $stmt->bindParam(1, $date);
    $stmt->bindParam(2, $time);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return ($result['total'] ?? 0) >= 24;
}

function checkTimeReservation($conn, $date, $time, $num_of_people) {
    $qry = "SELECT SUM(`number_of_people`) AS total FROM reservations_tbl WHERE date = ? AND time = ?";
    $stmt = $conn->prepare($qry);
    $stmt->bindParam(1, $date);
    $stmt->bindParam(2, $time);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $currentTotal = $result['total'] ?? 0;

    return ($currentTotal + $num_of_people) > 25;
}

function checkAvailablePaxPerTime($date) {
    include "../database/connection.php";
    $times = ['12:00 PM', '2:00 PM', '4:00 PM', '6:00 PM', '8:00 PM', '10:00 PM'];

    foreach ($times as $time) {
        $qry = "SELECT SUM(`number_of_people`) AS total FROM reservations_tbl WHERE date = ? AND time = ?";
        $stmt = $conn->prepare($qry);
        $stmt->bindParam(1, $date);
        $stmt->bindParam(2, $time);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (($result['total'] ?? 0) >= 24) {
            echo "<option value='$time' disabled>$time</option>";
        } else {
            echo "<option value='$time'>$time</option>";
        }
    }
}

$action = $_GET['action'] ?? null;
$date = $_GET['date'] ?? null;

if ($action == "checkAvailablePaxPerTime" && $date) {
    checkAvailablePaxPerTime($date);
}
?>
