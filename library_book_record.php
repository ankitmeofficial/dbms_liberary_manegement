<?php
include 'db_connect.php';

// Fetch books from the database
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Book Record</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">Library Management or More</div>
            <ul class="nav-links">
                <li><a href="welcome.php">Home</a></li>
                <li><a href="online_book.html">Online Books</a></li>
                <li><a href="library_book_record.php">Library Book Record</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="about.html"></a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Library Book Record</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Branch</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["book_name"]. "</td><td>" . $row["branch"]. "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No books found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
