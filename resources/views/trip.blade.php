@extends('layout')

@section('mainSection')
<section class="py-5">

    <div class="hero-header py-5" style="height: 80vh;">
        <div class="container mt-4">
            <div class="row col-lg-10 mx-auto">
                <div class="search-title my-3 text-center">
                    <h1 class="fw-bold text-white">Search your Trip</h1>
                </div>
                <form action="/search_trip" method="POST">
                    @csrf
                    <div class="form-group mx-auto col-lg-8 p-3 rounded shadow-lg border border-light" style="background-color:rgba(255,255,255,0.7);">
                        <div class="row pt-2 align-items-center gap-lg-0 gap-2 justify-content-center">
                            <div class="col-lg-5">
                                <input type="text" name="destination" class="form-control" placeholder="Destination" value="{{ $destination }}" aria-label="First name">
                            </div>
                            <div class="col-lg-1 d-lg-block d-none">
                                <div class="bg-white" style="height: 5px;"></div>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" name="origin" class="form-control" placeholder="Origin" value="{{ $origin }}" aria-label="Last name">
                            </div>
                        </div>
                        <div class="row my-4 justify-content-center">
                            <div class="calendar-form col-lg-6 ">
                                <label for="" class="form-label text-center"> Choose date</label>
                                <input type="date" name="datenya" value="{{ $datenya }}" class="form-control rounded-1 form-input">
                            </div>
                        </div>
                        {{-- category --}}
                        <div class="category-list col-lg-6 mx-auto my-3">
                            <div class="category-title">
                                <label for="" class="form-label">Category</label>
                            </div>
                            <form action="/filter_category" method="POST">
                                @csrf
                                <div class="select my-2">
                                    <select class="form-select" name="category" aria-label="Default select example">
                                        <option @if($selected_category == 'Food & Beverage') selected @endif value="Food & Beverage">Food & Beverage</option>
                                        <option @if($selected_category == 'Electronic') selected @endif value="Electronic">Electronic</option>
                                        <option @if($selected_category == 'Fashion') selected @endif value="Fashion">Fashion</option>
                                        <option @if($selected_category == 'Accessories') selected @endif value="Accessories">Accessories</option>
                                        <option @if($selected_category == 'Other') selected @endif value="Other">Other</option>
                                      </select>
                                </div>
                            </form>
        
                        </div>

                        <div class="search-button d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-warning text-center mx-auto">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="line p-2"></div>

    <div class="container-fluid py-3 mx-1 mt-5">
        <h2 class="text-center fw-bold mb-5 ms-lg-3" id="slebew">Ongoing Trip</h2>
        <div class="row m-0">
            {{-- <div class="col-lg-3 mb-lg-0 mb-2">
                <aside class="left-sidebar rounded-3 p-3 shadow">
                    <div class="sidebar-title">
                        <h5 class="fw-bold">Category</h5>
                    </div>
                    <div class="category-list mt-3">
                        <input type="checkbox" id="food" name="category" value="food" class="category_check_box">
                        <label for="food"> Food & Beverages</label><br></li>
                        <input type="checkbox" id="fashion" name="category" value="fashion" class="category_check_box">
                        <label for="fashion"> Fashion</label><br></li>
                        <input type="checkbox" id="electronic" name="category" value="electronic" class="category_check_box">
                        <label for="electronic"> Electronic Gadget</label><br></li>
                        <input type="checkbox" id="accessories" name="category" value="accessories" class="category_check_box">
                        <label for="accessories"> Accessories</label><br></li>
                    </div> 

                    <form action="/filter_category" method="POST">
                        @csrf
                        <div class="select my-2">
                            <select class="form-select" name="category" aria-label="Default select example">
                                <option @if($selected_category == 'Food & Beverage') selected @endif value="Food & Beverage">Food & Beverage</option>
                                <option @if($selected_category == 'Electronic') selected @endif value="Electronic">Electronic</option>
                                <option @if($selected_category == 'Fashion') selected @endif value="Fashion">Fashion</option>
                                <option @if($selected_category == 'Accessories') selected @endif value="Accessories">Accessories</option>
                                <option @if($selected_category == 'Other') selected @endif value="Other">Other</option>
                              </select>
                        </div>
                        <div class="button mt-2">
                            <button type="submit" class="btn btn-primary">
                                filter
                                <i class="fa fa-filter">
                                </i>
                            </button>
                        </div>
                    </form>

                </aside>
            </div> --}}

            <div class="col-lg-10 mx-auto">
                <div id="price">50000</div>
                <div id="adjusted_price"></div>
                <input type="hidden" id="adjusted_price_field" name="adjusted_price" value="">
                <div id="cart_box">
                    
                </div>
                @foreach ($trip_list as $trip)
                        <div class="trip-list mb-3">
                            <div class="card rounded-4  shadow-sm">
                                <div class="card-body">
                                    <div class="row gap-lg-0 gap-3">
                                        <div class="col-lg-3 text-center">
                                            <img src="{{ asset('/storage/' .$trip->avatar) }}" class="img-fluid" style="width: 200px" alt="">
                                            <h5 class="text-center mt-3">{{ $trip->fullname }}</h5>
                                            <a href="/traveler" class="btn btn-success mt-3"> See Profile</a>
                                        </div>
                                        <div class="col-lg-9 my-lg-0 my-2">
                                            <h3 class="text-primary text-center text-lg-start fw-bold">{{ $trip->destination }} - {{ $trip->origin }}</h3>
                                            <p class="text-center text-lg-start">{{ $trip->description }}</p>
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
                                            <a href="/trip-detail/{{ $trip->id }}" class="btn btn-outline-primary float-end"> See Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>        
                        @endforeach
            </div>

</section>
@endsection