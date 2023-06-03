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
            <div class="col-lg-12">
                <div class="tab-content" id="nav-tabContent">

                    {{-- tab trip list --}}
                    <div class="tab-pane show active fade" id="nav-trip" role="tabpanel" aria-labelledby="nav-trip-tab">
                        @if ($errors->any())
                        <div class="alert alert-dark" role="alert" style="outline: none">
                            <i class="text-danger mt-1">{{$errors->first()}}</i>
                        </div>
                        @endif
                        <div class="card shadow p-3">
                            <div class="draft-trip">
                                <div class="row">
                                    <h3 class="fw-bold mb-3">Draft Trip</h3>
                                    <div class="dashboard-btn">
                                        <a href="/dashboard" class="btn btn-warning p-1 float-end">
                                            <h6 class="mt-2"><i class="fa fa-arrow-left me-2"></i>
                                                Back to Dashboard
                                            </h6>
                                        </a>
                                    </div>
                                </div>

                                <form action="/trip-draft" method="POST">
                                    @csrf
                                    <div class="card border-dark border-2 mb-3 p-3 shadow-sm mt-2">
                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <div class="col-lg-5 d-flex flex-column">
                                                    <label for="destination" class="form-label">Destination</label>
                                                    <div class="dropdown-datalist">
                                                        <input list="destinations" id="exampleDataList" name="destination" class="form-control" value="{{ $edit_trip->destination }}" placeholder="Destination" aria-label="destination">
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
                                                    <div class="bg-dark mt-4" style="height: 5px;"></div>
                                                </div>
                                                <div class="col-lg-5 d-flex flex-column">
                                                    <label for="origin" class="form-label">Origin</label>
                                                    <input type="text" disabled class="form-control" id="" value="{{ auth()->user()->city }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <div class="col-lg-5">
                                                    <label for="start_date" class="form-label">Start Date</label>
                                                    <input id="start_date" name="start_date" class="form-control" type="date" value="{{ $edit_trip->start_date }}" />
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
                                                    <input id="arrival_date" name="arrival_date" class="form-control" type="date" value="{{ $edit_trip->arrival_date }}" />
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
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3 d-flex flex-column">
                                            <label for="" class="form-label">Luggage Size</label>
                                            <div class="col-5">
                                                <input type="number" name="luggage" required min="1" max="" value="{{ $edit_trip->luggage }}"> kg
                                                @error('luggage_size')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
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
                                    <form action="/addItem" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add a item</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="add-item">
                                                        <div class="form-group mb-3 ">
                                                            <label for="Item" class="form-label">Item Name</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" name="item_name" required class="form-control" id="item-name" required>
                                                                @error('item_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="category" class="form-label">Category</label>
                                                            <div class="col-sm-5">
                                                                <select class="form-select" name="item_category" aria-label="Default select example">
                                                                    <option value="Food & Beverage" selected>Food & Beverage</option>
                                                                    <option value="Fashion">Fashion</option>
                                                                    <option value="Electronic">Electronic Gadget</option>
                                                                    <option value="Accessories">Accessories</option>
                                                                    <option value="Other">Other</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="image" class="col-form-label">Select Image</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="item_image" class="form-control" id="image">
                                                                @error('item_image')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <div class="col-lg-6">
                                                                <label for="item_weight" class="form-label">Item weight</label>
                                                                <input type="number" style="width: 50px" min="1" name="item_weight" id="item_weight"> Kg
                                                                @error('item_weight')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label for="item_stock" class="form-label">Item Stock</label>
                                                                <input type="number" style="width: 50px" min="1" name="item_stock" id="item_stock"> Pc/s
                                                                @error('item_stock')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 form-group ">
                                                            <label for="Price" class="form-label">Item Price</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" id="price" oninput="validateInput(this)" name="item_price" required class="form-control" id="price" placeholder="Rp">
                                                                @error('item_price')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 form-group ">
                                                            <label for="Price" class="form-label">Item Display Price</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" name="item_display_price" oninput="validateInput(this)" required class="form-control" id="price" placeholder="Rp">
                                                                @error('item_display_price')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="description" class="form-label">Add Description</label>
                                                            <textarea name="item_description" class="form-control" id="description" cols="30" rows="2"></textarea>
                                                            @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="hidden" name="trip_id" value="{{ $edit_trip -> id }}">
                                                    <button type="submit" class="btn btn-primary">Add Item</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="luggage-limit my-2 d-flex gap-3">
                                <h5 class="fw-bold">Luggage Limit :</h5>
                                <div class="luggage-size">
                                    <p class="d-inline-block">{{ $edit_trip->weight }}</p>
                                    <p class="d-inline-block">/ {{ $edit_trip->luggage }} kg</p>
                                </div>
                            </div>

                            {{-- item --}}
                            <div class="item-trip">
                                @foreach ($added_item as $item)
                                <div class="card p-3 border-2 border-dark shadow">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <img src="{{ asset('/storage/' .$item->item_image) }}" style="width: 200px" alt="" srcset="">
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="item-desc mb-3">
                                                <label for="" class="form-label text-primary fw-bold">Item Name</label>
                                                <h5>{{ $item->item_name }}</h5>
                                            </div>
                                            <div class="item-desc mb-3">
                                                <label for="" class="form-label text-primary fw-bold">Item Category</label>
                                                <h5>{{ $item->item_category }}</h5>
                                            </div>
                                            <div class="item-desc">
                                                <label for="" class="form-label text-primary fw-bold">Item Price</label>
                                                <p id="price">Rp {{ $item->item_price }}</p>
                                            </div>
                                            <div class="item-desc mb-3">
                                                <label for="description" class="form-label text-primary fw-bold">Item Description</label>
                                                <textarea name="description" class="form-control" id="description" cols="30" rows="2">{{ $item->item_description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="item-desc">
                                                <label for="" class="form-label text-primary fw-bold">Item Weight</label>
                                                <p>{{ $item->item_weight }} Kg</p>
                                            </div>
                                            <div class="item-desc mb-3">
                                                <label for="" class="form-label text-primary fw-bold">Item Stock</label>
                                                <p>{{ $item ->item_stock }} Pc/s</p>
                                            </div>
                                            <div class="item-desc">
                                                <label for="" class="form-label text-primary fw-bold">Item Display Price</label>
                                                <p>Rp {{ $item->item_display_price }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 d-flex align-items-center">
                                            <form action="/removeItem" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <form action="/publishTrip" method="POST">
                                @csrf
                                <input type="hidden" name="trip_id" value="{{ $edit_trip->id }}">
                                <div class="publish-button mt-3 text-center">
                                    <button type="submit" @if($added_item->isEmpty() || $edit_trip->weight > $edit_trip->luggage) disabled @endif class="btn btn-success"> Publish Trip</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    function validateInput(input) {
        input.value = input.value.replace(/\D/g, '');
    }
</script>
@endsection