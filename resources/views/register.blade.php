@extends('layout')

@section('mainSection')


<section class="mt-5">
    <div class="container py-5">
        <form action="/register" method="POST">
            @csrf
            <div class="row bg-dark mx-5 rounded-3 shadow-3" style="min-height: 75vh;">
                <div class="col-lg-6 py-5 text-white d-flex flex-column justify-content-center">
                    <div class="login-title text-center">
                        <h1 class="fw-bold">Sign Up</h1>
                    </div>
                <div class="form-wrap mx-2">
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                        <input type="text" name="fullname" class="form-control" id="fullname">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                        <input type="tel" name="phone_number" class="form-control" id="phone_number">
                    </div>
                    <div class="form-group d-flex flex-column mb-3">
                        <label for="destination" class="form-label">City</label>
                        <div class="dropdown-datalist">
                            <input list="datalistOptions" id="exampleDataList" name="city" class="form-control" placeholder="City" aria-label="city">
                        </div>
                        <datalist id="datalistOptions">
                            <option value="San Francisco">
                                <option value="New York">
                                <option value="Seattle">
                                <option value="Los Angeles">
                                <option value="Chicago">
                        </datalist>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                    </div>
                </div>
                
                    <div class="mt-3">
                        <button type="submit" class="btn btn-warning px-5 rounded-1 w-100"> Register</button>
                    </div>
                </div>
                <div class="col-lg-6 position-relative d-lg-block d-none">
                    <div>
                        <img class="position-absolute h-100 w-100" src="img/snack.jpg" alt="">
                    </div>
                    <div class="position-absolute h-100 w-100" style="background-color: rgba(6, 5, 39, 0.5);"></div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection