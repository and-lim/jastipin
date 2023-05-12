@extends('layout')

@section('mainSection')
<section class="py-5">

    <div class="hero-header py-5" style="height: 70vh">
        <div class="container mt-4">
            <div class="row col-lg-10 mx-auto">
                <div class="search-title my-3 text-center">
                    <h1 class="fw-bold text-white">Search your Trip</h1>
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
                    <div class="row mt-5 justify-content-center">
                        <div class="calendar-form col-lg-6 ">
                            <input type="date" class="form-control form-input">
                        </div>
                    </div>
                    <div class="search-button d-flex justify-content-center mt-3">
                        <a href="" class="btn btn-warning text-center mx-auto">Search</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="line p-2"></div>

    <div class="container-fluid py-3 mx-1 mt-5">
        <h2 class="text-center fw-bold mb-3 ms-lg-3">Ongoing Trip</h2>
        <div class="row m-0">
            <div class="col-lg-3">
                <aside class="left-sidebar p-3 shadow">
                    <div class="sidebar-title">
                        <h5 class="fw-bold">Category</h5>
                    </div>
                    <div class="category-list mt-3">
                        <input type="checkbox" id="food" name="food" value="food">
                        <label for=""> Food</label><br></li>
                        <input type="checkbox" id="food" name="food" value="food">
                        <label for=""> Food</label><br></li>
                        <input type="checkbox" id="food" name="food" value="food">
                        <label for=""> Food</label><br></li>
                    </div>
                </aside>
            </div>

          <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trip-list">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 text-center">
                                        <img src="img/laptop.jpg" class="img-fluid" style="width: 200px" alt="">
                                        <h5 class="text-center">name</h5>
                                        <a href="/traveler" class="btn btn-success"> See Profile</a>
                                    </div>
                                <div class="col-lg-9">
                                    <h3 class="text-primary fw-bold">Jakarta - Tokyo</h3>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At debitis itaque blanditiis dicta porro quidem nihil magni molestiae nemo aspernatur. Et doloremque porro quaerat culpa officiis molestiae ducimus asperiores eligendi.</p>
                                <div class="row gap-1">
                                    <div class="col-lg-2 trip-item">
                                        <img src="img/snack.jpg" style="width: 70px" class="img-fluid item-img" alt="">
                                        <div class="img-detail d-flex flex-column mt-1">
                                            <label for="" class="form-label mb-0">Snack</label>
                                            <label for="" class="form-label mb-0">$30</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 trip-item">
                                        <img src="img/snack.jpg" style="width: 70px" class="img-fluid item-img" alt="">
                                        <div class="img-detail d-flex flex-column mt-1">
                                            <label for="" class="form-label mb-0">Snack</label>
                                            <label for="" class="form-label mb-0">$30</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 trip-item">
                                        <img src="img/snack.jpg" style="width: 70px" class="img-fluid item-img" alt="">
                                        <div class="img-detail d-flex flex-column mt-1">
                                            <label for="" class="form-label mb-0">Snack</label>
                                            <label for="" class="form-label mb-0">$30</label>
                                        </div>
                                    </div>

                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
    </div>

</section>
@endsection