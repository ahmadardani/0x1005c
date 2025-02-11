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
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  Category Name: <input type="text" name="category_name"><br><br>
  <input type="submit" name="submit" value="Add Category">
</form>
                <p><?php echo "null"; ?></p>
            </div>
        </div>
    </div>

</body>
</html>
