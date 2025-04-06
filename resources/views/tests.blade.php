@extends('layouts.main')
@section('content')

    <div class="job_container">
        <h4 class="job_heading">
            Testlar
        </h4>
        <div class="row">
            @foreach($tests as $test)
                <div class="col-lg-6">
                    <div class="box">
                        <div class="job_content-box">
                            <div class="img-box">
                                <img src="images/job_logo3.png" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{$test->name}}
                                </h5>
                                <div class="detail-info">
                                    <h6>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <span>
                        {{$test->description}}
                      </span>
                                    </h6>
                                    <h6>
                                        <i class="fa fa-money" aria-hidden="true"></i>
                                        <span>
                        {{$test->category->name}}
                      </span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="option-box">
                            <button class="fav-btn">
                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                            </button>
                            <a href="" class="apply-btn">
                                Ishlash
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
