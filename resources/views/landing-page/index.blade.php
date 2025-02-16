<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>sbs</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('landing-page/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('landing-page/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('landing-page/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('landing-page/images/fevicon.png') }}" type="image/gif" />
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('landing-page/images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <div class="header">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class=" col-md-2 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('landing-page/images/logo.png') }}"
                                        alt="#" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="skating.html">skating</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="shop.html">shop</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-2">
                    <ul class="email text_align_right">
                        <li class="d_none"><a href="Javascript:void(0)"><i class="fa fa-user"
                                    aria-hidden="true"></i></a></li>
                        <li class="d_none"> <a href="Javascript:void(0)"><i class="fa fa-search"
                                    style="cursor: pointer;" aria-hidden="true"></i></a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end header inner -->
    <!-- end header -->
    <!-- top -->
    <div class="full_bg">
        <div class="slider_main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- carousel code -->
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <!-- first slide -->
                                <div class="carousel-item active">
                                    <div class="carousel-caption relative">
                                        <div class="row d_flex">
                                            <div class="col-md-5">
                                                <div class="board">
                                                    <i><img src="{{ asset('landing-page/images/top_icon.png') }}"
                                                            alt="#" /></i>
                                                    <h3>
                                                        Skating<br> Board<br> School
                                                    </h3>
                                                    <div class="link_btn">
                                                        <a class="read_more" href="Javascript:void(0)">Read More
                                                            <span></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="banner_img">
                                                    <figure><img class="img_responsive"
                                                            src="{{ asset('landing-page/images/banner_img.png') }}">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- second slide -->
                                <div class="carousel-item">
                                    <div class="carousel-caption relative">
                                        <div class="row d_flex">
                                            <div class="col-md-5">
                                                <div class="board">
                                                    <i><img src="{{ asset('landing-page/images/top_icon.png') }}"
                                                            alt="#" /></i>
                                                    <h3>
                                                        Skating<br> Board<br> School
                                                    </h3>
                                                    <div class="link_btn">
                                                        <a class="read_more" href="Javascript:void(0)">Read More
                                                            <span></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="banner_img">
                                                    <figure><img class="img_responsive"
                                                            src="{{ asset('landing-page/images/banner_img.png') }}">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- third slide-->
                                <div class="carousel-item">
                                    <div class="carousel-caption relative">
                                        <div class="row d_flex">
                                            <div class="col-md-5">
                                                <div class="board">
                                                    <i><img src="{{ asset('landing-page/images/top_icon.png') }}"
                                                            alt="#" /></i>
                                                    <h3>
                                                        Skating<br> Board<br> School
                                                    </h3>
                                                    <div class="link_btn">
                                                        <a class="read_more" href="Javascript:void(0)">Read More
                                                            <span></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="banner_img">
                                                    <figure><img class="img_responsive"
                                                            src="{{ asset('landing-page/images/banner_img.png') }}">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- controls -->
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end banner -->
    <!-- our class -->
    <div class="class">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage text_align_center">
                        <h2>Our Skating Class</h2>
                        <p>There are many variations of passages of Lorem</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 margi_bottom">
                    <div class="class_box text_align_center">
                        <i><img src="{{ asset('landing-page/images/class1.png') }}" alt="#" /></i>
                        <h3>Skateboard</h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered
                            alterationThere are many variations </p>
                    </div>
                    <a class="read_more" href="Javascript:void(0)">Read More</a>
                </div>
                <div class="col-md-4 margi_bottom">
                    <div class="class_box blue text_align_center">
                        <i><img src="{{ asset('landing-page/images/class2.png') }}" alt="#" /></i>
                        <h3>Skateboard</h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered
                            alterationThere are many variations </p>
                    </div>
                    <a class="read_more" href="Javascript:void(0)">Read More</a>
                </div>
                <div class="col-md-4 margi_bottom">
                    <div class="class_box text_align_center">
                        <i><img src="{{ asset('landing-page/images/class3.png') }}" alt="#" /></i>
                        <h3>Skateboard</h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered
                            alterationThere are many variations </p>
                    </div>
                    <a class="read_more" href="Javascript:void(0)">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end our class -->
    <!-- about -->
    <div class="about">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class="col-md-6">
                    <div class="titlepage text_align_left">
                        <h2>About <br>Skating <br> school</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered
                            alterationThere are many variatioThere are many variations of passages of Lorem Ipsum
                            available,
                            but the majority have suffered alterationThere are many variationsns
                        </p>
                        <div class="link_btn">
                            <a class="read_more" href="about.html">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about_img text_align_center">
                        <figure><img src="{{ asset('landing-page/images/about.png') }}" alt="#" /></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->
    <!-- skating -->
    <div class="skating">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage text_align_center">
                        <h2>Skating Video</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="skating-box ">
                        <figure><img src="{{ asset('landing-page/images/sakt1.png') }}" alt="#" /></figure>
                        <div class="link_btn">
                            <a class="read_more" href="Javascript:void(0)">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="skating-box">
                        <figure><img src="{{ asset('landing-page/images/sakt2.png') }}" alt="#" /></figure>
                        <div class="link_btn">
                            <a class="read_more" href="Javascript:void(0)">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="skating-box">
                        <figure><img src="{{ asset('landing-page/images/sakt3.png') }}" alt="#" /></figure>
                        <div class="link_btn">
                            <a class="read_more" href="Javascript:void(0)">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end skating -->
    <!-- shop -->
    <div class="shop">
        <div class="container-fluid">
            <div class="row d_flex d_grid">
                <div class="col-md-7">
                    <div class="shop_img text_align_center" data-aos="fade-right">
                        <figure><img class="img_responsive" src="{{ asset('landing-page/images/shop.png') }}"
                                alt="#" />
                        </figure>
                    </div>
                </div>
                <div class="col-md-5 order_1_mobile">
                    <div class="titlepage text_align_left ">
                        <h2>Our Skate <br>Shop</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered
                            alterationThere are many variatioThere are many variations of passages of Lorem Ipsum
                            available,
                            but the majority have suffered alterationThere are many variationsns
                        </p>
                        <a class="read_more" href="shop.html">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end shop -->
    <!-- testimonial -->
    <div class="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="titlepage text_align_center">
                        <h2>FAQ</h2>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Collapsible Group Item #1
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            Some placeholder content for the first accordion panel. This panel is shown by default,
                            thanks to the <code>.show</code> class.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                Collapsible Group Item #2
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            Some placeholder content for the second accordion panel. This panel is hidden by default.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                Collapsible Group Item #3
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            And lastly, the placeholder content for the third and final accordion panel. This panel is
                            hidden by default.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end testimonial -->
    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="infoma">
                            <h3>Contact Us</h3>
                            <ul class="conta">
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>Locations
                                </li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>Call +01 1234567890</li>
                                <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="Javascript:void(0)">
                                        demo@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row border_left">
                            <div class="col-md-12">
                                <div class="infoma">
                                    <h3>Newsletter</h3>
                                    <form class="form_subscri">
                                        <div class="row">
                                            <div class="col-md-12">
                                            </div>
                                            <div class="col-md-4">
                                                <input class="newsl" placeholder="Enter your email" type="text"
                                                    name="Enter your email">
                                            </div>
                                            <div class="col-md-4">
                                                <input class="newsl" placeholder="Enter your email" type="text"
                                                    name="Enter your email">
                                            </div>
                                            <div class="col-md-4">
                                                <button class="subsci_btn">subscribe</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="infoma">
                                    <h3>Useful Link</h3>
                                    <ul class="fullink">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="skating.html">Skating</a></li>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="infoma text_align_left">
                                    <ul class="social_icon">
                                        <li><a href="Javascript:void(0)"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="Javascript:void(0)"><i class="fa fa-twitter"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="Javascript:void(0)"><i class="fa fa-linkedin-square"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="Javascript:void(0)"><i class="fa fa-instagram"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>© 2020 All Rights Reserved. Design by <a href="https://html.design/"> Free html
                                    Templates</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{ asset('landing-page/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landing-page/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing-page/js/jquery-3.0.0.min.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('landing-page/js/custom.js') }}"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
