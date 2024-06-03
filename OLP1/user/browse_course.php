<?php
session_start();
require("../php/db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: php/user_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch all courses
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
    <title>Browse Courses</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #00b7eb;
            /* background-image: url("../images/el.png"); */
            ba
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
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
            background-color: #ee82ee;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Browse Courses</h1>
        <div class="courses">
            <?php foreach ($all_courses as $course): ?>
                <div class="course">
                    <h3><?php echo htmlspecialchars($course['title']); ?></h3>
                    <p><?php echo htmlspecialchars($course['description']); ?></p>
                    
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
