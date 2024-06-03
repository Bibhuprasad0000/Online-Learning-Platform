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
            font-size: 2rem; 
        }

        h2 {
            margin-bottom: 20px;
            font-size: 1.5rem; 
        }

        form .form-label {
            font-weight: bold;
            font-size: 1.2rem; 
        }

        button {
            margin-top: 10px;
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }

            h2 {
                font-size: 1.2rem;
            }

            form .form-label {
                font-size: 1rem;
            }

            button {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 1.2rem;
            }

            h2 {
                font-size: 1rem;
            }

            form .form-label {
                font-size: 0.9rem;
            }

            button {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
<?php require("element/nav1.php"); ?>
<div class="container mt-5 text-center">
    <h1>Welcome to the Admin Dashboard</h1>
    <h2>Online Learning Platform</h2>
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
