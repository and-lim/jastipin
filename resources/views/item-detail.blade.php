@extends('layout')

@section('mainSection')
<section class="mt-5">

    <div class="container py-5 my-5">
        <h1 class="mb-3">Details</h1>
        <div class="card shadow p-3">
            <div class="row gap-5 justify-content-center">
                <div class="col-lg-3">
                    <img src="{{ asset('/storage/' .$wtb_detail->wtb_image) }}" style="width: 300px" alt="" srcset="">
                </div>
                <div class="col-lg-8 d-flex flex-column gap-3">
                   <h1 class="my-3">{{ $wtb_detail->wtb_name }}</h1>
                   <div class="item-desc">
                        <h3 class="text-decoration-underline fw-bold">Item Description :</h3>
                        <p>{{ $wtb_detail->wtb_description }}</p>
                   </div>

                   <div class="item-weight">
                        <h3 class="fw-bold text-decoration-underline">Weight</h3>
                        <p>{{ $wtb_detail->wtb_weight }}</p>
                   </div>

                   <div class="item-price">
                        <h3 class="fw-bold text-decoration-underline">Price</h3>
                         <p>Rp {{ $wtb_detail->wtb_price }}</p>
                   </div>
                   <div class="item-quantity">
                        <h3 class="fw-bold text-decoration-underline">Quantity</h3>
                         <p>Rp {{ $wtb_detail->wtb_amount }}</p>
                   </div>

                   @php
                        $price = $wtb_detail->wtb_price;
                        $quantity = $wtb_detail->wtb_amount;
                   @endphp
                   <div class="item-total-price">
                        <h3 class="fw-bold text-decoration-underline">Total Price</h3>
                         <p>Rp {{ $price*$quantity }}</p>
                   </div>

                   <div class="button d-flex gap-3">
                        <a href="/checkout" class="btn btn-primary">Checkout</a>
                        <a href="/item" class="btn btn-warning">Back</a>
                   </div>

                </div>
            </div>
        </div>
    </div>

</section>
@endsection