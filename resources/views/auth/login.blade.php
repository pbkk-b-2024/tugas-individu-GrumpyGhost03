<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: url('<?php echo asset('images/Toby_Thyer_Photographer_Lotus_Esprit-4.jpg'); ?>') no-repeat center center fixed;
            background-size: cover;
            color: #fff; /* Default text color */
        }
        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9); /* Slightly transparent background for the login container */
            border-radius: 12px; /* Round corners */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); /* Deeper shadow for depth */
            position: relative; /* Allow positioning */
            margin-top: 100px; /* Adjust margin for better positioning */
        }
        .dealership-name-box {
            max-width: 400px;
            margin: auto;
            background-image: url('<?php echo asset('images/full-frame-shot-of-carbon-fibre-665510959-59c6c1fe519de20010970935.jpg'); ?>');
            background-size: cover;
            color: white;
            text-align: center;
            padding: 30px; /* Increased padding for better spacing */
            border-radius: 12px 12px 0 0; /* Round corners */
            margin-bottom: 20px; /* Space below the name box */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Shadow for the name box */
            position: relative; /* Allow for potential positioning of inner elements */
        }
        .dealership-name-box h1 {
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Add a shadow effect to the text */
            margin: 0; /* Remove default margin */
        }
        .login-title {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold; /* Make the title bold */
            color: black; /* Change the color of the title to black */
        }
        .form-group label {
            color: black; /* Change label color to black */
        }
        .form-control {
            background-color: white; /* Set input background to white */
            color: black; /* Change input text color to black */
        }
        .btn-primary {
            width: 100%;
            background-color: #007bff; /* Custom primary button color */
            border: none; /* Remove default border */
            border-radius: 5px; /* Round corners */
            transition: background-color 0.3s ease; /* Smooth transition */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
            color: #fff; /* Color for footer text */
            font-size: 0.9em; /* Smaller font for footer */
        }
        .footer-links a {
            color: #007bff; /* Link color */
            text-decoration: none; /* Remove underline */
        }
        .footer-links a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>

<div class="dealership-name-box">
    <h1>Dealership Name</h1> <!-- Replace with your dealership name -->
</div>

<div class="login-container">
    <h2 class="login-title">Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <div class="footer-links">
            <a href="{{ route('signup') }}">Don't have an account? Sign up</a>
        </div>
    </form>
</div>

<div class="footer">
    <p>&copy; 2024 Dealership Name. All Rights Reserved.</p> <!-- Footer content -->
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
