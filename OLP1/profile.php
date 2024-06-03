<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(images/profile1.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            max-width: 100%;
            height: auto;
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

        .progress {
            height: 20px;
            margin-top: 10px;
        }
        #logout{
            text-align: end;
            margin-left: 800px;
        }
        #logout:hover{
            background-color:#C7F7C0;
        }
        .tt{
            color: white;
        }
        
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Your Profile</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="user/browse_course.php">Browse Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user/enroll1.php">Enroll in a Course</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user/track_progress.php">Track Progress</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href="quizzes.php">Quizze</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href="user/lesson.php">lessons</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="php/logout.php" id="logout">Logout </a>
      </li>
    </ul>
    
  </div>
</nav>


<div class="container mt-5">
   
    <marquee><h1 class="tt"> Welcome to Your Profile Page </h1></marquee>


   
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
