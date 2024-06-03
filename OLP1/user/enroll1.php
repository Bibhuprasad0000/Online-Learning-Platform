<?php
session_start();
require("../php/db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: php/user_login.php");
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
    <title>Enrolled Courses</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e68c;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .courses {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .course {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            background-color: #39ff14;
            transition: transform 0.2s;
        }
        .course:hover {
            transform: scale(1.02);
        }
        .card-title {
            margin-bottom: 10px;
        }
        .btn-enroll {
            background-color: #28a745;
            color: white;
        }
        .btn-enroll:hover {
            background-color: #218838;
            color: white;
        }
        #lg{
            margin-left: 1000px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Your Profile</h1>
        <a href="../php/logout.php" class="btn btn-light mt-2"id="lg">Logout</a>

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
                    <form action="enroll.php" method="POST">
                        <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                        <button type="submit" class="btn btn-enroll">Enroll</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
