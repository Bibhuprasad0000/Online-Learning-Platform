<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(images/admin.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .container {
            max-width: 800px;
        }

        h1 {
            margin-bottom: 20px;
        }

        form .form-label {
            font-weight: bold;
        }

        button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Your Profile </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="user/enroll.php">Enroll a course </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="php/add_course.php">Add Course</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="php/add_lesson.php">Add Lesson</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="php/add_quiz.php">Add Quiz</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="php/add_assignment.php">Add Assignment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="php/add_category.php">Add Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="php/add_tag.php">Add Tag</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="php/add_material.php">Add Learning Material</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
    <!-- <h1>Welcome to the Admin Dashboard</h1>
    <h2>Online Learning Platform</h2> -->
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
    
    document.addEventListener('DOMContentLoaded', function () {
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('.nav-link');
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].href === currentLocation) {
                menuItem[i].classList.add('active');
            }
        }
    });

    
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

   
    $(document).ready(function () {
        $('.navbar-toggler').on('click', function () {
            $('.navbar-collapse').slideToggle(300);
        });
    });
</script>
</body>
</html>
