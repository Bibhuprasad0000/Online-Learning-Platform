<?php
include('../php/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tag_name = $_POST['tag_name'];
    
    $stmt = $conn->prepare("INSERT INTO tags (name) VALUES (?)");
    $stmt->bind_param("s", $tag_name);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Tag added successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error adding tag.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tag</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Tag</h1>
        <form method="POST" action="add_tag.php">
            <div class="mb-3">
                <label for="tag_name" class="form-label">Tag Name</label>
                <input type="text" id="tag_name" name="tag_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
