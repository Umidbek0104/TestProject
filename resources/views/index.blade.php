@extends('layouts.main')
@section('content')
<!-- category section -->
<section class="category_section">
    <div class="container-fluid">
        <div class="row">
    @foreach($category as $cate)
            <div class="col-sm-6 col-md-4 col-xl-2 px-0">
                <a href="#" class="box">
                    <div class="img-box">
                        <img src="images/c1.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{$cate->category_name}}
                        </h5>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end category section -->


<!-- about section -->

<section class="about_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                            About Us
                        </h2>
                    </div>
                    <p>
                        Normal distribution of letters, as opposed to using 'Content here, content here', making it look like
                        readable English. Many desktop publishing packages and web page editors has a more-or-less normal
                        distribution of letters, as opposed to using 'Content here, content here', making it look like readable
                        English. Many desktop publishing packages and web page editors
                    </p>
                    <a href="">
                        Read More
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img-box">
                    <img src="images/about-img.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end about section -->

<!-- job section -->
<section class="job_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Po'stlar va Testlar
            </h2>
        </div>
        <div class="job_container">
            <h4 class="job_heading">
                Po'stlar
            </h4>
            <div class="row">
                @foreach($posts as $post)
                <div class="col-lg-6">
                    <div class="box">
                        <div class="job_content-box">
                            <div class="img-box">
                                <img src="images/job_logo1.png" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{$post->title}}
                                </h5>
                                <div class="detail-info">
                                    <h6>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <span>
                        {{$post->content}}
                      </span>
                                    </h6>
                                    <h6>
                                        <i class="fa fa-money" aria-hidden="true"></i>
                                        <span>
                        {{$post->category->category_name}}
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
                                Ko'rish
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
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
                            <a href="{{route('page.work.tests')}}" class="apply-btn">
                                Ishlash
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
<!-- end job section -->

<!-- expert section -->

<section class="expert_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                LOOKING FOR EXPERTS?
            </h2>
            <p>
                Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam nulla mauris
                iaculis. Erat eget vitae malesuada, tortor tincidunt porta lorem lectus.
            </p>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 mx-auto">
                <div class="box">
                    <div class="img-box">
                        <img src="images/e1.jpg" alt="">
                    </div>
                    <div class="detail-box">
                        <a href="">
                            Martin Anderson
                        </a>
                        <h6 class="expert_position">
                <span>
                  Web Anaylzer
                </span>
                            <span>
                  41 Jobs Done
                </span>
                        </h6>
                        <span class="expert_rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </span>
                        <p>
                            Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam
                            nulla
                            mauris iaculis.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mx-auto">
                <div class="box">
                    <div class="img-box">
                        <img src="images/e2.jpg" alt="">
                    </div>
                    <div class="detail-box">
                        <a href="">
                            Semanta Klores
                        </a>
                        <h6 class="expert_position">
                <span>
                  Graphic Designer
                </span>
                            <span>
                  32 Jobs Done
                </span>
                        </h6>
                        <span class="expert_rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </span>
                        <p>
                            Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam
                            nulla
                            mauris iaculis.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mx-auto">
                <div class="box">
                    <div class="img-box">
                        <img src="images/e3.jpg" alt="">
                    </div>
                    <div class="detail-box">
                        <a href="">
                            Ryan Martines
                        </a>
                        <h6 class="expert_position">
                <span>
                  SEO Expert
                </span>
                            <span>
                  27 Jobs Done
                </span>
                        </h6>
                        <span class="expert_rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </span>
                        <p>
                            Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam
                            nulla
                            mauris iaculis.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-box">
            <a href="">
                View All Freelancers
            </a>
        </div>
    </div>
</section>

<!-- end expert section -->

@endsection
