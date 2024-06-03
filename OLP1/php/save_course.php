<?php
require("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO courses (title, description) VALUES ('$title', '$description')";
    if ($db->query($sql) === TRUE) {
        echo "New course added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
}
?>
