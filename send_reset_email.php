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

// Get the email from the form
$email = $_POST['email'];

// Check if email exists
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Generate a unique token
    $token = bin2hex(random_bytes(50));

    // Insert token into the database
    $sql = "UPDATE users SET reset_token='$token', reset_expires=DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        // Send email
        $reset_link = "http://yourdomain.com/reset_password.php?token=$token";
        $subject = "Password Reset";
        $message = "Click the following link to reset your password: $reset_link";
        $headers = "From: no-reply@yourdomain.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "Password reset link has been sent to your email.";
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "No account found with that email.";
}

$conn->close();
?>
