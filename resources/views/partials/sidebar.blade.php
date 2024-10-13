<!-- resources/views/partials/sidebar.blade.php -->
<div class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('inventory') }}">
                    <span data-feather="file"></span>
                    Manage Inventory
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                    <span data-feather="shopping-cart"></span>
                    Sales
                </a>
            </li>
        </ul>
    </div>
</div>
