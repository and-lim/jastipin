@extends('layout')

@section('mainSection')
<section class="mt-5">
    <div class="container py-5">

        <form action="/login" method="POST">
            @csrf
            <div class="row bg-dark mx-5 rounded-3 shadow-3" style="min-height: 75vh;">
                <div class="col-lg-6 py-5 text-white d-flex flex-column justify-content-center">
                    <div class="login-title text-center">
                        <h1 class="fw-bold">Login Page</h1>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <a href="/register" class="text-warning text-decoration-none">Dont have account? Register now!</a>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-warning px-5 rounded-1 w-100"> Log in</button>
                    </div>
                </div>
                <div class="col-lg-6 position-relative d-lg-block d-none">
                    <div>
                        <img class="position-absolute h-100 w-100" src="img/jastip.jpg" alt="">
                    </div>
                    <div class="position-absolute h-100 w-100" style="background-color: rgba(6, 5, 39, 0.5);"></div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection