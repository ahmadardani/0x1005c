<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Category</title>
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
                <p>Create a new category based on your interest!</p>
                <?php
                if (isset($_GET['success'])) echo "<p style='color: green;'>Category added successfully!</p>";
                if (isset($_GET['error'])) echo "<p style='color: red;'>Error adding category. Try again.</p>";
                if (isset($_GET['empty'])) echo "<p style='color: red;'>Category name cannot bet empty.</p>";
                ?>
                <form method="post" action="process.php" class="form-container">
                    <label for="category_name">Category Name:</label><br><br>
                    <input type="text" id="category_name" name="category_name" class="input-field" required>

                    <div class="button-group">
                        <button type="button" class="cancel-btn" onclick="window.location.href='index.php';">Cancel</button>
                        <button type="submit" name="submit" class="submit-btn">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
