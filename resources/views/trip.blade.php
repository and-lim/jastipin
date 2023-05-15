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
                        <label for="food"> Food & Beverages</label><br></li>
                        <input type="checkbox" id="food" name="food" value="food">
                        <label for="fashion"> Fashion</label><br></li>
                        <input type="checkbox" id="food" name="food" value="food">
                        <label for="gadget"> Electronic Gadget</label><br></li>
                        <input type="checkbox" id="food" name="food" value="food">
                        <label for="accessories"> Accessories</label><br></li>
                    </div>
                </aside>
            </div>

            @foreach ($trip_list as $trip)
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trip-list">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3 text-center">
                                            <img src="{{ asset('/storage/' .$trip->avatar) }}" class="img-fluid" style="width: 200px" alt="">
                                            <h5 class="text-center">{{ $trip->fullname }}</h5>
                                            <a href="/traveler" class="btn btn-success"> See Profile</a>
                                        </div>
                                        <div class="col-lg-9">
                                            <h3 class="text-primary fw-bold">{{ $trip->destination }} - {{ $trip->origin }}</h3>
                                            <p>{{ $trip->description }}</p>
                                            <div class="row gap-1">
                                                @foreach ($items as $item)

                                                @if ($item->trip_id == $trip->id)
                                                <div class="col-lg-2 trip-item">
                                                    <img src="{{ asset('/storage/' .$item->item_image) }}" style="width: 70px" class="img-fluid item-img" alt="">
                                                    <div class="img-detail d-flex flex-column mt-1">
                                                        <label for="" class="form-label mb-0">{{ $item->item_name }}</label>
                                                        <label for="" class="form-label mb-0">{{ $item->item_price }}</label>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                            <a href="/trip-detail/{{ $item->id }}" class="btn btn-outline-primary float-end"> See Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            @endforeach

</section>
@endsection