<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jastip</title>
    {{-- css --}}
    <link rel="stylesheet" href="{{ URL::asset('css/css.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand ms-lg-5 text-white" href="#">Jastipin</a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-color: white;"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-between mx-3" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto ms-lg-3 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/item">Item</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Trip
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="@auth / @endauth @guest /login @endguest">Post a Trip</a></li>
                        <li><a class="dropdown-item" href="/trip">Search Trip</a></li>
                    </ul>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link" href="/order">Order 
                        <span class="bg-danger position-absolute top-0 ms-1" style="font-size: 10px;" >10</span>
                    </a>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link" href="">Approval 
                        <span class="bg-danger position-absolute top-0 ms-1" style="font-size: 10px;" >10</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto me-lg-5 align-items-center d-flex gap-5 text-white">
                @auth
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        {{ auth()->user()->fullname }}
                    </a>

                    <ul class="dropdown-menu">
                        <li class="dropdown-item mx-auto">
                            <a class="text-decoration-none ms-2 text-dark d-flex align-items-center gap-2 justify-content-center" href="/dashboard">
                                <i class="fa fa-columns"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        @auth
                        <form action="/logout" method="POST">
                            @csrf
                            <li class="dropdown-item mx-auto">
                                <button class="btn btn-link text-dark me-2 text-decoration-none d-flex gap-2 align-items-center" type="submit" id="logout">
                                    <i class="fa fa-power-off"></i>
                                    <span>Logout</span>
                                </button>
                            </li>
                        </form>
                        @endauth
                    </ul>
                </li>
                @endauth
                <li class="nav-item"><a href="@auth /cart @endauth @guest /login @endguest"> <i class="fa fa-cart-plus text-white"></i></a></li>

                @guest
                <li class="nav-item"><a href="/login" class="nav-link">login</a></li>
                @endguest

            </ul>
        </div>

    </nav>

    @yield('mainSection')

    <footer class="position-relative bottom-0 bg-dark py-2 text-white text-center">
        <h5>copyright &copy; jastip</h5>
    </footer>


    {{-- script --}}

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            // direction: 'vertical',
            slidesPerView: 1,
            loop: true,
            spaceBetween: 30,
            centeredSlides: true,
            grabCursor: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: true,
                pauseOnMouseEnter: true,
            },
            breakpoints: true,


            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetweenSlides: 50
                },
                1000: {
                    slidesPerView: 3,
                    spaceBetweenSlides: 50
                }
            },

            // autoplay: {
            // delay: 2500,
            // disableOnInteraction: false,
            // },

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            // scrollbar: {
            // 	el: '.swiper-scrollbar',
            // },
        });
    </script>

</body>

</html>