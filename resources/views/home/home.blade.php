<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <title>Arakan Insani Yardim Dernegi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="home/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="home/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth; /* Smooth scrolling */
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
            background: rgba(0, 0, 0, 0.7);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            color: white;
        }

        nav img {
            max-width: 100px;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 15px;
        }

        .nav-links li a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .nav-links li a:hover {
            background: #0c5460;
        }

        .hero {
            width: 100%;
            height: 100vh;
            background-image: url(home/images/a1.JPG);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            animation-name: myani;
            animation-duration: 15s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes myani {
            0% {
                background-image: url(home/images/a1.JPG);
            }

            50% {
                background-image: url(home/images/a2.JPG);
            }
            75%{
                background-image: url(home/images/a3.JPG);
            }
            100% {
                background-image: url(home/images/a4.JPG);
            }
        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            color: white;
            text-align: center;
            z-index: 1;
        }

        .hero-content h1 {
            font-size: 60px;
            margin-bottom: 20px;
        }

        .hero-content a {
            text-decoration: none;
            color: white;
            background: #0c5460;
            padding: 12px 30px;
            border-radius: 30px;
            font-size: 18px;
            transition: background 0.3s;
        }

        .hero-content a:hover {
            background: #094a53;
        }

        /* Full screen sections */
        section {
            width: 100%;
            height: 100vh;
            padding: 40px 50px;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #333;
        }

        .about, .scholarship {
            background-color: #f4f4f4;
        }

        /* Footer (Contact Us) */
        .contact {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            width: 100%;
            position: relative;
        }

        .contact h2 {
            margin-bottom: 20px;
        }

        /* Responsive Menu (Small Devices) */
        #menu-toggle {
            display: none;
        }

        #menu {
            position: fixed;
            top: 0;
            right: -250px;
            width: 250px;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 200;
            transition: right 0.3s;
            padding-top: 20px;
        }

        #menu ul {
            list-style: none;
            padding: 0;
        }

        #menu ul li {
            margin: 15px 0;
        }

        #menu ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 20px;
            display: block;
            border-radius: 4px;
            transition: background 0.3s;
        }

        #menu ul li a:hover {
            background: #0c5460;
        }

        #menu-toggle:checked~#menu {
            right: 0;
        }

        .menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 150;
            display: none;
        }

        #menu-toggle:checked~.menu-overlay {
            display: block;
        }

        #menu-toggle:checked~nav .burger {
            color: #0c5460;
        }

        nav .burger {
            font-size: 28px;
            cursor: pointer;
            display: none;
        }

        /* Center Logo on Small Devices */
        @media (max-width: 768px) {
            nav img {
                margin: 0 auto;
                display: block;
            }

            nav .nav-links {
                display: none;
            }

            nav .burger {
                display: block;
            }
        }
        /* Social Media Icons Style */
            .contact .social-icons {
                display: flex;
                justify-content: center;
                gap: 20px;
                margin-top: 20px;
            }

            .contact .social-icons .social-icon {
                font-size: 24px;
                color: white;
                text-decoration: none;
                transition: color 0.3s;
            }

            .contact .social-icons .social-icon:hover {
                color: #0c5460; /* Change to your desired hover color */
            }

            .contact .social-icons .social-icon i {
                transition: transform 0.3s;
            }

            .contact .social-icons .social-icon:hover i {
                transform: scale(1.1); /* Slightly increase the icon size on hover */
            }
            /* General styling for language switcher */
            .language-switch {
                margin-left: auto; /* Push to the right by default */
                display: flex;
                align-items: center;
                gap: 10px; /* Spacing between language links */
                position: relative;
            }

            .language-switch a {
                color: white;
                text-decoration: none;
                font-size: 16px; /* Adjust the font size */
                margin: 0 5px;
                padding: 5px 10px;
                border-radius: 5px;
                transition: background 0.3s;
            }

            .language-switch a:hover {
                background: #0c5460; /* Highlight color on hover */
            }

            /* Small screen adjustments */
            @media (max-width: 768px) {
                .language-switch {
                    position: absolute;
                    top: 15px;
                    left: 15px; /* Move to the left corner */
                    margin-left: 0; /* Reset margin */
                    gap: 5px; /* Adjust spacing for small screen */
                }

            .language-switch a {
                font-size: 14px; /* Reduce font size */
                padding: 4px 8px; /* Adjust padding */
            }
        }
            .scholarship-section {
                background-color: #0f0f0f;
                color: #ffffff;
                padding: 80px 20px;
            }

            .section-title {
                text-align: center;
                font-size: 36px;
                color: #0c5460;
                margin-bottom: 40px;
                font-weight: bold;
            }

            .table-container {
                overflow-x: auto;
            }

            .scholarship-table {
                width: 100%;
                border-collapse: collapse;
                background-color: #1a1a1a;
                color: #ffffff;
                border-radius: 12px;
                overflow: hidden;
            }

            .scholarship-table th,
            .scholarship-table td {
                padding: 16px 20px;
                text-align: left;
                border-bottom: 1px solid #333;
            }

            .scholarship-table th {
                background-color: #0c5460;
                font-weight: 600;
                color: white;
            }

            .scholarship-table tr:hover {
                background-color: #2a2a2a;
            }

            .scholarship-table td {
                color: #e0e0e0;
                font-size: 15px;
            }

    </style>
</head>

<body>
    <header>
        <input type="checkbox" id="menu-toggle">
        <div class="menu-overlay"></div>
        <nav>
            <img src="{{ asset('home/images/logo.png') }}" alt="Logo">
            <label for="menu-toggle" class="burger"><i class="fas fa-bars"></i></label>
            <ul class="nav-links">
            <li><a href="#home">{{ __('messages.home') }}</a></li>
            <li><a href="#about">{{ __('messages.about') }}</a></li>
            <li><a href="#scholarship">{{ __('messages.scholarship') }}</a></li>
            <li><a href="#contact">{{ __('messages.contact_us') }}</a></li>


                @if (Route::has('login'))
                @auth
                <x-app-layout></x-app-layout>
                @else
                    <li><a href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                    <li><a href="{{ route('register') }}">{{ __('messages.register') }}</a></li>
                @endauth
                @endif
            </ul>
            <div class="language-switcher">
            <a href="{{ route('lang.switch', ['lang' => 'en']) }}" class="lang-btn" title="English">EN</a>
            <a href="{{ route('lang.switch', ['lang' => 'tr']) }}" class="lang-btn" title="Türkçe">TR</a>
            <a href="{{ route('lang.switch', ['lang' => 'ar']) }}" class="lang-btn" title="العربية">AR</a>
        </div>
        </nav>

        <div id="menu">
            <ul>
                <li><a href="#home" onclick="closeMenu()">Home</a></li>
                <li><a href="#about" onclick="closeMenu()">About Us</a></li>
                <li><a href="#scholarship" onclick="closeMenu()">Scholarship</a></li>
                <li><a href="#contact" onclick="closeMenu()">Contact Us</a></li>
                @if (Route::has('login'))
                @auth
                <x-app-layout></x-app-layout>
                @else
                <li><a href="{{ route('login') }}" onclick="closeMenu()">Login</a></li>
                <li><a href="{{ route('register') }}" onclick="closeMenu()">Register</a></li>
                @endauth
                @endif
            </ul>
        </div>
    </header>

    <div class="hero" id="home">
        <div class="hero-content">
            <h1>Welcome to Our Platform</h1>
            <a href="#about">Explore</a>
        </div>
    </div>

    <section id="about" class="about bg-black text-white py-10 px-5">
    <h2 class="text-center text-3xl font-semibold mb-8">About Us</h2>

    <div class="relative max-w-3xl mx-auto">
        @if (isset($aboutSections) && count($aboutSections))
            @foreach ($aboutSections as $index => $aboutSection)
                <div class="about-item text-center transition-all duration-500" data-index="{{ $index }}" style="{{ $index !== 0 ? 'display:none;' : '' }}">
                <img src="{{ asset('storage/about/' . $aboutSection->photo) }}">
                <p class="mt-4 text-lg">{{ $aboutSection->description }}</p>
                </div>
            @endforeach
        @endif

        <!-- Navigation Buttons -->
        <div class="flex justify-between items-center absolute top-1/2 left-0 right-0 px-4 transform -translate-y-1/2 z-10">
            <button onclick="showPrev()" class="text-white text-3xl bg-gray-800 bg-opacity-70 px-3 py-1 rounded-full hover:bg-opacity-90">&#8592;</button>
            <button onclick="showNext()" class="text-white text-3xl bg-gray-800 bg-opacity-70 px-3 py-1 rounded-full hover:bg-opacity-90">&#8594;</button>
        </div>
    </div>
</section>

<section id="scholarship" class="scholarship-section">
    <div class="container">
        <h2 class="section-title">{{ __('messages.scholarship') }}</h2>
        <div class="table-container">
            <table class="scholarship-table">
                <thead>
                    <tr>
                        <th>Scholarship Name</th>
                        <th>Deadline</th>
                        <th>Eligibility</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($scholarships as $scholarship)
                        <tr>
                            <td>{{ $scholarship->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($scholarship->deadline)->format('F d, Y') }}</td>
                            <td>{{ $scholarship->eligibility }}</td>
                            <td>
                                <a href="{{ route('register', ['redirect' => 'apply', 'scholarship_id' => $scholarship->id]) }}"
                                onclick="alert('You need to register to apply.')" 
                                class="btn btn-primary">
                                    Apply
                                </a>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

    <!-- Contact Us Section as Footer -->
    <section id="contact" class="contact">
        <h2>Contact Us</h2>
        <p>If you have any questions or need assistance, feel free to contact us.</p>

    <!-- Social Media Icons -->
    <div class="social-icons">
        <a href="mailto:kurumsal@arakan.org.tr" target="_blank" class="social-icon">
            <i class="fas fa-envelope"></i> <!-- Email Icon -->
        </a>
        <a href="https://www.instagram.com/arakandernek?igsh=bjN1aDA1Z2swbXVn" target="_blank" class="social-icon">
            <i class="fab fa-instagram"></i> <!-- Instagram Icon -->
        </a>
        <a href="https://www.facebook.com/yourprofile" target="_blank" class="social-icon">
            <i class="fab fa-facebook"></i> <!-- Facebook Icon -->
        </a>
        <a href="https://youtube.com/@arakandernek?si=xK3J_-idLTB5xYqs" target="_blank" class="social-icon">
            <i class="fab fa-youtube"></i> <!-- YouTube Icon -->
        </a>
    </div>
    </section>

    <script>
        function closeMenu() {
            document.getElementById('menu-toggle').checked = false;
        }
    
    let current = 0;
    const items = document.querySelectorAll('.about-item');

    function showItem(index) {
        items.forEach((el, i) => el.style.display = i === index ? 'block' : 'none');
    }

    function showNext() {
        current = (current + 1) % items.length;
        showItem(current);
    }

    function showPrev() {
        current = (current - 1 + items.length) % items.length;
        showItem(current);
    }
    let current = 0;
    const items = document.querySelectorAll('.about-item');
    const total = items.length;

    function showItem(index) {
        items.forEach((item, i) => {
            item.style.display = (i === index) ? 'block' : 'none';
        });
    }

    function showNext() {
        current = (current + 1) % total;
        showItem(current);
    }

    function showPrev() {
        current = (current - 1 + total) % total;
        showItem(current);
    }
</script>
</body>

</html>
