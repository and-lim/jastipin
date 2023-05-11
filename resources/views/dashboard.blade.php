@extends('layout')

@section('mainSection')
<section>
    <div class="hero hero-header" style="height: 50vh">
        <div class="container">
            <h1 class="text-white text-center">Dashboard</h1>
        </div>
    </div>

    <div class="container my-3 py-5 dashboard">
        <div class="row">
            <div class="col-lg-3">
                <div class="menu-header text-center mb-3">Menu</div>
                <ul class="nav flex-column gap-2" id="nav-tab" role="tablist">
                    <li class="dashboard-nav">
                        <a class="nav-link active d-flex align-items-center" id="nav-dashboard-tab" data-bs-toggle="tab" data-bs-target="#nav-dashboard" type="button" role="tab" aria-controls="nav-dashboard" aria-selected="true">
                            <i class="fa fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="dashboard-nav">
                        <a class="nav-link d-flex align-items-center" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false">
                            <i class="fa fa-user"></i>
                            <span>Profile </span>
                        </a>
                    </li>

                    <li class="dashboard-nav">
                        <a class="nav-link d-flex align-items-center" id="nav-item-tab" data-bs-toggle="tab" data-bs-target="#nav-item" type="button" role="tab" aria-controls="nav-item" aria-selected="false">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Item</span>
                        </a>
                    </li>

                    <li class="dashboard-nav ">
                        <a class="nav-link d-flex align-items-center" id="nav-trip-tab" data-bs-toggle="tab" data-bs-target="#nav-trip" type="button" role="tab" aria-controls="nav-trip" aria-selected="false">
                            <i class="fa fa-map-marker-alt"></i>
                            <span>Trip</span>
                        </a>
                    </li>
                    <li class="dashboard-nav">
                        <a class="nav-link d-flex align-items-center" id="nav-request-tab" data-bs-toggle="tab" data-bs-target="#nav-request" type="button" role="tab" aria-controls="nav-request" aria-selected="false">
                            <i class="fa fa-question-circle"></i>
                            <span>Request</span>
                        </a>
                    </li>
                    @auth
                    <form action="/logout" method="POST">
                        @csrf
                        <li class="dashboard-nav">
                            <button class="btn btn-link nav-link text-decoration-none d-flex gap-4 align-items-center" type="submit" id="logout">
                                <i class="fa fa-power-off"></i>
                                <span>Logout</span>
                            </button>
                        </li>
                    </form>
                    @endauth
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="menu-header text-center mb-3">Dashboards</div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel" aria-labelledby="nav-dashboard-tab">
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="card shadow-sm py-3">
                                    <h1 class="text-dark fw-bold px-3">welcome</h1><br>
                                    <h3 class="px-3">User</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card shadow-sm text-center">
                                    <h2 class="text-dark fw-bold mt-1">Balance</h2>
                                    <div class="card-body mt-0">
                                        <h2 class="text-success">$20</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card shadow-sm text-center">
                                    <h2 class="text-dark fw-bold mt-1">Trip</h2>
                                    <a href="/trip" class="card-body dashboard-icon mt-0">
                                        <i class="fa fa-map-marker-alt fa-2x text-warning"></i>
                                        <h2>30</h2>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card shadow-sm text-center">
                                    <h2 class="text-dark fw-bold mt-1">Item</h2>
                                    <a href="/item" class="card-body dashboard-icon mt-0">
                                        <i class="fa fa-shopping-cart fa-2x text-primary"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- tab update profile --}}

                    <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                        <div class="image-profile d-flex flex-column justify-content-center align-items-center my-3">
                            <img src="img/laptop.jpg" class="" alt="">
                            <input type="file" class="form-control mt-3" style="width: 300px" id="image">
                        </div>

                        <div class="card p-3 shadow-sm">
                            <div class="mb-3 form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control" id="name">
                                </div>
                            </div>
                            <div class="mb-3 form-group row">
                                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control" id="email">
                                </div>
                            </div>
                            <div class="mb-3 form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword">
                                </div>
                            </div>
                            <div class="mb-3 form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="submit-btn text-center">
                                <a href="" class="btn btn-primary">Submit</a>
                            </div>

                        </div>
                    </div>

                    {{-- tab item list --}}

                    <div class="tab-pane fade" id="nav-item" role="tabpanel" aria-labelledby="nav-item-tab">
                    <div class="row g-0">
                        <h1 class="dashboard-title mb-3">Item List</h1>
                        <div class=" mb-3">
                          <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Add Item
                                </button>
                                
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add Item</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="add-item-form">
                                            <div class="mb-3 form-group row">
                                                <label for="Item" class="col-sm-2 col-form-label">Item Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="item-name">
                                                </div>
                                            </div>
            
                                            <div class="mb-3 form-group row">
                                                <label for="Location" class="col-sm-2 col-form-label">Location</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="location">
                                                </div>
                                            </div>
            
                                            <div class="mb-3 form-group row">
                                                <label for="Price" class="col-sm-2 col-form-label">Price</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="price" placeholder="Rp">
                                                </div>
                                            </div>
            
                                            <div class="mb-3 form-group row">
                                                <label for="image" class="col-sm-2 col-form-label">Select Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" id="image">
                                                    <a href="" class="btn btn-primary mt-2">upload</a>
                                                </div>
                                            </div>
            
                                            <div class="form-group mb-3">
                                                <label for="" class="form-label">Add Description</label>
                                                <textarea name="" class="form-control" id="" cols="30" rows="2"></textarea>
                                            </div>
            
                                            <div class="form-group mb-3">
                                                <label for="" class="form-label">Add some Note</label>
                                                <textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Add Item</button>
                                    </div>
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <img src="img/laptop.jpg" class="img-fluid" alt="">
                                            </div>
                                            <div class="col-lg-9">
                                                <h1 class="mb-2">Lorem</h1>
                                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At debitis itaque blanditiis dicta porro quidem nihil magni molestiae nemo aspernatur. Et doloremque porro quaerat culpa officiis molestiae ducimus asperiores eligendi.</p>

                                                <div class="float-end d-flex gap-2">
                                                    <input type="number" style="width: 50px">
                                                    <a href="" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    {{-- add item tab --}}

                    <div class="tab-pane fade" id="nav-add-item" role="tabpanel" aria-labelledby="nav-add-item-tab">
                        <h1 class="dashboard-title mb-3">Add item</h1>
                        <div class="row">
                            <div class="card p-3 shadow-sm">
                                <div class="mb-3 form-group row">
                                    <label for="Item" class="col-sm-2 col-form-label">Item Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="item-name">
                                    </div>
                                </div>

                                <div class="mb-3 form-group row">
                                    <label for="Location" class="col-sm-2 col-form-label">Location</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="location">
                                    </div>
                                </div>

                                <div class="mb-3 form-group row">
                                    <label for="Price" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="price" placeholder="Rp">
                                    </div>
                                </div>

                                <div class="mb-3 form-group row">
                                    <label for="image" class="col-sm-2 col-form-label">Select Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="image">
                                        <a href="" class="btn btn-primary mt-2">upload</a>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Add Description</label>
                                    <textarea name="" class="form-control" id="" cols="30" rows="2"></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Add some Note</label>
                                    <textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
                                </div>

                                <div class="submit-btn text-center">
                                    <a href="" class="btn btn-primary">Submit</a>
                                </div>

                            </div>
                        </div>
                    </div>


                    {{-- tab trip list --}}

                    <div class="tab-pane fade" id="nav-trip" role="tabpanel" aria-labelledby="nav-trip-tab">
                        <h1 class="dashboard-title mb-3">Trip List</h1>
                        <ul class="nav nav-pills gap-2 justify-content-end mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class=" active btn btn-primary" id="pills-trip-tab" data-bs-toggle="pill" data-bs-target="#pills-trip" type="button" role="tab" aria-controls="pills-trip" aria-selected="true">Trip List</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="btn btn-success" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-add-trip" type="button" role="tab" aria-controls="pills-add-trip" aria-selected="false">Add Trip</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-trip" role="tabpanel" aria-labelledby="pills-trip-tab">

                                <div class="trip-list d-flex flex-column gap-2">
                                    <h3 class="fw-bold">Draft Trip</h3>
                                    @foreach($draft_trip as $dt)
                                    
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <img src="img/laptop.jpg" class="img-fluid" alt="">
                                                    <h5 class="text-center">{{ $dt->fullname }}</h5>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="trip-desc">
                                                        <h3 class="text-primary fw-bold">{{ $dt->destination }} - {{ $dt->origin }}</h3>
                                                        <p>{{ $dt->description }}</p>
                                                    </div>

                                                    <div class="float-end">
                                                        <a href="/trip-draft/{{ $dt->id }}" class="btn btn-primary">Update Trip</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="ongoing-trip mt-4 d-flex flex-column gap-2">
                                    <h3 class="fw-bold">Ongoing Trip</h3>
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <img src="img/laptop.jpg" class="img-fluid" alt="">
                                                    <h5 class="text-center">name</h5>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="trip-desc">
                                                        <h3 class="text-primary fw-bold">Jakarta - Tokyo</h3>
                                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At debitis itaque blanditiis dicta porro quidem nihil magni molestiae nemo aspernatur. Et doloremque porro quaerat culpa officiis molestiae ducimus asperiores eligendi.</p>
                                                    </div>
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

                                                  <a href="/ongoing-trip" class="btn btn-outline-primary float-end"> See Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- add trip tab --}}
                            <form action="/addTrip" method="POST">
                                @csrf
                                <div class="tab-pane fade" id="pills-add-trip" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card p-3 shadow-sm mt-2">
                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <div class="col-lg-5">
                                                    <label for="destination" class="form-label">Destination</label>
                                                    <input type="text" name="destination" class="form-control" placeholder="Destination" aria-label="destination">
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="bg-dark mt-4" style="height: 5px;"></div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <label for="origin" class="form-label">Origin</label>
                                                    <input type="text" name="origin" class="form-control" placeholder="Origin" aria-label="origin">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <div class="col-lg-5">
                                                    <label for="start_date" class="form-label">Start Date</label>
                                                    <input id="start_date" name="start_date" class="form-control" type="date" />
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="bg-dark mt-4" style="height: 5px;"></div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <label for="arrival_date" class="form-label">Arrival Date</label>
                                                    <input id="arrival_date" name="arrival_date" class="form-control" type="date" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ms-4 mb-3">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="request" class="form-label">Request</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="request_other" id="exampleRadios1" value="1" checked>
                                                        <label class="form-check-label" for="yes">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="request_other" id="exampleRadios2" value="0">
                                                        <label class="form-check-label" for="no">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="description" class="form-label">Add Description</label>
                                            <textarea name="description" class="form-control" id="description" cols="30" rows="2"></textarea>
                                        </div>

                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-primary">Make Trip</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="tab-fane fade" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab">'
                        <h1 class="dashboard-title pb-3 mb-3">Request</h1>
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <img src="img/laptop.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-9">
                                        <h1 class="mb-2">Lorem</h1>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At debitis itaque blanditiis dicta porro quidem nihil magni molestiae nemo aspernatur. Et doloremque porro quaerat culpa officiis molestiae ducimus asperiores eligendi.</p>

                                        <div class="float-end d-flex gap-2">
                                            <input type="number" style="width: 50px">
                                            <a href="" class="btn btn-success">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a href="" class="btn btn-danger">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection