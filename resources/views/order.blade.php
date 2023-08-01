@extends('layout')

@section('mainSection')
<section>
    <div class="hero-header py-5" style="height: 45vh">
        <div class="container mt-4">
            <div class="row col-lg-10 mx-auto">
                <div class="search-title my-3 text-center">
                    <h1 class="fw-bold text-white">Your Order</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="line p-2"></div>

    <div class="container my-5">

        <div class="title">
            <h1 class="fw-bold">Request List</h1>
        </div>

        @foreach ($request_list as $request)
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Time limit to approve: {{ $request->limit }}</p>
                <div class="row">
                    <div class="col-lg-2">
                        <img src="{{ asset('/storage/' .$request->request_image) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-9">
                        <h1 class="mb-2">From: {{ $request->fullname }}</h1>
                        <p>Item Name: {{ $request->request_name }}</p>
                        <p>Quantity: {{ $request->request_quantity }}</p>
                        <p>Price: {{ $request->request_price }}</p>
                        <p>Weight: {{ $request->request_weight }} Kg</p>

                        @if(!$request->approvable)

                        <form action="/deleteRequestCart" method="POST">
                            @csrf
                            <div class="float-end d-flex">
                                <input type="hidden" name="request_id" value="{{ $request->id }}">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </form>

                        @else

                        <div class="float-end d-flex gap-2">
                            <form action="/acceptRequest" method="POST">
                                @csrf
                                <input type="hidden" name="request_id" value="{{ $request->id }}">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                </button>
                            </form>
                            <form action="/rejectRequest" method="POST">
                                @csrf
                                <input type="hidden" name="request_id" value="{{ $request->id }}">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="title">
                <h1 class="fw-bold">Order List</h1>
            </div>

            @if ($errors->any())
            <div class="alert alert-dark" role="alert" style="outline: none">
                <i class="text-danger mt-1">{{$errors->first()}}</i>
            </div>
            @endif

            @foreach($order_list_header as $order_header)
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="card p-3 mb-3 shadow">
                        <div class="form-group mb-3 row">
                            <div class="col-lg-2">
                                <p>From</p>
                            </div>
                            <div class="col-lg-10">
                                <p>{{ $order_header->fullname }}</p>
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-lg-2">
                                <p>Address</p>
                            </div>
                            <div class="col-lg-10">
                                <p>{{ $order_header->address }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-lg-10">
                                <input type="text" readonly class="form-control-plaintext " id="" value="{{ $order_header->phone_number }}">
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-lg-2">
                                <p>Shipping Type</p>
                            </div>
                            <div class="col-lg-10">
                                <p>{{ $order_header->shipping_name }}</p>
                            </div>
                        </div>

                        @if($order_header->beacukai_pabean)
                        <div class="form-group mb-3 row">
                            <div class="col-lg-2">
                                <p>Tax</p>
                            </div>
                            <div class="col-lg-10">
                                <p class="price-format">{{ $order_header->beacukai_pabean }}</p>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="items table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10px"></th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Profit</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $sum_profit= 0;
                                @endphp
                                @foreach($order_detail_item[$order_header->id] as $order_item)

                                @php
                                $sum_profit = $sum_profit + $order_item->profit;
                                @endphp
                                <tr>
                                    <td style="width: 20px;" class="me-2 pe-2">
                                        <div class="button">
                                            @if($order_item->item_status != 'bought')
                                            <button type="button" @if ($order_item->item_status == 'cancelled') disabled @endif class="btn btn-danger py-0 px-2" data-bs-toggle="modal" data-bs-target="#item{{ $order_item->item_id }}">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            @endif
                                            <div class="modal fade" id="item{{ $order_item->item_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-none">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="/cancelBuyItem" method="POST">
                                                            <div class="modal-body">
                                                                <h3 class="fw-bold mb-3">Cancel Reason</h3>
                                                                <div class="form-group">
                                                                    <label for="" class="form-label">Select reason</label>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="reason" id="itemNotAvailable" value="Item Not Available">
                                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                                            Item Not Available
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check">

                                                                        <input class="form-check-input" type="radio" name="reason" id="itemOutOfStock" value="Item Out of Stock">
                                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                                            Item Out of Stock
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check">

                                                                        <input class="form-check-input" type="radio" name="reason" id="destinationChange" value="Destination Plan Changed">
                                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                                            Destination Plan Changed
                                                                        </label>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @csrf
                                                            <input type="hidden" name="transaction_detail_id" value="{{ $order_item->id }}">
                                                            <input type="hidden" name="item_name" value="{{ $order_item->item_name }}">
                                                            <input type="hidden" name="total" value="{{ $order_item->total }}">
                                                            <input type="hidden" name="transaction_id" value="{{ $order_header->id }}">
                                                            <input type="hidden" name="total_paid" value="{{ $order_header->total_paid }}">
                                                            <input type="hidden" name="tax" value="{{ $order_header->beacukai_pabean }}">
                                                            <input type="hidden" name="shipping_price" value="{{ $order_header->shipping_trip_price }}">
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td scope="row" class="d-flex">
                                        @if($order_item->item_status != 'cancelled')
                                        <form action="/itemBought" method="POST">
                                            @csrf
                                            <input type="hidden" name="transaction_detail_id" value="{{ $order_item->id }}">
                                            <button type="submit" @if($order_item->item_status == 'bought') disabled @endif class="btn btn-success">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </form>
                                        @endif
                                        <div class="form-check">
                                            <label class="form-check-label" for="">
                                                {{ $order_item->item_name }}
                                            </label>
                                        </div>
                                    </td>
                                    <td>{{ $order_item->quantity }}</td>
                                    <td>Rp {{ $order_item->item_display_price }}</td>
                                    <td>Rp {{ $order_item->profit }}</td>
                                    <td>Rp {{ $order_item->total }}</td>
                                </tr>
                                @endforeach

                                @foreach($order_detail_request[$order_header->id] as $order_request)
                                <tr>
                                    <td style="width: 10px;">
                                        <div class="button">
                                            @if($order_request->item_status != 'bought')
                                            <button type="button" class="btn btn-danger py-0 px-2" @if ($order_request->item_status == 'cancelled') disabled @endif data-bs-toggle="modal" data-bs-target="#request{{ $order_request->request_id }}">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            @endif
                                            <div class="modal fade" id="request{{ $order_request->request_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-none">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="/cancelBuyRequest" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <h3 class="fw-bold mb-3">Why Cancel?</h3>
                                                                <div class="form-group">
                                                                    <label for="" class="form-label">Select reason</label>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="reason" id="itemNotAvailable" value="Item Not Available">
                                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                                            Item Not Available
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check">

                                                                        <input class="form-check-input" type="radio" name="reason" id="itemOutOfStock" value="Item Out of Stock">
                                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                                            Item Out of Stock
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check">

                                                                        <input class="form-check-input" type="radio" name="reason" id="destinationChange" value="Destination Plan Changed">
                                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                                            Destination Plan Changed
                                                                        </label>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="transaction_detail_id" value="{{ $order_request->id }}">
                                                                <input type="hidden" name="request_name" value="{{ $order_request->request_name }}">
                                                                <input type="hidden" name="total" value="{{ $order_request->total }}">
                                                                <input type="hidden" name="transaction_id" value="{{ $order_header->id }}">
                                                                <input type="hidden" name="total_paid" value="{{ $order_header->total_paid }}">
                                                                <input type="hidden" name="tax" value="{{ $order_header->beacukai_pabean }}">
                                                                <input type="hidden" name="shipping_price" value="{{ $order_header->shipping_trip_price }}">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td scope="row" class="d-flex">
                                        @if($order_request->item_status != 'cancelled')
                                        <form action="/requestBought" method="POST">
                                            @csrf
                                            <input type="hidden" name="transaction_detail_id" value="{{ $order_request->id }}">
                                            <button type="submit" @if($order_request->item_status == 'bought') disabled @endif class="btn btn-success">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </form>
                                        @endif
                                        <div class="form-check">
                                            <label class="form-check-label" for="">
                                                {{ $order_request->request_name }}
                                            </label>
                                        </div>
                                    </td>
                                    <td>{{ $order_request->quantity }}</td>
                                    <td>Rp {{ $order_request->request_price }}</td>
                                    <td></td>
                                    <td>Rp {{ $order_request->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot style="border-top: 2px solid black; ">
                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Rp {{ $sum_profit }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#order">
                            Launch demo modal
                        </button>
                            <div class="modal fade" id="order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Order</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure to order this</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-success">Confirm</button>
                                    </div>
                                </div>
                                </div>
                            </div> --}}
                        <form action="/shipping" method="POST">
                            @csrf
                            <input type="hidden" name="transaction_id" value="{{ $order_header->id }}">
                            <button class="btn btn-success px-3" @if(!$order_header->shippable) disabled @endif>Shipment</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row mt-5">
            <div class="title">
                <h1 class="fw-bold">Shipment List</h1>
            </div>

            @foreach($shipping_list as $shipping)
            <div class="col-lg-12">
                <p>You need to ship the items before {{ $shipping->ship_time_limit }}</p>
                <div class="card p-3">
                    <div class="form-group mb-3 row">
                        <label for="" class="col-sm-2 col-form-label">To</label>
                        <div class="col-lg-10">
                            <input type="text" readonly class="form-control-plaintext " id="" value="{{ $shipping->fullname }}">
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <label for="" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-lg-10">
                            <input type="text" readonly class="form-control-plaintext " id="" value="{{ $shipping->address }}">
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <label for="" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-lg-10">
                            <input type="text" readonly class="form-control-plaintext " id="" value="{{ $shipping->phone_number }}">
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <label for="" class="col-sm-2 col-form-label">Shipping Type</label>
                        <div class="col-lg-10">
                            <input type="text" readonly class="form-control-plaintext " id="" value="{{ $shipping->shipping_name }}">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="" class="col-sm-2 col-form-label">Shipping Price</label>
                        <div class="col-lg-10">
                            <input type="text" readonly class="form-control-plaintext " id="" value="Rp {{ $shipping->shipping_trip_price }}">
                        </div>
                    </div>

                    <div class="card p-3 mb-3">
                        @foreach($shipping_detail_item[$shipping->transaction_id] as $item)
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
                                    <label for="" class="form-label text-primary fw-bold">Item Quantity</label>
                                    <h5>{{ $item->quantity }}</h5>
                                </div>
                            </div>

                        </div>
                        @endforeach

                        @foreach($shipping_detail_request[$shipping->transaction_id] as $request)
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <img src="{{ asset('/storage/' .$request->request_image) }}" style="width: 200px" alt="" srcset="">
                            </div>
                            <div class="col-lg-3">
                                <div class="item-desc mb-3">
                                    <label for="" class="form-label text-primary fw-bold">request Name</label>
                                    <h5>{{ $request->request_name }}</h5>
                                </div>
                                <div class="item-desc mb-3">
                                    <label for="" class="form-label text-primary fw-bold">request Quantity</label>
                                    <h5>{{ $request->quantity }}</h5>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                    <form action="/send" method="POST">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Shipping Receipt</label>
                            <div class="col-lg-3">
                                <input type="text" name="shipping_receipt" class="form-control">
                            </div>
                        </div>
                        @csrf
                        <input type="hidden" name="shipping_id" value="{{ $shipping->id }}">
                        <input type="hidden" name="transaction_id" value="{{ $shipping->transaction_id }}">
                        <button class="btn btn-success px-3">Send</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>

</section>
@endsection
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    function clicked(radio) {
        if (radio.value == 'other') {
            document.getElementById('reason_text').disabled = false
        } else {
            document.getElementById('reason_text').disabled = true
        }
    }
    console.log($("input[type='radio'][name='reason']:checked").val());
</script>