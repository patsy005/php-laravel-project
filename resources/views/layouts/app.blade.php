@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aurora Igloos</title>
    <link rel="shortcut icon" type="image/png" href="images/logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="../../slick/slick-theme.css" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="wrapper d-flex justify-content-between container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Logo"
                    width="40"
                    height="40"
                    class="d-inline-block align-text-top me-2" />
                Aurora Igloos
            </a>
            <button
                class="navbar-toggler custom-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                    <a class="nav-link {{ request()->routeIs('bookings.*') ? 'active' : '' }}" href="{{ route('bookings.index') }}">Bookings</a>
                    <a class="nav-link {{ request()->routeIs('igloos.*') ? 'active' : '' }}" href="{{ route('igloos.index') }}">Igloos</a>
                    <a class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}" href="{{ route('employees.index') }}">Employees</a>
                    <a class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}" href="{{ route('customers.index') }}">Customers</a>
                    <a class="nav-link {{ request()->routeIs('discounts.*') ? 'active' : '' }}" href="{{ route('discounts.index') }}">Discounts</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="row">
            <div class="col-12">
                <div class="main">
                    <header class="header">
                        <div class="user">
                            <div class="user__img">
                                <img src="{{ asset('images/employees/' . $authEmployee->image) }}" alt="user image" />
                                <div class="user__status user__status--active"></div>
                            </div>
                            <div class="user__data">
                                <h4 class="user__name">
                                    {{ $authEmployee->name}} {{ $authEmployee->surname }}
                                </h4>
                                <p class="user__email">
                                    {{ $authEmployee->email }}
                                </p>
                            </div>
                        </div>

                        <div class="action-btns d-flex">
                            <button class="btn">
                                <img src="{{ asset('icons/msg.svg') }}" alt="" />
                            </button>
                            <button class="btn">
                                <img src="{{ asset('icons/notification.svg') }}" alt="" />
                            </button>
                            <a href="../../php/logout/logoutEmployee.php" class="btn">
                                <img src="{{ asset('icons/logout.svg') }}" alt="" />
                            </a>
                        </div>
                    </header>

                </div>
            </div>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} IceHotel
    </footer>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- <script src="../../js/components/slick.js"></script> -->

</body>

</html>