<?php
include('../php/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = $_POST['category_name'];
    $course_ids = $_POST['course_ids'];

    
    $stmt = $db->prepare("INSERT INTO categories (name) VALUES (?)");
    $stmt->bind_param("s", $category_name);
    if ($stmt->execute()) {
        $category_id = $stmt->insert_id; 

     
        foreach ($course_ids as $course_id) {
            $stmt = $db->prepare("INSERT INTO course_categories (course_id, category_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $course_id, $category_id);
            $stmt->execute();
        }
        echo "<div class='alert alert-success'>Category and courses added successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error adding category.</div>";
    }
}


$courses = $db->query("SELECT id, title FROM courses");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Category</h1>
        <form method="POST" action="add_category.php">
            <div class="mb-3">
                <label for="category_name" class="form-label">Category Name</label>
                <input type="text" id="category_name" name="category_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="course_ids" class="form-label">Select Courses</label>
                <div id="course_ids">
                    <?php while ($course = $courses->fetch_assoc()) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="course_ids[]" value="<?php echo $course['id']; ?>" id="course_<?php echo $course['id']; ?>">
                            <label class="form-check-label" for="course_<?php echo $course['id']; ?>">
                                <?php echo $course['title']; ?>
                            </label>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
