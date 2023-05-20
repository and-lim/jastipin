@extends('layout')

@section('mainSection')

<section>
    <div class="container mt-3 py-5">
        <h1 class="title mt-3 pb-5">Cart</h1>

        <div class="card shadow-sm p-3">

            @php

            $sumItemPrice = 0;
            $sumItemQuantity = 0;
            $sumItemWeight = 0;

            
            @endphp
            @if ($cart_item != null)
            @foreach($cart_item as $item)

            
            @php
            $sumItemPrice = $sumItemPrice + ($item->item_display_price * $item->cart_item_quantity);
            $sumItemQuantity = $sumItemQuantity + $item->cart_item_quantity;
            $sumItemWeight = $sumItemWeight + $item->item_weight;

            @endphp
            

            <div class="item-cart border-bottom border-2 border-dark my-1">
                <div class="row gap-3">
                    <div class="col-lg-2">
                        <img src="{{ asset('/storage/' .$item->item_image) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8">
                        <a href="/trip-detail/{{ $item->trip_id }}">
                            <h1 class="mb-2">{{ $item->item_name }}</h1>
                        </a>
                        <p>Rp {{ $item->item_display_price }}</p>
                        <p>{{ $item->item_weight }} Kg</p>
                        <p>{{ $item->item_description }}</p>
                    </div>
                </div>

                <div class="float-end d-flex gap-2 mb-3">
                    <input type="number" value="{{ $item->cart_item_quantity }}" min="1" max="{{ $item->item_stock }}" style="width: 50px">
                    <form action="/deleteItemCart" method="POST">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->item_id }}">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </div>

            </div>
            @endforeach
            @endif

            @php

            $sumRequestPrice = 0;
            $sumRequestQuantity = 0;
            $sumRequestWeight = 0;

            @endphp

            @if ($cart_request != null)
            @foreach($cart_request as $request)

            @php
            $sumRequestPrice = $sumRequestPrice +  ($request->request_price * $request->request_quantity);
            $sumRequestQuantity = $sumRequestQuantity + $request->request_quantity;
            $sumRequestWeight = $sumRequestWeight + $request->request_weight;
            @endphp

            <div class="item-cart border-bottom border-2 border-dark my-1">
                <div class="row gap-3">
                    <div class="col-lg-2">
                        <img src="{{ asset('/storage/' .$request->request_image) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8">
                        <a href="/trip-detail/{{ $request->trip_id }}">
                            <h1 class="mb-2">{{ $request->request_name }}</h1>
                        </a>
                        <p>Rp {{ $request->request_price }}</p>
                        <p>{{ $request->request_quantity }} PC/s</p>
                        <p>{{ $request->request_weight }} Kg</p>
                        <p>{{ $request->request_description }}</p>
                        <p>{{ $request->request_status }}</p>
                    </div>
                </div>

                <div class="float-end d-flex gap-2 mb-3">
                    <form action="/deleteRequestCart" method="POST">
                        @csrf
                        <input type="number" value="{{ $request->request_quantity }}" style="width: 50px">
                        <input type="hidden" name="request_id" value="{{ $request->request_id }}">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </div>

            </div>
            @endforeach
            @endif

            {{-- details --}}
            <div class="cart-details 1 mt-2 py-5">
                <h3 class="mb-3">Details</h3>
                <div class="d-flex justify-content-between">
                    <p>total pesanan:</p>
                    <p>{{ $sumItemQuantity + $sumRequestQuantity }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>total price:</p>
                    <p>{{ $sumItemPrice + $sumRequestPrice }}</p>
                </div>
            </div>
            
                <div class="d-flex justify-content-center">
                    <input type="hidden" name="$sumItemQuantity" value="{{ $sumItemQuantity }}">
                    <input type="hidden" name="$sumRequestQuantity" value="{{ $sumRequestQuantity }}">
                    <input type="hidden" name="$sumItemPrice" value="{{ $sumItemPrice }}">
                    <input type="hidden" name="$sumRequestPrice" value="{{ $sumRequestPrice }}">
                    <input type="hidden" name="$sumItemWeight" value="{{ $sumItemWeight }}">
                    <input type="hidden" name="$sumRequestWeight" value="{{ $sumRequestWeight }}">
                    <button type="submit" @if ($check_status) disabled @endif class="btn btn-success px-3 fw-bold">Checkout</button>
                </div>
        </div>
    </div>
</section>

@endsection