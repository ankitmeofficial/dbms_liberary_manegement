<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
<link rel="stylesheet" href="styles.css">
</head>
<style>
.logo {
        text-align: center;
        font-size: xx-large;
        margin: 29px;
        background: linear-gradient(270deg, #df8908 50.41%, #8415ff 90.25%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }


body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    width: 50%;
    margin: auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    margin-top: 50px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

h2 {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input, select, button {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

#result {
    margin-top: 20px;
    padding: 10px;
    background-color: #e9ecef;
    border-radius: 5px;
    display: none;
}



</style>
<body>
<header>
        <nav>
            <div class="logo">Liberary management or more</div>
            <ul class="nav-links">
                <li><a href="welcome.php">Home</a></li>
                <li><a href="online_book.html">Online_Books</a></li>
                <li><a href="Liberary_Book_record.html">Liberary_Book_record</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="about.html"></a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Library Book Allocation</h1>
        <h2>Allocate Book</h2>
        <form id="allocationForm">
            <div class="form-group">
                <label for="studentName">Student Name:</label>
                <input type="text" id="studentName" name="studentName" required>
            </div>
            <div class="form-group">
                <label for="studentId">Student ID:</label>
                <input type="text" id="studentId" name="studentId" required>
            </div>
            <div class="form-group">
                <label for="branchSelect">Select Branch:</label>
                <select id="branchSelect" name="branchSelect" required>
                    <option value="" disabled selected>Select a branch</option>
                    <option value="branch1">Branch 1</option>
                    <option value="branch2">Branch 2</option>
                    <option value="branch3">Branch 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bookSelect">Select Book:</label>
                <select id="bookSelect" name="bookSelect" required>
                    <option value="" disabled selected>Select a book</option>
                    <!-- Books will be added dynamically -->
                </select>
            </div>
            <button type="submit">Allocate Book</button>
        </form>
        <h2>Add New Book</h2>
        <form id="addBookForm">
            <div class="form-group">
                <label for="newBook">Book Name:</label>
                <input type="text" id="newBook" name="newBook" required>
            </div>
            <div class="form-group">
                <label for="branchNewBook">Branch:</label>
                <select id="branchNewBook" name="branchNewBook" required>
                    <option value="" disabled selected>Select a branch</option>
                    <option value="branch1">Branch 1</option>
                    <option value="branch2">Branch 2</option>
                    <option value="branch3">Branch 3</option>
                </select>
            </div>
            <button type="submit">Add Book</button>
        </form>
        <div id="result"></div>
    </div>
    <script>

document.getElementById('allocationForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const studentName = document.getElementById('studentName').value;
    const studentId = document.getElementById('studentId').value;
    const branchSelect = document.getElementById('branchSelect').value;
    const bookSelect = document.getElementById('bookSelect').value;

    if (studentName && studentId && branchSelect && bookSelect) {
        const resultDiv = document.getElementById('result');
        resultDiv.innerHTML = `<p>Student <strong>${studentName}</strong> (ID: <strong>${studentId}</strong>) has allocated <strong>${bookSelect}</strong> from <strong>${branchSelect}</strong>.</p>`;
        resultDiv.style.display = 'block';
    }
});

document.getElementById('addBookForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const newBookName = document.getElementById('newBook').value;
    const branchNewBook = document.getElementById('branchNewBook').value;

    if (newBookName && branchNewBook) {
        const bookSelect = document.getElementById('bookSelect');
        const option = document.createElement('option');
        option.text = newBookName;
        option.value = newBookName;
        bookSelect.appendChild(option);
        document.getElementById('newBook').value = ''; // Clear input field
        alert(`Book "${newBookName}" added successfully for branch "${branchNewBook}"!`);
    }
});

    </script>


    <!-- <footer>
        <p>&copy; 2024 MyWebsite. All rights reserved.</p>
    </footer> -->
</body>
</html>
