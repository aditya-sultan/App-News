<!DOCTYPE html>
<html lang="en">


<!-- blog.html  21 Nov 2019 03:50:31 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') - NEWS MANAGEMENT SYSTEM</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('otika') }}/css/app.min.css">
    <!-- Template CSS -->
    @stack('addon-style')
    <link rel="stylesheet" href="{{ asset('otika') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('otika') }}/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('otika') }}/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('otika') }}/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>
                        </li>
                    </ul>
                </div>
                @if (Auth::check())
                    <ul class="navbar-nav navbar-right">
                        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                    src="{{ asset('otika') }}/img/user.png" class="user-img-radious-style"> <span
                                    class="d-sm-none d-lg-inline-block"></span></a>
                            <div class="dropdown-menu dropdown-menu-right pullDown">
                                <div class="dropdown-title">Hello {{ Auth::user()->name }}</div>

                                <div class="dropdown-divider"></div>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button class="dropdown-item has-icon text-danger"> <i
                                            class="fas fa-sign-out-alt"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                @endif
            </nav>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        @if (Auth::check())
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                    Logout
                                </button>
                            </form>
                        @endif
                        @yield('container')
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    <a href="templateshub.net">Templateshub</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('otika') }}/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{ asset('otika') }}/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('otika') }}/js/custom.js"></script>
    @stack('addon-script')
</body>


<!-- blog.html  21 Nov 2019 03:50:52 GMT -->

</html>
