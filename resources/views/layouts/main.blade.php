<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Hirevac</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- nice select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="{{route('page.index')}}">
            <span>
              Hirevac
            </span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('page.index')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('page.about')}}"> About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('page.tests')}}">Tests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('page.posts')}}">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span>
                    Login
                  </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span>
                    Sign Up
                  </span>
                            </a>
                        </li>
                        <form class="form-inline">
                            <button class="btn   nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
        <div class="container ">
            <div class="row">
                <div class="col-lg-7 col-md-8 mx-auto">
                    <div class="detail-box">
                        <h1>
                            Build Your <br>
                            POWERFUL CAREER
                        </h1>
                        <p>
                            when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                            distribution of letters, as opposed to
                        </p>
                    </div>
                </div>
            </div>
            <div class="find_container ">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <form>
                                <div class="form-row ">
                                    <div class="form-group col-lg-3">
                                        <input type="text" class="form-control" id="inputPatientName" placeholder="Keywords">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <select name="" class="form-control wide" id="inputDoctorName">
                                            <option value="Normal distribution ">All Locations</option>
                                            <option value="Normal distribution ">Location 2 </option>
                                            <option value="Normal distribution ">Location 3 </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <select name="" class="form-control wide" id="inputDepartmentName">
                                            <option value="Normal distribution ">SEO Expert </option>
                                            <option value="Normal distribution ">Web Designer </option>
                                            <option value="Normal distribution ">Web Developer</option>
                                            <option value="Normal distribution ">Graphic Deesigner</option>
                                            <option value="Normal distribution ">Content Writer</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <div class="btn-box">
                                            <button type="submit" class="btn ">Submit Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <ul class="job_check_list">
                        <li class=" ">
                            <input id="checkbox_qu_01" type="checkbox" class="styled-checkbox">
                            <label for="checkbox_qu_01">
                                Freelancer
                            </label>
                        </li>
                        <li class=" ">
                            <input id="checkbox_qu_02" type="checkbox" class="styled-checkbox">
                            <label for="checkbox_qu_02">
                                Part Time
                            </label>
                        </li>
                        <li class=" ">
                            <input id="checkbox_qu_03" type="checkbox" class="styled-checkbox">
                            <label for="checkbox_qu_03">
                                Full Time
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end slider section -->
</div>


@yield('content')


<!-- info section -->
<section class="info_section ">
    <div class="container">
        <div class="row">
            <div class="col-md-2 info_links">
                <h4>
                    Menu
                </h4>
                <ul>
                    <li class="active">
                        <a href="{{route('page.index')}}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{route('page.about')}}">
                            About
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{route('page.tests')}}">
                            Testlar
                        </a>
                    </li>
                    <li>
                        <a class="" href="freelancer.html">
                            Po'stlar
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>
                    Jobs
                </h4>
                <p>
                    Established fact that a reader will be distracted by the readable content of a page when looking at its
                    layout. The point of using Lorem Ipsum
                </p>
            </div>
            <div class="col-md-3">
                <div class="info_social">
                    <h4>
                        Social Link
                    </h4>
                    <div class="social_container">
                        <div>
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info_form">
                    <h4>
                        Newsletter
                    </h4>
                    <form action="">
                        <input type="text" placeholder="Enter Your Email" />
                        <button type="submit">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end info_section -->


<!-- footer section -->
<footer class="footer_section">
    <div class="container">
        <p>
            &copy; <span id="displayYear"></span> Yaratuvchi
            <a href="https://html.design/">Sadulayev Omonboy</a>
        </p>
    </div>
</footer>
<!-- footer section -->

<!-- jQery -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.js"></script>
<!-- nice select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
<!-- custom js -->
<script src="js/custom.js"></script>


</body>

</html>
