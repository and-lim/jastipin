@extends('layout')

@section('mainSection')
<section>
    <!-- @php
    $cart = array();

    @endphp -->
    <div class="container mx-auto py-5">
        <div class="row mb-3">
            <div class="title mt-5 mb-3">
                <h1 class="fw-bold">Trip Details</h1>
            </div>
            <div class="back-btn mb-3">
                <a href="/trip" class="btn btn-warning float-end py-0 px-3">
                    <h6 class="mt-2"><i class="fa fa-arrow-left me-2"></i>
                        Back
                    </h6>
                </a>
            </div>
            <div class="card p-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row align-items-center my-3">
                            <div class="col-lg-3">
                                <img src="{{ asset('/storage/' .$trips->avatar) }}" class="checkout-image" alt="" srcset="">
                            </div>
                            <div class="col-lg-9">
                                <h2 class="fw-bold">{{ $trips->fullname }}</h2>
                                <div class="destination mt-3">
                                    <h3>{{ $trips->destination }} - {{ $trips->origin }}</h3>
                                    <p>{{ $trips->description }}</p>
                                </div>
                            </div>

                        </div>

                        <div class="trip-item my-3">
                            <h3 class="fw-bold">Item</h3>
                            @foreach ($items as $item)
                            <div class="card my-3 p-3">
                                <div class="row p-1">
                                    <div class="col-lg-2">
                                        <img src="{{ asset('/storage/' .$item->item_image) }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-6 ms-lg-5">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="item-name mb-3">
                                                    <h4 class="mb-2 fw-bold text-primary">item name</h4>
                                                    <p class="">{{ $item->item_name }}</p>
                                                </div>
                                                <div class="item-stock mb-3">
                                                    <h4 class="mb-2 fw-bold text-primary">item stock</h4>
                                                    <p>{{ $item->item_stock }} PC/s</p>
                                                </div>
                                                <div class="item-weight mb-3">
                                                    <h4 class="mb-2 fw-bold text-primary">item weight</h4>
                                                    <p>{{ $item->item_weight }} Kg</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="item-price mb-3">
                                                    <h4 class="mb-2 fw-bold text-primary">item Price</h4>
                                                    <p>Rp {{ $item->item_display_price }}</p>
                                                </div>
                                                <div class="item-desc mb-3">
                                                    <h4 class="mb-2 fw-bold text-primary">item name</h4>
                                                    <p>{{ $item->item_description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if (Auth::user()->id != $trips->user_id && $trips->request)
                                    <div class="col-lg-2 position-absolute" style="top: 45%; right: 0;">
                                        <form action="/addToCart" method="POST">
                                            @csrf
                                            <div class="d-flex align-items-center gap-3">
                                                <input type="hidden" name="item_id" value="$item->id">
                                                <div class="input-number">
                                                    <input type="number" name="item_quantity" min="1" style="width: 50px">
                                                </div>
                                                <div class="button">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    @endif
                                    <!-- <div class="col-lg-2">
                                            <button onclick=" {{ array_push($cart, $item) }} " class="">
                                                <i class="fa fa-shopping-cart fa-2x"></i>
                                            </button>
                                    </div> -->
                                </div>
                            </div>
                            @endforeach
                        </div>


                        @if (Auth::user()->id != $trips->user_id && $trips->request)
                        <div class="request mt-3 p-3">
                            <h3 class="fw-bold">Request Item
                                <span class="text-primary" style="font-size: 15px"> &#91Optional&#93</span>
                            </h3>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Request
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title">Request</h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="/addRequestItem" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="form-category">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="brand" class="form-label">Item Name</label>
                                                                <input type="text" name="request_name" class="form-control " >
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label for="category" class="form-label">Category</label>
                                                                <div class="col-lg-6">
                                                                    <select class="form-select" name="request_category" aria-label="Default select example">
                                                                        <option value="food_beverage" selected>Food & Beverage</option>
                                                                        <option value="fashion">Fashion</option>
                                                                        <option value="electronic">Electronic Gadget</option>
                                                                        <option value="accessories">Accessories</option>
                                                                        <option value="other">Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label for="brand" class="form-label">Brand</label>
                                                                <input type="text" name="request_brand" class="form-control " >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                            <label for="image" class="col-form-label">Select Image</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="request_image" class="form-control" id="image">
                                                            </div>
                                                        </div>
                                                    <div class="form-request my-3">
                                                        <label for="description" class="form-label">Description</label>
                                                        <textarea name="request_description" class="form-control" id="" cols="20" rows="5"></textarea>
                                                    </div>
                                                    <div class="form-price my-3">
                                                        <label for="" class="form-label">Input your Desired Price</label>
                                                        <input type="text" name="request_price" class="form-control" style="width: 50%">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="quantity d-flex flex-column">
                                                                <label for="quantity" class="form-label">Quantity</label>
                                                                <input type="number" name="request_quantity" min="1" max="50" style="width: 50px">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="quantity d-flex flex-column">
                                                                <label for="weight" class="form-label">Weight</label>
                                                                <input type="number" name="request_weight" style="width: 50px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="trip_id" value="{{ $trips->id }}">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(Auth::user()->id != $trips->user_id)
                        <div class="order-btn">
                            <a href="" class="btn btn-primary mt-3 px-5">Order</a>
                        </div>
                        @endif

                    </div>

                    <!-- @if (count($cart)!=0)
                    <div class="col-lg-4">
                        <div class="card gap-3 shadow mt-5 p-3">
                            @php
                            $i=0;
                            @endphp
                            @foreach ($cart as $c)
                            <div class="card d-block shadow p-3">
                                <div class="row gap-3">
                                    <div class="col-lg-3">
                                        <img src="img/laptop.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-8">
                                        <h5 class="mb-2">{{ $c->item_name }}</h5>
                                        <p>{{ $c->item_display_price }} </p>
                                    </div>
                                </div>

                                <div class="float-end">
                                    <input type="number" name="quantity[$loop->iteration]" style="width: 50px">
                                    <a onclick="array_splice(  $cart , $i,1)" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>

                            </div>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                            <a href="" class="btn btn-success">add to cart</a>
                        </div>
                    </div>
                    @endif -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection