@extends('layout')

@section('mainSection')
<section>
    <div class="hero hero-header" style="height: 50vh">
        <div class="container">
            <h1 class="text-white text-center">Dashboard</h1>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-dark" role="alert" style="outline: none">
        <i class="text-danger mt-1">{{$errors->first()}}</i>
    </div>
    @endif
    <div class="container my-3 py-5 dashboard">
        <div class="row">
            <div class="col-lg-3">
                <div class="menu-header text-center mb-3">Menu</div>
                <ul class="nav d-flex flex-column gap-2" id="nav-tab" role="tablist">
                    <li class="dashboard-nav">
                        <a class="nav-link active d-flex align-items-center" id="nav-dashboard-tab" data-bs-toggle="tab" data-bs-target="#nav-dashboard" type="button" role="tab" aria-controls="nav-dashboard" aria-selected="true">
                            <i class="fa fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="dashboard-nav">
                        <a class="nav-link d-flex align-items-center" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-home" aria-selected="false">
                            <i class="fa fa-user"></i>
                            <span>Profile </span>
                        </a>
                    </li>

                    <li class="dashboard-nav">
                        <a class="nav-link d-flex align-items-center" id="nav-balance-tab" data-bs-toggle="tab" data-bs-target="#nav-balance" type="button" role="tab" aria-controls="nav-item" aria-selected="false">
                            <i class="fa fa-dollar-sign"></i>
                            <span>Balance</span>
                        </a>
                    </li>

                    <li class="dashboard-nav">
                        <a class="nav-link d-flex align-items-center" id="nav-item-tab" data-bs-toggle="tab" data-bs-target="#nav-transaction-list" type="button" role="tab" aria-controls="nav-transaction-list" aria-selected="false">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Transaction List</span>
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
                    <li class="dashboard-nav">
                        <a class="nav-link d-flex align-items-center" id="nav-transaction-tab" data-bs-toggle="tab" data-bs-target="#nav-transaction" type="button" role="tab" aria-controls="nav-request" aria-selected="false">
                            <i class="fa fa-money-bill"></i>
                            <span>Transaction</span>
                        </a>
                    </li>
                    <li class="dashboard-nav">
                        <a class="nav-link d-flex align-items-center" id="nav-shipment-tab" data-bs-toggle="tab" data-bs-target="#nav-shipment" type="button" role="tab" aria-controls="nav-request" aria-selected="false">
                            <i class="fa fa-truck"></i>
                            <span>Shipment</span>
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
                                    <h3 class="px-3">{{ auth()->user()->fullname }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-lg-4">
                                <div class="card shadow-sm text-center">
                                    <h2 class="text-dark fw-bold mt-1">Balance</h2>
                                    <div class="card-body mt-0">
                                        <h2 class="text-success">Rp {{ auth()->user()->balance }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card shadow-sm text-center">
                                    <h2 class="text-dark fw-bold mt-1">Trip</h2>
                                    <a href="/trip" class="card-body dashboard-icon mt-0">
                                        <i class="fa fa-map-marker-alt fa-2x text-warning"></i>
                                        <h2>1</h2>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card shadow-sm text-center">
                                    <h2 class="text-dark fw-bold mt-1">Item</h2>
                                    <a href="/item" class="card-body dashboard-icon mt-0">
                                        <i class="fa fa-shopping-cart fa-2x text-primary"></i>
                                        <h2>1</h2>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- tab update profile --}}

                    <div class="tab-pane fade " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form action="/updateProfile" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="image-profile d-flex flex-column justify-content-center align-items-center my-3">
                                <img src="{{ asset('/storage/' .$user_profile->avatar) }}" class="" alt="">
                                <input type="file" name="avatar" class="form-control mt-3" style="width: 300px" id="image">
                            </div>

                            <div class="card p-3 shadow-sm">
                                <div class="mb-3 form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="fullname" class="form-control" id="name" value="{{ $user_profile->fullname }}">
                                    </div>
                                </div>
                                <div class="mb-3 form-group row">
                                    <label for="Email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" class="form-control" id="email" value="{{ $user_profile->email }}">
                                    </div>
                                </div>
                                <div class="mb-3 form-group row">
                                    <label for="phoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="phone_number" class="form-control" id="email" value="{{ $user_profile->phone_number }}">
                                    </div>
                                </div>
                                <div class="mb-3 form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">City</label>
                                    <!-- <div class="col-sm-10">
                                        <input type="text" name="city" class="form-control" id="inputCity" value="">
                                    </div> -->
                                    <div class="dropdown-datalist">
                                        <input list="user_cities" id="exampleDataList" name="city" class="form-control" placeholder="City" aria-label="city" value="{{ $user_profile->city }}">
                                    </div>
                                    <datalist id="user_cities">
                                        @foreach($city as $c)
                                        <option value="{{ $c->name }}">
                                            @endforeach
                                    </datalist>
                                </div>

                                <div class="mb-3 form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea name="address" class="form-control" id="" cols="30" rows="5">{{ $user_profile->address }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">NPWP</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="npwp" class="form-control" id="inputCity" oninput="validateInput(this)" value="{{ $user_profile->npwp }}">
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="{{ $user_profile->id }}">
                                <div class="submit-btn text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </div>
                        </form>

                    </div>

                    {{-- Tab balance --}}
                    <div class="tab-pane fade" id="nav-balance" role="tabpanel" aria-labelledby="nav-balance-tab">
                        <h1 class="dashboard-title mb-3">Balance</h1>
                        <div class="row my-5">
                            <div class="col-lg-10 mx-auto">
                                <div class="card shadow p-3">
                                    <h3 class="fw-bold">Your Balance</h3>
                                    <h1 class="text-success text-center my-3 pb-3 mx-5">Rp {{ auth()->user()->balance }}</h1>
                                    <div class="button d-flex justify-content-center gap-3">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Add balance
                                        </button>
                                        <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#withdraw">
                                            Withdraw
                                        </button>
                                    </div>

                                    <!-- add balance Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Balance</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="/top_up" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group my-3">
                                                            <label for="" class="form-label">Bank Code</label>
                                                            <input type="text" required name="bank_code" class="form-control">
                                                        </div>
                                                        <div class="form-group my-3">
                                                            <label for="" class="form-label">Bank Account Number</label>
                                                            <input type="text" required name="account_number" class="form-control">
                                                        </div>
                                                        <div class="form-group my-3">
                                                            <label for="" class="form-label">Amount</label>
                                                            <input type="text" required id="topup_amount" name="amount" class="form-control">
                                                        </div>
                                                        <div class="d-flex gap-3">
                                                            <p>Unique Code :</p>
                                                            <p id="unique_amount"></p>
                                                        </div>
                                                        <div class="d-flex gap-3">
                                                            <p>Total Amount :</p>
                                                            <p id="total_amount"></p>
                                                        </div>
                                                        <div class="form-group my-3">
                                                            <label for="" class="form-label">Transfer Receipt</label>
                                                            <input type="file" name="transfer_receipt" required class="form-control">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer text-center">
                                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                        <input type="hidden" name="unique_code" id="unique_code" value="">
                                                        <input type="hidden" name="total_topup" id="total_topup" value="">
                                                        <button type="submit" class="btn btn-success">Add Balance</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- withdraw --}}
                                    <div class="modal fade" id="withdraw" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Withdraw</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="/withdraw" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group my-3">
                                                            <label for="" class="form-label">Amount</label>
                                                            <input type="text" required name="amount" class="form-control">
                                                        </div>
                                                        <div class="form-group my-3">
                                                            <label for="" class="form-label">Bank Code</label>
                                                            <input type="text" required name="bank_code" class="form-control">
                                                        </div>
                                                        <div class="form-group my-3">
                                                            <label for="" class="form-label">Bank Account Number</label>
                                                            <input type="text" required name="account_number" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer text-center">
                                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                        <button type="submit" class="btn btn-success">Withdraw</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <h3 class="fw-bold">Balance History</h3>
                            @foreach($balance_history as $history)
                            <div class="card col-lg-10 mx-auto shadow my-3 p-3" style="background-color: #bebebe">
                                <div class="card-title border-bottom border-dark border-2 mb-3 d-flex justify-content-between">
                                    <h3 class="fw-bold mb-3">
                                        <a href="/trip-detail/"></a>
                                    </h3>
                                    <div class="d-flex gap-2">
                                        <p>Status:</p>
                                        <p class="text-success">{{ $history->approval_status }}</p>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="d-flex justify-content-between">
                                        <p>Amount :</p>
                                        <p>Rp {{ $history->amount }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>Bank Code :</p>
                                        <p>{{ $history->bank_code }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>Unique Code :</p>
                                        <p>{{ $history->unique_code }}</p>
                                    </div>
                                    @if($history->transfer_receipt)
                                    <div class="d-flex justify-content-between">
                                        <p>Transfer Receipt :</p>
                                        <a href="{{ asset('/storage/' .$history->transfer_receipt) }}" data-fancybox="gallery" data-slug="dog">
                                            <img src="{{ asset('/storage/' .$history->transfer_receipt) }}" style="width: 150px" />
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- tab item list --}}

                    <div class="tab-pane fade" id="nav-transaction-list" role="tabpanel" aria-labelledby="nav-transaction-list-tab">
                        <div class="row g-0">
                            <h1 class="dashboard-title mb-3">Transaction List</h1>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Trip Name</th>
                                        <th>Traveler</th>
                                        <th>Buyer</th>
                                        <th>Balance</th>
                                        <th>Item Status</th>
                                        <th>Description</th>
                                        <th>Transaction Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <!-- <div class=" mb-3"> -->
                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Add Item
                                </button> -->

                            <!-- Modal -->
                            <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <form action="/addWtbItem" method="POST" enctype="multipart/form-data"> -->

                            <!-- <div class="modal-dialog modal-lg">
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
                                                                <input type="text" name="wtb_name" class="form-control" id="item-name">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 form-group row">
                                                            <label for="Location" class="col-sm-2 col-form-label">Location</label>
                                                            <div class="dropdown-datalist">
                                                                <input list="datalistOptions" id="exampleDataList" name="wtb_location" class="form-control" aria-label="origin">
                                                            </div>
                                                            <datalist id="datalistOptions">
                                                                
                                                            </datalist>
                                                        </div>

                                                        <div class="mb-3 form-group row">
                                                            <label for="Price" class="col-sm-2 col-form-label">Price</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="wtb_price" class="form-control" id="price" placeholder="Rp">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 form-group row">
                                                            <label for="image" class="col-sm-2 col-form-label">Select Image</label>
                                                            <div class="col-sm-10">
                                                                <input type="file" name="wtb_image" class="form-control" id="image">
                                                                <a href="" class="btn btn-primary mt-2">upload</a>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 form-group row">
                                                            <label for="wtb_weight" class="col-sm-2 me-lg-3 col-form-label">Item Weight</label>
                                                            <input type="number" name="wtb_weight" min="1" max="30" style="width: 70px">
                                                            <p>Kg</p>
                                                        </div>

                                                        <div class="mb-3 form-group row">
                                                            <label for="wtb_amount" class="col-sm-2 me-lg-3 col-form-label">Item Amount</label>
                                                            <input type="number" name="wtb_amount" min="1" max="100" style="width: 70px">
                                                            <p>Pc/s</p>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="" class="form-label">Add Description</label>
                                                            <textarea name="wtb_description" class="form-control" id="" cols="30" rows="2"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Add Item</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div> -->
                            <!-- </div> -->
                        </div>

                        <div class="row">
                            @foreach ($wtb_item as $wtb)
                            <div class="col-lg-12 my-3">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="row gap-3 p-0">
                                            <div class="col-lg-3">
                                                <img src="{{ asset('/storage/' .$wtb->wtb_image) }}" class="img-fluid" alt="">
                                            </div>
                                            <div class="col-lg-8">
                                                <h1 class="mb-2">{{ $wtb->wtb_name }}</h1>
                                                <p id="price">{{ $wtb->wtb_price }}</p>
                                                <p>{{ $wtb->wtb_location }}</p>
                                                <p>{{ $wtb->wtb_description }}</p>
                                                <div class="float-end d-flex align-items-center gap-4">
                                                    <p>Quantity: </p>
                                                    <p>{{ $wtb->wtb_amount }}</p>
                                                    <form action="/removeWtbItem" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $wtb->id }}">
                                                        <button class="btn btn-danger mb-3">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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

                                <div class="trip-list">
                                    <h3 class="fw-bold">Draft Trip</h3>
                                    @foreach($draft_trip as $dt)

                                    <div class="card shadow mb-3">
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

                                <div class="ongoing-trip mt-4 d-flex flex-column gap-3">
                                    <h3 class="fw-bold">Ongoing Trip</h3>

                                    @foreach ($ongoing_trip as $ot)

                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="row gap-3">
                                                <div class="col-lg-3">
                                                    <img src="{{ $ot->avatar }}" class="img-fluid" style="width: 200px" alt="">
                                                    <h5 class="text-center">{{ $ot->fullname }}</h5>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="trip-desc">
                                                        <h3 class="text-primary fw-bold">{{ $ot->destination }} - {{ $ot->origin }}</h3>
                                                        <p>{{ $ot->description }}</p>
                                                    </div>
                                                    <div class="row gap-1">
                                                        @foreach ($item_in_trip as $item)

                                                        @if ($item->trip_id == $ot->id)

                                                        <div class="col-lg-3">
                                                            <img src="{{ asset('/storage/' .$item->item_image) }}" class="item-img" alt="">
                                                            <div class="img-detail d-flex flex-column mt-1">
                                                                <label for="" class="form-label mb-0">{{ $item->item_name }}</label>
                                                                <label for="" class="form-label mb-0" id="price">Rp {{ $item->item_display_price }}</label>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        @endforeach
                                                    </div>

                                                    <a href="/trip-detail/{{ $ot->id }}" class="btn btn-outline-primary float-end"> See Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- add trip tab --}}
                            <form action="/addTrip" method="POST">
                                @csrf
                                <div class="tab-pane fade" id="pills-add-trip" role="tabpanel" aria-labelledby="pills-profile-tab">

                                    <div class="card p-3 shadow-sm mt-2">
                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <div class="col-lg-5 d-flex flex-column">
                                                    <label for="destination" class="form-label">Destination</label>
                                                    <div class="dropdown-datalist">
                                                        <input list="destinations" id="exampleDataList" name="destination" class="form-control" required placeholder="Destination" aria-label="destination">
                                                        @error('destination')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <datalist id="destinations">
                                                        @foreach ($destinations as $destination)

                                                        <option value="{{ $destination->name }}">

                                                            @endforeach
                                                    </datalist>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="bg-dark mt-4 d-lg-block d-none" style="height: 5px;"></div>
                                                </div>
                                                <div class="col-lg-5 d-flex flex-column">
                                                    <label for="origin" class="form-label">Origin</label>
                                                    <div class="dropdown-datalist">
                                                        <input list="origins" id="exampleDataList" name="origin" class="form-control" required placeholder="Origin" aria-label="origin">
                                                        @error('origin')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <datalist id="origins">
                                                        <option value="{{ auth()->user()->city }}">
                                                    </datalist>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <div class="col-lg-5">
                                                    <label for="start_date" class="form-label">Start Date</label>
                                                    <input id="start_date" name="start_date" required class="form-control" type="date" />
                                                    @error('start_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="bg-dark mt-4" style="height: 5px;"></div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <label for="arrival_date" class="form-label">Arrival Date</label>
                                                    <input id="arrival_date" name="arrival_date" required class="form-control" type="date" />
                                                    @error('arrival_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
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
                                            <textarea name="description" class="form-control" required id="description" cols="30" rows="2"></textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-primary">Make Trip</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab">
                        <h1 class="dashboard-title mb-5">Request</h1>
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
                                            <input type="number" min="1" style="width: 50px">
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

                    {{-- Shipment --}}
                    <div class="tab-pane fade" id="nav-shipment" role="tabpanel" aria-labelledby="nav-shipment-tab">
                        <div class="row mt-5">
                            <div class="title">
                                <h1 class="fw-bold">Shipment List</h1>
                            </div>
                            @foreach($shipping_list as $shipping)
                            <div class="col-lg-12">
                                <p>Transaction will automatically finished after {{ $shipping->ship_time_limit }} if you don't confirm your order</p>
                                <div class="card p-3">
                                    <div class="form-group mb-3 row">
                                        <label for="" class="col-sm-2 col-form-label">From</label>
                                        <div class="col-lg-10">
                                            <input type="text" readonly class="form-control-plaintext " id="" value="{{ $shipping->traveller }}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 row">
                                        <label for="" class="col-sm-2 col-form-label">To</label>
                                        <div class="col-lg-10">
                                            <input type="text" readonly class="form-control-plaintext " id="" value="{{ $shipping->buyer }}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 row">
                                        <label for="" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-lg-10">
                                            <input type="text" readonly class="form-control-plaintext " id="" value="{{ $shipping->address }}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 row">
                                        <label for="" class="col-sm-2 col-form-label">Shipping Type</label>
                                        <div class="col-lg-10">
                                            <input type="text" readonly class="form-control-plaintext " id="" value="{{ $shipping->shipping_name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Shipping Receipt</label>
                                        <div class="col-lg-3">
                                            <input type="text" readonly class="form-control" value="{{ $shipping->shipping_receipt }}">
                                        </div>
                                    </div>
                                    <form action="/received" method="POST">
                                        @csrf
                                        <input type="hidden" name="shipping_id" value="{{ $shipping->id }}">
                                        <!-- <input type="hidden" name="transaction_id" value="{{ $shipping->transaction_id }}"> -->
                                        <button type="submit" class="btn btn-outline-warning px-3">Item Received</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- transaction --}}
                    <div class="tab-pane fade" id="nav-transaction" role="tabpanel" aria-labelledby="nav-transaction-tab">
                        <h1 class="dashboard-title mb-3">Transaction</h1>
                        <div class="row my-4">
                            <h3 class="fw-bold my-3">Ongoing Transaction</h3>
                            @foreach($ongoing_transaction as $transaction)
                            <div class="card shadow p-3">
                                <h3 class="fw-bold mb-3">
                                    <a href="/trip-detail/{{ $transaction->trip_id }}">{{ $transaction->destination }} - {{ $transaction->origin }}</a>
                                </h3>
                                <div class="form-group mb-3 row">
                                    <div class="col-lg-2">
                                        <p>Address :</p>
                                    </div>
                                    <div class="col-lg-10">
                                        <p>{{ $transaction->address }}</p>
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <div class="col-lg-2">
                                        <p>Phone Number :</p>
                                    </div>
                                    <div class="col-lg-10">
                                        <p>{{ $transaction->phone_number }}</p>
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <div class="col-lg-2">
                                        <p>Shipping Type: </p>
                                    </div>
                                    <div class="col-lg-10">
                                        <p>{{ $transaction->shipping_name }}</p>
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <div class="col-lg-2">
                                        <p>Total Price: </p>
                                    </div>
                                    <div class="col-lg-10">
                                        <p>{{ $transaction->total_paid }}</p>
                                    </div>
                                </div>
                                @if($transaction->beacukai_pabean)
                                <div class="form-group mb-3 row">
                                    <div class="col-lg-2">
                                        <p>Tax: </p>
                                    </div>
                                    <div class="col-lg-10">
                                        <p>Rp {{ $transaction->beacukai_pabean }}</p>
                                    </div>
                                </div>
                                @endif
                                <div class="button d-flex justify-content-between">
                                    <!-- <button class="btn btn-outline-warning">Item Receive</button> -->
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#ongoing_transaction{{ $loop->iteration }}">
                                        See Detail
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ongoing_transaction{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Details</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card p-3">
                                                        <div class="card p-3 mb-3 shadow">
                                                            <div class="form-group mb-3 row">
                                                                <div class="col-lg-2">
                                                                    <p>Address :</p>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <p>{{ $transaction->address }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 col-form-label">Phone Number</label>
                                                                <div class="col-lg-10">
                                                                    <input type="text" readonly class="form-control-plaintext " id="" value="{{ $transaction->phone_number }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3 row">
                                                                <div class="col-lg-2">
                                                                    <p>Shipping Type: </p>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <p>{{ $transaction->shipping_name }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3 row">
                                                                <div class="col-lg-2">
                                                                    <p>Total Price: </p>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <p>Rp {{ $transaction->total_paid }}</p>
                                                                </div>
                                                            </div>
                                                            @if($transaction->beacukai_pabean)
                                                            <div class="form-group mb-3 row">
                                                                <div class="col-lg-2">
                                                                    <p>Tax: </p>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <p>Rp {{ $transaction->beacukai_pabean }}</p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>

                                                        <div class="items table-responsive">
                                                            <table class="table table-borderless">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Status</th>
                                                                        <th scope="col">Item Name</th>
                                                                        <th scope="col">Amounts</th>
                                                                        <th scope="col">Price</th>
                                                                        <th scope="col">Cancellation Description</th>
                                                                        <th scope="col">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($transaction_detail_item[$transaction->id] as $detail_item)
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-flex">
                                                                                @if($detail_item->item_status == "bought")
                                                                                <button type="submit" disabled class="btn btn-success px-2">
                                                                                    <i class="fa fa-check"></i>
                                                                                </button>
                                                                                @endif
                                                                                @if($detail_item->item_status == "cancelled")
                                                                                <button type="submit" disabled class="btn btn-danger px-2">
                                                                                    <i class="fa fa-times"></i>
                                                                                </button>
                                                                                @endif
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <label class="form-check-label" for="">
                                                                                {{ $detail_item->item_name }}
                                                                            </label>
                                                                        </td>
                                                                        <td>{{ $detail_item->quantity }}</td>
                                                                        <td>Rp {{ $detail_item->item_display_price }}</td>

                                                                        <td>
                                                                            @if($detail_item->item_status == 'cancelled')
                                                                            {{ $detail_item->cancel_reason }}@endif
                                                                        </td>
                                                                        <td>Rp {{ $detail_item->total }}</td>
                                                                    </tr>
                                                                    @endforeach

                                                                    @foreach($transaction_detail_request[$transaction->id] as $detail_request)
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-flex">
                                                                                @if($detail_request->item_status == "bought")
                                                                                <button type="submit" disabled class="btn btn-success px-2">
                                                                                    <i class="fa fa-check"></i>
                                                                                </button>
                                                                                @endif
                                                                                @if($detail_request->item_status == "cancelled")
                                                                                <button type="submit" disabled class="btn btn-danger px-2">
                                                                                    <i class="fa fa-times"></i>
                                                                                </button>
                                                                                @endif
                                                                            </div>
                                                                        </td>
                                                                        <td> {{ $detail_request->request_name }}</td>
                                                                        <td>{{ $detail_request->quantity }}</td>
                                                                        <td>Rp {{ $detail_request->request_price }}</td>

                                                                        <td>
                                                                            @if($detail_request->item_status == 'cancelled')
                                                                            {{ $detail_request->cancel_reason }}@endif
                                                                        </td>
                                                                        <td>Rp {{ $detail_request->total }}</td>
                                                                    </tr>
                                                                    @endforeach

                                                                </tbody>
                                                                <tfoot style="border-top: 2px solid black; ">
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>Shipping Price: </td>
                                                                        <td>Rp {{ $transaction->shipping_price }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>Rp {{ $transaction->total_paid }}</td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row my-4">
                            <h3 class="fw-bold">Transaction Done</h3>
                            @foreach($finished_transaction_list as $finished)
                            <div class="card shadow my-3 p-3" style="background-color: #bebebe">
                                <div class="card-title d-flex justify-content-between">
                                    <h3 class="fw-bold mb-3">
                                        <a href="/trip-detail/{{ $finished->trip_id }}">{{ $finished->destination }} - {{ $finished->origin }}</a>
                                    </h3>
                                    <div class="d-flex gap-2">
                                        <p>Status:</p>
                                        <p class="text-success">Complete</p>
                                    </div>
                                </div>
                                <div class="button-review">
                                    @if(!$finished->rate_review_id)
                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modal-review">
                                        Submit Review
                                    </button>
                                    @endif
                                    <form action="/rate_review" method="POST">
                                        @csrf
                                        <div class="modal fade" id="modal-review" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Review</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mt-2">
                                                            <div class="form-group d-flex gap-3 align-items-center">
                                                                <label for="" class="form-label">Score</label>
                                                                <input type="number" name="rate" min="1" max="5" class="col-2">
                                                            </div>
                                                            <div class="form-group my-3">
                                                                <label for="" class="form-label">Note</label>
                                                                <textarea name="review" class="form-control" id="" cols="20" rows="10"></textarea>
                                                            </div>
                                                            <div class="text-center">
                                                                <input type="hidden" name="transaction_id" value="{{ $finished->id }}">
                                                                <input type="hidden" name="user_id" value="{{ $finished->user_id }}">
                                                                <button type="submit" class="btn btn-success">Submit Review</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="form-group mb-3 row">
                                        <div class="col-lg-2">
                                            <p>Address</p>
                                        </div>
                                        <div class="col-lg-10">
                                            <p>{{ $finished->address }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 row">
                                        <div class="col-lg-2">
                                            <p>Phone Number</p>
                                        </div>
                                        <div class="col-lg-10">
                                            <p>{{ $finished->phone_number }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 row">
                                        <div class="col-lg-2">
                                            <p>Shipping Type</p>
                                        </div>
                                        <div class="col-lg-10">
                                            <p>{{ $finished->shipping_name }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 row">
                                        <div class="col-lg-2">
                                            <p>Total Price</p>
                                        </div>
                                        <div class="col-lg-10">
                                            <p>{{ $finished->total_paid }}</p>
                                        </div>
                                    </div>
                                    @if($finished->beacukai_pabean)
                                    <div class="form-group mb-3 row">
                                        <div class="col-lg-2">
                                            <p>Tax</p>
                                        </div>
                                        <div class="col-lg-10">
                                            <p>Rp {{ $finished->beacukai_pabean }}</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    var random_code = Math.floor(Math.random() * 1000);

    $('#topup_amount').on('keyup', function() {
        var amount = parseInt($(this).val())
        if (amount) {

            amount = amount + random_code
            $('#unique_amount').text(random_code)
            $('#total_amount').text('Rp ' + amount)
            $('#unique_code').val(random_code)
            $('#total_topup').val(amount)
        }
    })
</script>
<script>
    function validateInput(input) {
        input.value = input.value.replace(/\D/g, '');
    }
</script>
@endsection