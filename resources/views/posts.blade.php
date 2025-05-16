@extends('layouts.main')
@section('content')

    <div class="container my-5">
        <h2 class="text-center fw-bold mb-5">Po'stlar</h2>

        <div class="row g-4">
            @foreach($posts as $post)
                <div class="col-lg-6 col-md-12">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
                                <img src="{{ asset('images/job_logo1.png') }}" alt="Post image" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold">{{ $post->title }}</h5>
                                    <p class="card-text text-muted small mb-2">
                                        <i class="fa fa-file-text text-primary me-2"></i>
                                        {{ \Illuminate\Support\Str::limit(strip_tags($post->content), 100) }}
                                    </p>
                                    <span class="badge bg-secondary">
                                    <i class="fa fa-tags me-1"></i> {{ $post->category->category_name }}
                                </span>
                                </div>
                                <div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center px-3 pb-3">
                                    <button class="btn btn-outline-danger btn-sm rounded-circle" title="Saqlash">
                                        <i class="fa fa-heart"></i>
                                    </button>
                                    <a href="#" class="btn btn-primary btn-sm rounded-pill">
                                        Ko‘rish
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
