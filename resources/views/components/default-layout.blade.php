<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>SIREKA INFOCUS</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">

    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold"
           href="/dashboard">

            SIREKA INFOCUS

        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse"
             id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-center">

                <!-- DASHBOARD -->
                @auth

                <li class="nav-item">

                    <a class="nav-link"
                       href="/dashboard">

                        Dashboard

                    </a>

                </li>

                @endauth

                <!-- MENU ADMIN -->
                @auth

                @if(auth()->user()->role == 'admin')

                <li class="nav-item">

                    <a class="nav-link"
                       href="/infokus">

                        Kelola Infokus

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="/peminjaman">

                        Semua Peminjaman

                    </a>

                </li>

                @endif

                @endauth

                <!-- MENU USER -->
                @auth

                @if(auth()->user()->role == 'user')

                <li class="nav-item">

                    <a class="nav-link"
                       href="/infokus">

                        Daftar Infokus

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="/peminjaman">

                        Peminjaman Saya

                    </a>

                </li>

                @endif

                @endauth

                <!-- PROFILE -->
                @auth

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown">

                        {{ auth()->user()->name }}

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>

                            <a class="dropdown-item"
                               href="/profile">

                                Profile

                            </a>

                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>

                            <form action="/logout"
                                  method="POST">

                                @csrf

                                <button type="submit"
                                        class="dropdown-item text-danger">

                                    Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </li>

                @endauth

                <!-- GUEST -->
                @guest

                <li class="nav-item">

                    <a class="nav-link"
                       href="/login">

                        Login

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="/register">

                        Register

                    </a>

                </li>

                @endguest

            </ul>

        </div>

    </div>

</nav>

<!-- CONTENT -->
<div class="container mt-4">

    {{ $slot }}

</div>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>