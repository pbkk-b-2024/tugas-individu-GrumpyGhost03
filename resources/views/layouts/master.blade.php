<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dealership</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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
            padding: 20px; /* Add some padding around the main content */
        }
    </style>
</head>
<body>

    <div class="d-flex">

        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h5>Navigation</h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cars.user') }}">Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/services') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/appointments') }}">Service Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('service_parts.user') }}">Service Parts</a>
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <main class="flex-grow-1">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">Dealership</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/about') }}">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                            </li>

                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('signup') }}">Sign Up</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; {{ date('Y') }} Dealership. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
