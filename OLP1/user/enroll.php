<?php
session_start();
require("../php/db.php");

if (!isset($_SESSION['user_id'])) {
    echo "not_logged_in";
    exit();
}

if (!isset($_POST['course_id'])) {
    echo "missing_course_id";
    exit();
}

$user_id = $_SESSION['user_id'];
$course_id = $_POST['course_id'];


error_log("Received course_id: " . $course_id);

$stmt = $db->prepare("INSERT INTO enrollments (user_id, course_id) VALUES (?, ?)");
$stmt->bind_param('ii', $user_id, $course_id);

if ($stmt->execute()) {
    echo "enrolled";
} else {
    echo "error";
}
?>
