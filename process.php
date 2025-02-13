<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = trim($_POST["category_name"]); // Sanitize input

    if (!empty($category_name)) {
        // Use prepared statement for security
        $stmt = $conn->prepare("INSERT INTO category (name) VALUES (?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error); // Show error if prepare fails
        }

        $stmt->bind_param("s", $category_name);
        if ($stmt->execute()) {
            header("Location: add_category.php?success=1"); // Redirect with success message
            exit();
        } else {
            die("Execute failed: " . $stmt->error); // Show error if execution fails
        }

        $stmt->close();
    } else {
        header("Location: add_category.php?empty=1"); // Redirect if empty
        exit();
    }
}

$conn->close();
?>
