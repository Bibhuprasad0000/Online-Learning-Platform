<?php
require("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO assignments (course_id, title, description) VALUES ('$course_id', '$title', '$description')";
    if ($db->query($sql) === TRUE) {
        echo "New assignment added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
}
?>
