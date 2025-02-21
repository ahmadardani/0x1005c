<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New List</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css"> <!-- Link external CSS file -->
</head>
<body>

    <div class="wrapper">
        <div class="header">
            <span>Bookmarks</span> 
        </div>
        
        <div class="container">
            <div class="content">
                <p>Add a new link to your bookmarks!</p>
                <?php
                if (isset($_GET['success'])) echo "<p style='color: green;'>Link added successfully!</p>";
                if (isset($_GET['error'])) echo "<p style='color: red;'>Error adding link. Try again.</p>";
                if (isset($_GET['empty'])) echo "<p style='color: red;'>All fields are required.</p>";
                ?>

                <form method="post" action="process_list.php" class="form-container">
                    <label for="category">Category:</label><br><br>
                    <select id="category" name="category" class="input-field" required>
                        <option value="">-- Select Category --</option>
                        <?php
                        require 'db.php'; // Include database connection
                        $query = "SELECT id, name FROM category";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                            }
                        }
                        $conn->close();
                        ?>
                    </select>

                    <br><br><label for="link_name">Link Name:</label><br><br>
                    <input type="text" id="link_name" name="link_name" class="input-field" required>

                    <br><br><label for="link">Link:</label><br><br>
                    <input type="url" id="link" name="link" class="input-field" required>

                    <br><br><label for="details">Details:</label><br><br>
                    <textarea id="details" name="details" class="input-field" required></textarea>

                    <div class="button-group">
                        <button type="button" class="cancel-btn" onclick="window.location.href='index.php';">Cancel</button>
                        <button type="submit" name="submit" class="submit-btn">Add List</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
