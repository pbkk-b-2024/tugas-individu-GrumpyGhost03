<!-- resources/views/layouts/AdminLayout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background for the whole page */
        }

        .navbar {
            background-color: #343a40; /* Dark navbar for contrast */
        }

        .navbar-brand, .nav-link {
            color: #ffdd57; /* Soft yellow for links */
        }

        .navbar-brand:hover, .nav-link:hover {
            color: #ffc107; /* Darker yellow on hover for emphasis */
        }

        footer {
            background-color: #343a40; /* Dark footer for consistency */
        }

        footer p {
            margin: 0; /* Remove default margin */
            color: #ffdd57; /* Soft yellow text for footer */
        }

        .sidebar {
            background-color: #343a40; /* Dark sidebar */
            color: #ffdd57; /* Soft yellow text for sidebar */
            min-height: 100vh; /* Full height */
        }

        .sidebar a {
            color: #ffdd57; /* Soft yellow for sidebar links */
        }

        .sidebar a:hover {
            color: #ffc107; /* Darker yellow on hover */
            text-decoration: underline; /* Underline effect on hover */
        }

        main {
            margin-left: 200px; /* Leave space for sidebar */
            padding: 20px; /* Add padding around main content */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Dealership Admin</a>
        </div>
    </nav>

    <div class="d-flex">
        <div class="sidebar p-3">
            <h5>Navigation</h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cars.admin') }}">Manage Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sales.adminIndex') }}">Manage Sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('appointments.adminView') }}">Manage Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('services.admin') }}">Manage Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('invoices.adminIndex') }}">Manage Invoices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('service_records.adminIndex') }}">Manage Service Records</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('maintenance.admin_maintenance') }}">Manage Maintenance Schedule</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('customers.admin') }}">Manage Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('service_parts.index') }}">Manage Service Parts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users') }}">Manage Users</a>
                </li>

                <!-- Add more links as needed -->
            </ul>
        </div>

        <main class="flex-grow-1 admin-dashboard">
            <h1 class="text-center">Admin Dashboard</h1>
            @yield('content') <!-- This is where the page-specific content will go -->
        </main>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; {{ date('Y') }} Dealership. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
