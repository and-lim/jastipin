@extends('layout')

@section('mainSection')
<section class="mt-5">
    <div class="container py-5">

        <div class="row bg-dark mx-5 rounded-3 shadow-3" style="min-height: 75vh;">
            <div class="col-lg-6 py-5 text-white d-flex flex-column justify-content-center">
                <div class="login-title text-center">
                    <h1 class="fw-bold">Login Page</h1>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1">
                </div>
                <a href="/register" class="text-warning text-decoration-none">Dont have account register now</a>
                <div class="mt-3">
                    <a href="" class="btn btn-warning px-5 rounded-1 w-100"> Log in</a>
                </div>
            </div>
            <div class="col-lg-6 position-relative d-lg-block d-none">
                <div>
                    <img class="position-absolute h-100 w-100" src="img/snack.jpg" alt="">
                </div>
                <div class="position-absolute h-100 w-100" style="background-color: rgba(6, 5, 39, 0.5);"></div>
            </div>
        </div>
    </div>
</section>
@endsection