@extends('layouts.main')
@section('content')

    <div class="container my-5">
        <h2 class="mb-4 text-center fw-bold">Testlar</h2>
        <div class="row g-4">
            @foreach($tests as $test)
                <div class="col-lg-6">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
                                <img src="{{ asset('images/job_logo3.png') }}" alt="Test logo" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold">{{ $test->name }}</h5>
                                    <p class="card-text text-muted mb-2">
                                        <i class="fa fa-map-marker me-2 text-primary"></i>
                                        {{ $test->description }}
                                    </p>
                                    <span class="badge bg-info text-dark">
                                    <i class="fa fa-list me-1"></i> {{ $test->category->name }}
                                </span>
                                </div>
                                <div class="card-footer bg-transparent border-0 d-flex justify-content-between px-3 pb-3">
                                    <button class="btn btn-outline-danger rounded-pill">
                                        <i class="fa fa-heart"></i>
                                    </button>
                                    <a href="{{ route('page.work.tests') }}" class="btn btn-primary rounded-pill">
                                        Ishlash
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
