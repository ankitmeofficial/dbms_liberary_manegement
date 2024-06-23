<form id="addBookForm" action="add_book.php" method="POST">
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
