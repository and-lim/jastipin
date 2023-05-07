@extends('layout')

@section('mainSection')

        <section class="hero">  
            <div class="hero-header py-5">
                <div class="container mt-2">
                    <div class="row">
                        <div class="col-lg-6 mx-auto text-center text-lg-center">
                            <h1 class="text-white mb-4 text-slider-items intro-title text-center">Jastipin</h1>
                        </div>
                    </div>
                    <div class="form-group mx-auto col-lg-8">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-5">
                            <input type="text" class="form-control" placeholder="Departure" aria-label="First name">
                            </div>
                            <div class="col-lg-1">
                                <div class="bg-white" style="height: 5px;"></div>
                            </div>
                            <div class="col-lg-5">
                            <input type="text" class="form-control" placeholder="Destination" aria-label="Last name">
                            </div>
                        </div>
                        <div class="row mt-5 text-center d-flex justify-content-center mx-auto">
                            <div class="search-form col-lg-9 ">
                                <i class="fa fa-search"></i>
                                <input type="text" class="form-control form-input" placeholder="Search anything...">
                            </div>
                        </div>
                        <div class="search-button d-flex justify-content-center mt-3">
                            <a href="" class="btn btn-warning text-center mx-auto">Search</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line p-2"></div>
        </section>
    
        <section class="">
            <div class="container-xl my-5">
                <div class="text-title mb-3 pb-3">
                    <h1 class="text-start home-title">Popular item</h1>
                </div>

                <div class="row mt-3" style="row-gap: 1rem;">
                    <div class="col-lg-3">
                        <div class="category-card" >
                            <div class="card-image">
                                <img src="img/laptop.jpg" alt="" srcset="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Food</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="category-card position-relative" >
                            <div class="card-image">
                                <img src="img/laptop.jpg" alt="" srcset="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Electronic</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="category-card" >
                            <div class="card-image">
                                <img src="img/laptop.jpg" alt="" srcset="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Skin Care</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="category-card" >
                            <div class="card-image">
                                <img src="img/laptop.jpg" alt="" srcset="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Fashion</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="float-end mt-3">
                    <a href="" class="btn btn-warning">
                        See more Item
                    </a>
                </div>
            </div>
        </section>
    
    
        <section class="trip-list my-3 py-3">
            <div class="container my-3">
                <h1 class="title mb-3">Trip</h1>
                <div class="row ">
                    <div class="col-lg-10">
                        <div class="trip-list d-flex flex-column gap-2">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <img src="img/laptop.jpg" class="img-fluid" alt="">
                                            <h5 class="text-center">name</h5>
                                        </div>
                                    <div class="col-lg-9">
                                        <h3 class="text-primary fw-bold">Jakarta - Tokyo</h3>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At debitis itaque blanditiis dicta porro quidem nihil magni molestiae nemo aspernatur. Et doloremque porro quaerat culpa officiis molestiae ducimus asperiores eligendi.</p>
                                    <div class="row g-0">
                                        <div class="col-lg-2">
                                            <img src="img/snack.jpg" style="width: 60px" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-lg-2">
                                            <img src="img/snack.jpg" style="width: 60px" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-lg-2">
                                            <img src="img/snack.jpg" style="width: 60px" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-lg-2">
                                            <img src="img/snack.jpg" style="width: 60px" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-lg-2">
                                            <img src="img/snack.jpg" style="width: 60px" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="float-end">
                                        <a href="/trip-detail" class="btn btn-outline-primary">see details</a>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/trip" class="btn btn-primary float-end">See more Trip</a>
            </div>
        </section>
    
        <section class="about py-3 my-5">
            <div class="container mt-3">
                <div class="section-title text-center pt-5"></div>
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="text-primary">About us</h3>
                        <p>Jastipin adalah Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit earum repellat ratione, eos quo voluptatem excepturi, voluptate pariatur molestias quasi veniam, sit sapiente consequatur nihil totam sed itaque. Sequi, eum!</p>
                    </div>
                    <div class="col-lg-5">
                        <div class="img-about position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid" src="img/jastip.jpg" style="width: 450px" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

      @endsection