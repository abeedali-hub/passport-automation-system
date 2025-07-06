<?php
session_start();
include "db.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $given_name = $_POST["givenName"];
    $surname = $_POST["surname"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $login_id = $_POST["loginId"];
    $password = $_POST["password"];
    $hint_question = $_POST["hintQuestion"];
    $hint_answer = $_POST["hintAnswer"];

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Insert user data into database
    $sql = "INSERT INTO users (given_name, surname, dob, email, login_id, password_hash, hint_question, hint_answer) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $given_name, $surname, $dob, $email, $login_id, $password_hash, $hint_question, $hint_answer);

    if ($stmt->execute()) {
        echo "<script>alert('Registration Successful!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error: Could not register. Please try again.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
