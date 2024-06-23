<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the token and new password from the form
$token = $_POST['token'];
$new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Verify token and update password
$sql = "SELECT * FROM users WHERE reset_token='$token' AND reset_expires > NOW()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sql = "UPDATE users SET password='$new_password', reset_token=NULL, reset_expires=NULL WHERE reset_token='$token'";
    if ($conn->query($sql) === TRUE) {
        echo "Your password has been reset successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid or expired token.";
}

$conn->close();
?>
