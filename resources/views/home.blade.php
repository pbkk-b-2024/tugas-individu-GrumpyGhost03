@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <section class="hero bg-gradient text-white text-center py-5">
        <div class="dealership-name-box" style="background-image: url('<?php echo asset('images/subclas-s-ifyouloveme-original.jpg'); ?>');">
            <div class="overlay"></div> <!-- Overlay for better text visibility -->
            <h1 class="display-10">Our Dealership Name</h1>
        </div>
        <p>Explore our exclusive range of cars and professional car services</p>
        <a href="#cars" class="btn btn-warning btn-lg">Browse Cars</a>
        <a href="#services" class="btn btn-light btn-lg">Our Services</a>
    </section>

    <!-- Featured Cars Section -->
    <section id="cars" class="py-5">
        <h2 class="text-center mb-4 text-success">Featured Cars</h2>
        <div class="row">
            @foreach($cars as $car)
                <div class="col-md-4 d-flex"> <!-- Flex container for uniform card sizes -->
                    <div class="card mb-4 shadow-lg car-card">
                        <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->make }} {{ $car->model }}">
                        <div class="card-body d-flex flex-column"> <!-- Flex column for card body -->
                            <h5 class="card-title text-primary">{{ $car->make }} {{ $car->model }}</h5>
                            <p class="card-text">Year: {{ $car->year }}</p>
                            <p class="card-text">Price: ${{ number_format($car->price, 2) }}</p>
                            <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info mt-auto">View Details</a> <!-- Push button to the bottom -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <h2 class="text-center mb-4 text-danger">Our Services</h2>
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $service->name }}</h5>
                            <p class="card-text">{{ $service->description }}</p>
                            <p class="card-text">Price: ${{ number_format($service->price, 2) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact py-5 text-center bg-info text-white">
        <h2 class="mb-4">Get in Touch</h2>
        <p>For any inquiries or test drive appointments, contact us now!</p>
        <a class="btn btn-light">Contact Us</a>
    </section>
</div>

<style>
    .dealership-name-box {
        position: relative; /* Enable positioning of the overlay */
        background-size: cover; /* Cover the entire box */
        background-position: center; /* Center the image */
        padding: 60px; /* Increased padding for a larger box */
        border-radius: 10px; /* Rounded corners */
        margin-bottom: 20px; /* Space below the box */
        color: white; /* Text color for better contrast */
    }

    .overlay {
        position: absolute; /* Position overlay */
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
        border-radius: 10px; /* Match rounded corners */
        z-index: 1; /* Place behind text */
    }

    .dealership-name-box h1 {
        position: relative; /* Position text above overlay */
        z-index: 2; /* Place above overlay */
    }

    .car-card {
        border: 2px solid #ddd; /* Grey border around the card */
        border-radius: 10px; /* Match card rounded corners */
        transition: box-shadow 0.3s; /* Smooth shadow transition */
        height: 100%; /* Set height to fill flex container */
        display: flex; /* Enable flexbox for the card */
        flex-direction: column; /* Stack children vertically */
    }

    .car-card:hover {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Shadow on hover for a popping effect */
    }

    .card-body {
        flex: 1; /* Allow card body to grow and fill available space */
        display: flex; /* Enable flexbox for card body */
        flex-direction: column; /* Stack content vertically */
        justify-content: space-between; /* Space items evenly */
    }
</style>
@endsection
