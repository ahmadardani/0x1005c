<?php
require 'db.php'; // Include database connection

// Check if there is at least one category in the database
$result = $conn->query("SELECT COUNT(*) as count FROM category");
$row = $result->fetch_assoc();
$category_count = $row['count'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmarks</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css"> <!-- Link external CSS file -->
</head>
<body>

    <div class="wrapper">
        <div class="header">
            <span>Bookmarks</span>
            <div class="button-group-header">
                <?php if ($category_count > 0): ?> 
                    <a href="add_list.php"><button class="list-btn">Add List</button></a> 
                <?php endif; ?>
                <a href="add_category.php"><button class="category-btn">Add Category</button></a> 
            </div>
        </div>
        
        <div class="container">
            <div class="content">
                <p>Bookmark all of your lovely sites!</p>
            </div>
        </div>
    </div>

</body>
</html>
