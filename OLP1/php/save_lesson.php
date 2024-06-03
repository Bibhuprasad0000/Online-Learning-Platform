<?php
require("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    
    $stmt = $db->prepare("INSERT INTO lessons (course_id, title, content) VALUES (?, ?, ?)");
 
    $stmt->bind_param("iss", $course_id, $title, $content);
    
    
    if ($stmt->execute()) {
        echo "New lesson added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    
    $stmt->close();
    $db->close();
}
?>
