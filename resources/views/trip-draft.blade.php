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
                    {{-- <li class="dashboard-nav">
                        <a class="nav-link d-flex align-items-center" id="nav-dashboard-tab" data-bs-toggle="tab" data-bs-target="#nav-dashboard" type="button" role="tab" aria-controls="nav-dashboard" aria-selected="true">
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
                    </li> --}}

                    <li class="dashboard-nav ">
                        <a class="nav-link active d-flex align-items-center" id="nav-trip-tab" data-bs-toggle="tab" data-bs-target="#nav-trip" type="button" role="tab" aria-controls="nav-trip" aria-selected="false">
                            <i class="fa fa-map-marker-alt"></i>
                            <span>Trip Draft</span>
                        </a>
                    </li>
                    {{-- <li class="dashboard-nav">
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
                    @endauth --}}
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="menu-header text-center mb-3">Dashboards</div>
                <div class="tab-content" id="nav-tabContent">
                    {{-- <div class="tab-pane fade" id="nav-dashboard" role="tabpanel" aria-labelledby="nav-dashboard-tab">
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

                    </div> --}}

                    {{-- tab update profile --}}

                    {{-- <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

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
                    </div> --}}

                    {{-- tab item list --}}

                    {{-- <div class="tab-pane fade" id="nav-item" role="tabpanel" aria-labelledby="nav-item-tab">
                        <h1 class="dashboard-title mb-3">Item List</h1>
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
                    </div> --}}

                    {{-- add item tab --}}

                    {{-- <div class="tab-pane fade" id="nav-add-item" role="tabpanel" aria-labelledby="nav-add-item-tab">
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
                    </div> --}}


                    {{-- tab trip list --}}


                    <div class="tab-pane show active fade" id="nav-trip" role="tabpanel" aria-labelledby="nav-trip-tab">
                        <div class="draft-trip">
                            <div class="row">
                                <h3 class="fw-bold mb-3">Draft Trip</h3>
                                <div>
                                    <a href="/dashboard" class="btn btn-warning p-1 float-end">
                                        <h6 class="mt-2"><i class="fa fa-arrow-left me-2"></i>  
                                            Back to Dashboard   
                                        </h6>
                                    </a>
                                </div>
                            </div>
                            <form action="/trip-draft" method="POST">
                                @csrf
                                <div class="card mb-3 p-3 shadow-sm mt-2">
                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-lg-5">
                                                <label for="destination" class="form-label">Destination</label>
                                                <input type="text" name="destination" class="form-control" placeholder="From" aria-label="destination" value="{{ $edit_trip->destination }}">
                                            </div>
                                            <div class="col-lg-1">
                                                <div class="bg-dark mt-4" style="height: 5px;"></div>
                                            </div>
                                            <div class="col-lg-5">
                                                <label for="origin" class="form-label">Origin</label>
                                                <input type="text" name="origin" class="form-control" placeholder="origin" aria-label="origin" value="{{ $edit_trip->origin }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-lg-5">
                                                <label for="start_date" class="form-label">Start Date</label>
                                                <input id="start_date" name="start_date" class="form-control" type="date" value="{{ $edit_trip->start_date }}" />
                                            </div>
                                            <div class="col-lg-1">
                                                <div class="bg-dark mt-4" style="height: 5px;"></div>
                                            </div>
                                            <div class="col-lg-5">
                                                <label for="arrival_date" class="form-label">Arrival Date</label>
                                                <input id="arrival_date" name="arrival_date" class="form-control" type="date" value="{{ $edit_trip->arrival_date }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ms-4 mb-3">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="request" class="form-label">Request</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="request_other" id="exampleRadios1" value="1" @if ($edit_trip->request == 1) checked @endif>
                                                        <label class="form-check-label" for="yes">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="request_other" id="exampleRadios2" value="0" @if ($edit_trip->request == 0) checked @endif>
                                                        <label class="form-check-label" for="no">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="description" class="form-label">Add Description</label>
                                            <textarea name="description" class="form-control" id="description" cols="30" rows="2">{{ $edit_trip->description }}</textarea>
                                        </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <input type="hidden" name="id" value="{{ $edit_trip->id }}">
                                        <button type="submit" class="btn btn-primary">Update Trip</button>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Add Item
                                        </button>
                                    </div>
                            </form>

                            {{-- modal item--}}
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add a item</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="add-item">
                                                <div class="mb-3 form-group">
                                                    <label for="Item" class="form-label">Item Name</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" name="" class="form-control" id="item-name">
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="" class="form-label">Category</label>
                                                    <div class="col-sm-5">
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>Open this select menu</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 form-group">
                                                    <label for="image" class="col-form-label">Select Image</label>
                                                    <div class="col-sm-8">
                                                        <input type="file" class="form-control" id="image">
                                                        <a href="" class="btn btn-primary mt-2">upload</a>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <div class="col-lg-6">
                                                        <label for="" class="form-label">Item weight</label>
                                                        <input type="number" style="width: 30px" name="" id=""> kg
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="" class="form-label">Item Amount</label>
                                                        <input type="number" style="width: 30px" name="" id="">
                                                    </div>
                                                </div>
                                                <div class="mb-3 form-group ">
                                                    <label for="Price" class="form-label">Item Price</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" id="price" placeholder="Rp">
                                                    </div>
                                                </div>

                                                <div class="mb-3 form-group ">
                                                    <label for="Price" class="form-label">Item Display Price</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" id="price" placeholder="Rp">
                                                    </div>
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

                    {{-- item --}}
                    <div class="item-trip">
                        <div class="card p-3">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <img src="img/laptop.jpg" style="width: 200px" alt="" srcset="">
                                </div>
                                <div class="col-lg-3">
                                    <p>Item Name</p>
                                    <p>Item Category</p>
                                    <p>Item Weight</p>
                                </div>
                                <div class="col-lg-3">
                                    <p>Item Name</p>
                                    <p>Item Category</p>
                                    <p>Item Weight</p>
                                </div>
                                <div class="col-lg-1 d-flex align-items-center">
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
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