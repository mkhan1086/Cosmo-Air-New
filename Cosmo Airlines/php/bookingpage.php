<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $flight_type = $_POST['flight_type'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
    $departure_date = $_POST['departure_date'];

    $stmt = $conn->prepare("INSERT INTO bookings (user_id, flight_type, departure, arrival, departure_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $flight_type, $departure, $arrival, $departure_date);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error processing booking']);
    }
}
?>
