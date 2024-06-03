<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $type = $_POST['type'];
    $url = $_POST['url'];

    $db = new mysqli("localhost", "root", "bIBHU@123", "olp");
    if ($db->connect_error) {
        die("Connection not established: " . $db->connect_error);
    }

    $stmt = $db->prepare("INSERT INTO materials (title, type, url) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $type, $url);

    if ($stmt->execute()) {
        echo "Material added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Learning Material</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Learning Material</h1>
        <form action="add_material.php" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="video">Video</option>
                    <option value="slideshow">Slideshow</option>
                    <option value="pdf">PDF</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="url" class="form-control" id="url" name="url" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Material</button>
        </form>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
