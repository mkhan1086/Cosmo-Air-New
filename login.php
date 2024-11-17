<?php
header('Content-Type: application/json');
include '../db_connection.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'error' => 'Email and password are required.']);
        exit;
    }

    // Check if the user exists in the database
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        echo json_encode(['success' => false, 'error' => 'Invalid email or password.']);
        exit;
    }

    // User exists, now check if the password matches
    $stmt->bind_result($user_id, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        // Password matches, login successful
        echo json_encode(['success' => true]);
    } else {
        // Incorrect password
        echo json_encode(['success' => false, 'error' => 'Invalid email or password.']);
    }

    $stmt->close();
    $conn->close();
}
?>
