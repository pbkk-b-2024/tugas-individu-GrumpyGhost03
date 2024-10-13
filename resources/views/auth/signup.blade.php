<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: url('<?php echo asset('images/Toby_Thyer_Photographer_Lotus_Esprit-4.jpg'); ?>') no-repeat center center fixed;
            background-size: cover;
            color: #fff; /* Default text color */
        }
        .signup-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9); /* Slightly transparent background for the signup container */
            border-radius: 12px; /* Round corners */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); /* Deeper shadow for depth */
            margin-top: 100px; /* Adjust margin for better positioning */
        }
        .signup-title {
            text-align: center;
            margin-bottom: 20px;
            color: black; /* Change title color to black */
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

<div class="signup-container">
    <h2 class="signup-title">Sign Up</h2>
    <form method="POST" action="{{ route('signup') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
        <div class="text-center mt-3">
            <a href="{{ route('login') }}">Already have an account? Login</a>
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
