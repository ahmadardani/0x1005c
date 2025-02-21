<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link_name = trim($_POST["link_name"]);
    $link = trim($_POST["link"]);
    $details = trim($_POST["details"]);

    // Validate input
    if (!empty($link_name) && !empty($link) && !empty($details)) {
        // Use prepared statements for security
        $stmt = $conn->prepare("INSERT INTO list (link_name, link, details) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error); // Show error if prepare fails
        }

        $stmt->bind_param("sss", $link_name, $link, $details);
        if ($stmt->execute()) {
            header("Location: add_list.php?success=1"); // Redirect with success message
            exit();
        } else {
            die("Execute failed: " . $stmt->error); // Show error if execution fails
        }

        $stmt->close();
    } else {
        header("Location: add_list.php?empty=1"); // Redirect if empty
        exit();
    }
}

$conn->close();
?>
