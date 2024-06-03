<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
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
            text-align: center;
        }

        .form-label {
            font-weight: bold;
            color: #495057;
           padding-top: 5px;
        }

        .form-control {
            font-size: 1rem;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ced4da;
            margin-left: 10px;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            margin-top: 20px;
            display: block;
            width: 30%;
            margin-left: 150px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .form-control1{
            margin-left: 60px;
        }

        .btn-primary:focus, .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }

        #description {
            margin-top: 10px;
          
        }
        #course{
            display: flex;
            
           
        }
        
    </style>
</head>
<body>
<div class="container mt-5">
    <h1>Add New Course</h1>
    <form action="../php/save_course.php" method="POST">
        <div class="mb-3"id="course">
            <label for="title" class="form-label">Course Title</label>
            <input type="text" name="title" id="title" class="form-control1" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Course Description</label>
            <textarea name="description" id="description" class="form-control2" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Course</button>
    </form>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
