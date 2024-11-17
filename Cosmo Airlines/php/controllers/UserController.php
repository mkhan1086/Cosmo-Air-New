<?php
header('Content-Type: application/json');
include '../db_connection.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $id_number = $_POST['id_number'] ?? '';
    $email = $_POST['email'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt the password

    // Check for existing user
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(['success' => false, 'error' => 'Email already exists']);
        exit;
    }

    // Insert new user into the database
    $stmt = $conn->prepare("INSERT INTO users (name, surname, id_number, email, contact, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $surname, $id_number, $email, $contact, $password);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Registration failed']);
    }

    $stmt->close();
    $conn->close();
}
?>
