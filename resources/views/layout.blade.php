<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Phakhanan</title>
    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Fonts: Plus Jakarta Sans & Noto Sans Thai -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Milk-pink palette */
            --milk-bg: #fff8fb;
            --pink-50: #fff0f6;
            --pink-100: #ffe1ec;
            --pink-200: #ffc9dd;
            --pink-300: #ffa8c9;
            --pink-400: #ff86b3;
            --pink-500: #f4699c;
            --plum-900: #5c2a44;
            --plum-800: #7a3559;

            --primary-gradient: linear-gradient(135deg, #ffb3d1 0%, #f4699c 100%);
            --secondary-gradient: linear-gradient(135deg, #ffd7e6 0%, #ffb3d1 100%);
            --dark-gradient: linear-gradient(135deg, #7a3559 0%, #5c2a44 100%);
            --body-bg: var(--milk-bg);
            --text-dark: #4a2438;
            --text-muted: #a6829a;
            --border-color: #fbdce9;
            --card-shadow: 0 10px 25px -5px rgba(244, 105, 156, 0.10), 0 8px 10px -6px rgba(244, 105, 156, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Noto Sans Thai', sans-serif;
            background-color: var(--body-bg);
            background-image: radial-gradient(circle at 8% 0%, var(--pink-50) 0%, transparent 45%),
                radial-gradient(circle at 100% 20%, var(--pink-100) 0%, transparent 35%);
            background-attachment: fixed;
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: var(--pink-50);
        }
        ::-webkit-scrollbar-thumb {
            background: var(--pink-300);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--pink-400);
        }

        /* Navbar Styling */
        .navbar-custom {
            background: rgba(92, 42, 68, 0.92) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem 0;
            transition: var(--transition);
        }

        .navbar-custom .navbar-brand {
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #ffd1e4 0%, #ffb3d1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .navbar-custom .navbar-brand::before {
            content: "🎀 ";
            -webkit-text-fill-color: initial;
        }

        .navbar-custom .nav-link {
            font-weight: 500;
            color: #f3d4e2 !important;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: var(--transition);
        }

        .navbar-custom .nav-link:hover, 
        .navbar-custom .nav-link.active {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.12);
        }

        /* Container Main wrapper */
        .main-wrapper {
            flex: 1;
        }

        /* Card & Page Styling Elements */
        .card-modern {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
        }

        .card-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(244, 105, 156, 0.14), 0 10px 10px -5px rgba(244, 105, 156, 0.08);
        }

        /* Custom buttons styling */
        .btn-modern-primary {
            background: var(--primary-gradient);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(244, 105, 156, 0.35);
            transition: var(--transition);
        }

        .btn-modern-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(244, 105, 156, 0.5);
            color: #ffffff;
            opacity: 0.95;
        }

        .btn-modern-secondary {
            background: #ffffff;
            color: var(--text-dark);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-modern-secondary:hover {
            background: var(--pink-50);
            color: var(--text-dark);
            border-color: var(--pink-300);
        }

        .btn-modern-danger {
            background: linear-gradient(135deg, #ff8fa3 0%, #f4506f 100%);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(244, 80, 111, 0.25);
            transition: var(--transition);
        }

        .btn-modern-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(244, 80, 111, 0.4);
            color: #ffffff;
            opacity: 0.95;
        }

        .btn-modern-warning {
            background: linear-gradient(135deg, #ffcd7a 0%, #ffab5e 100%);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(255, 171, 94, 0.25);
            transition: var(--transition);
        }

        .btn-modern-warning:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(255, 171, 94, 0.4);
            color: #ffffff;
            opacity: 0.95;
        }

        /* Footer styling */
        footer {
            background: var(--dark-gradient);
            color: #f3d4e2;
            padding: 2rem 0;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            font-size: 0.9rem;
        }
    </style>
</head>

<nav class="navbar navbar-expand-lg navbar-custom sticky-top navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">PHAKHANAN-PROJECT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-1">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('index') ? 'active' : '' }}" href="{{ route('index') }}">หน้าแรก (Admin Blogs)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Dashboard สมาชิก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('blogs') ? 'active' : '' }}" href="{{ route('blogs') }}">บทความทั่วไป</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('abouts') ? 'active' : '' }}" href="{{ route('abouts') }}">เกี่ยวกับเรา</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body>
    <div class="main-wrapper py-5">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <footer>
        <div class="container text-center">
            <p class="mb-0">© {{ date('Y') }} PHAKHANAN-PROJECT. Crafted with Passion & Modern Aesthetics.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
