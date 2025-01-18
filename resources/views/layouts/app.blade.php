<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}"><strong>@lang('header.shop')</strong></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <strong>{{ Auth::user()->name }}</strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        @lang('header.logout')
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">@lang('header.login')</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">@lang('header.registration')</a>
                            </li>
                        @endif
                    @endauth
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-language"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('setLanguage', 'en') }}">English</a>
                        <a class="dropdown-item" href="{{ route('setLanguage', 'uk') }}">Українська</a>
                        <a class="dropdown-item" href="{{ route('setLanguage', 'ru') }}">Русский</a>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        <i class="fa-solid fa-cart-shopping"></i>
                        @if(isset($cartCount) && $cartCount > 0)
                            <span class="badge bg-danger">{{ $cartCount }}</span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

<footer class="bg-light py-4 mt-auto">
    <div class="container text-center">
        <p class="mb-0">&copy; {{ date('Y') }} @lang('footer.rights_reserved')</p>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
