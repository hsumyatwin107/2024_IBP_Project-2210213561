<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>

    <style type="text/css">
        .temp{

            color: black;
        }
        .colo{
            border: #0c5460;
        }


    </style>

    <title>Fashion Hub Ecommerce Category Bootstrap Responsive Website Template| Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Fashion Hub Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="home/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <!-- shop css -->
    <link href="home/css/shop.css" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="home/css/owl.carousel.min.css">
    <!-- Owl-Carousel-CSS -->
    <link href="home/css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="home/css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Elsie+Swash+Caps:400,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <!-- //online-fonts -->
</head>

<body>


<header>
    <div class="container">
        <!-- top nav -->
        <nav class="top_nav d-flex pt-3 pb-1">
            <!-- logo -->
            <h1>
                <a class="navbar-brand" href="/">fh
                </a>
            </h1>
            <!-- //logo -->
            <div class="w3ls_right_nav ml-auto d-flex">
                <!-- search form -->
                <form class="nav-search form-inline my-0 form-control" action="#" method="post">

                    <a href="{{url('/')}}" class="btn btn-outline-secondary  ml-3 my-sm-0">Home</a>
                    {{--                    <a href="{{url('show_cart')}}" class="btn btn-outline-secondary  ml-3 my-sm-0">Cart</a>--}}
                    {{--                    <a href="{{url('')}}" class="btn btn-outline-secondary  ml-3 my-sm-0">Orders</a>--}}
                    <a href="{{url('contact')}}" class="btn btn-outline-secondary  ml-3 my-sm-0">Contact</a>
                    {{--                    <a href="{{url('contact')}}" class="btn btn-outline-secondary  ml-3 my-sm-0">Contact</a>--}}
                    {{--                    <a href="{{url('')}}" class="btn btn-outline-secondary  ml-3 my-sm-0">About Us</a>--}}

                </form>

                <!-- search form -->
                <div class="nav-icon d-flex">
                    <!-- sigin and sign up -->


                    @if (Route::has('login'))
                        @auth
                            <x-app-layout>

                            </x-app-layout>

                        @else

                            <div class="nav-item">

                                <a class="btn btn-outline-secondary  ml-3 my-sm-0" id="logincss" href="{{ route('login') }}">login</a>
                            </div>
                            <div class="nav-item">
                                <a class="btn btn-outline-secondary  ml-3 my-sm-0" href="{{ route('register') }}">Register</a>
                            </div>

                        @endif
                    @endauth



                    <!-- //shopping cart ends here -->
                </div>
            </div>
        </nav>
        <!-- //top nav -->
        <!-- bottom nav -->

        <!-- //bottom nav -->
    </div>
    <!-- //header container -->
</header>




<section class="py-lg-5">
    <!-- insta posts -->
    <h5 class="head_agileinfo text-center text-capitalize pb-5">
        <span>Welcome to</span>our hospital</h5>

    <div style="padding-bottom: 20px; text-align: center">
        <form action="{{url('search_data')}}" method="get">
            @csrf

            <input type="text" name="search" style="color: black" placeholder="type here to search">
            <input type="submit" value="Search" class="btn btn-info">

        </form>
    </div>

    <div class="gallery row no-gutters pt-lg-5">

        @foreach($product as $product)

            <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                    <img src="/product/{{$product->image}}" class="img-fluid" alt="" />

                <div class="card-body  py-3 px-2">
                    <div class="">
                        <div>
                            <p class="">Doctor's name: {{$product->doctor_name}}</p>
                        </div>
                        <div>
                            <p class="">Unit: {{$product->category}}</p>
                        </div>
                        <div>
                            <p class="">Appointment's price: ${{$product->Price}}</p>
                        </div>
                        <div>
                            <p class="">Description: {{$product->description}}</p>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>

</section>




<!-- js -->
<script src="home/js/jquery-2.2.3.min.js"></script>
<!-- //js -->
<!-- script for show signin and signup modal -->
<script>
    $(document).ready(function () {
        $("#myModal_btn").modal();
    });
</script>
<!-- //script for show signin and signup modal -->
<!-- smooth dropdown -->
<script>
    $(document).ready(function () {
        $('ul li.dropdown').hover(function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
        }, function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
        });
    });
</script>
<!-- //smooth dropdown -->
<!-- script for password match -->
<script>
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password2").value;
        var pass1 = document.getElementById("password1").value;
        if (pass1 != pass2)
            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
</script>
<!-- script for password match -->
<!-- Banner Responsiveslides -->
<script src="home/js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider3").responsiveSlides({
            auto: false,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!-- // Banner Responsiveslides -->
<!-- Product slider Owl-Carousel-JavaScript -->
<script src="home/js/owl.carousel.js"></script>
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 4,
        loop: false,
        margin: 10,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        responsive: {
            320: {
                items: 1,
            },
            568: {
                items: 2,
            },
            991: {
                items: 3,
            },
            1050: {
                items: 4
            }
        }
    });
</script>
<!-- //Product slider Owl-Carousel-JavaScript -->
<!-- cart-js -->
<script src="home/js/minicart.js">
</script>
<script>
    hub.render();

    hub.cart.on('new_checkout', function (evt) {
        var items, len, i;

        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {}
        }
    });
</script>
<!-- //cart-js -->
<!-- start-smooth-scrolling -->
<script src="home/js/move-top.js"></script>
<script src="home/js/easing.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
<script>
    $(document).ready(function () {
        /*
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };
        */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<script src="home/js/SmoothScroll.min.js"></script>
<!-- //smooth-scrolling-of-move-up -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="home/js/bootstrap.js"></script>
</body>

</html>
