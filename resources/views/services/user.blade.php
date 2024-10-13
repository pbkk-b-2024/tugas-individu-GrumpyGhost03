@extends('layouts.master')

@section('title', 'Services')

@section('content')
<div class="container mt-5">
    <h1>Services</h1>

    <!-- User View: Services in Cards -->
    <h2>User View</h2>
    <div class="row d-flex flex-wrap">
        @foreach($services as $service)
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card w-100 h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text flex-grow-1">{{ $service->description }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $service->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
