<?php
session_start();
require("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];


$stmt = $db->prepare("SELECT courses.id, courses.title, courses.description FROM enrollments 
                      JOIN courses ON enrollments.course_id = courses.id WHERE enrollments.user_id = ?");
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$enrolled_courses = [];
while ($row = $result->fetch_assoc()) {
    $enrolled_courses[] = $row;
}


$stmt = $db->prepare("SELECT * FROM courses");
$stmt->execute();
$result = $stmt->get_result();
$all_courses = [];
while ($row = $result->fetch_assoc()) {
    $all_courses[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Your Profile</h1>
        <a href="logout.php" class="btn btn-light mt-3">Logout</a>

        <h2>Enrolled Courses</h2>
        <div class="courses">
            <?php if ($enrolled_courses): ?>
                <?php foreach ($enrolled_courses as $course): ?>
                    <div class="course">
                        <h3><?php echo htmlspecialchars($course['title']); ?></h3>
                        <p><?php echo htmlspecialchars($course['description']); ?></p>
                        <a href="course.php?course_id=<?php echo $course['id']; ?>">View Course</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>You have not enrolled in any courses yet.</p>
            <?php endif; ?>
        </div>

        <h2>All Courses</h2>
        <div class="courses">
            <?php foreach ($all_courses as $course): ?>
                <div class="course">
                    <h3><?php echo htmlspecialchars($course['title']); ?></h3>
                    <p><?php echo htmlspecialchars($course['description']); ?></p>
                    <a href="enroll.php?course_id=<?php echo $course['id']; ?>" class="btn btn-enroll">Enroll</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
