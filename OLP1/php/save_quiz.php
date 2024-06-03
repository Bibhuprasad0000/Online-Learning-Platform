<?php
require("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $questions = $_POST['questions'];

    $sql = "INSERT INTO quizzes (course_id, title, questions) VALUES ('$course_id', '$title', '$questions')";
    if ($db->query($sql) === TRUE) {
        echo "New quiz added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
}
?>
