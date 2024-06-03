<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Lesson</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #343a40;
        }

        .form-label {
            font-weight: bold;
            color: #495057;
        }

        .form-control {
            font-size: 1rem;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ced4da;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            margin-top: 20px;
            height: 50px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-primary:focus, .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }
        #lesn{
            display: flex   ;

        }
    </style>
</head>
<body>
   
    <div class="container mt-5">
        <h1>Add New Lesson</h1>
        <form action="../php/save_lesson.php" method="POST">
            <div class="mb-3"id="lesn">
                <label for="course_id" class="form-label">Select Course</label>
                <select name="course_id" id="course_id" class="form-control" required>
                    <?php
                    require("../php/db.php");
                    $result = $db->query("SELECT id, title FROM courses");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['title']}</option>";
                    }
                    $db->close();
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Lesson Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Lesson Content</label>
                <textarea name="content" id="content" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Lesson</button>
        </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
