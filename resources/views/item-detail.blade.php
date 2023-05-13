@extends('layout')

@section('mainSection')
<section class="my-5 py-3">

    <div class="container py-5 my-5">
        <h1 class="mb-3">Details</h1>
        <div class="card shadow p-3">
            <div class="row gap-5 justify-content-center">
                <div class="col-lg-3 me-lg-3">
                    <img src="{{ asset('/storage/' .$wtb_detail->wtb_image) }}" style="width: 300px" alt="" srcset="">
                </div>
                <div class="col-lg-8">
                    <div class="row">
                         <div class="col-lg-6">
                              <div class="item-name">
                                   <h3 class="fw-bold text-primary">Item Name</h3>
                                   <h5 class="my-3">{{ $wtb_detail->wtb_name }}</h5>
                              </div>

                              <div class="item-desc">
                                   <h3 class="fw-bold text-primary ">Item Description :</h3>
                                   <p>{{ $wtb_detail->wtb_description }}</p>
                              </div>

                              <div class="item-weight">
                                   <h3 class="fw-bold text-primary">Weight</h3>
                                   <p>{{ $wtb_detail->wtb_weight }}</p>
                              </div>
                         </div>

                         <div class="col-lg-6">
                              <div class="item-price">
                                   <h3 class="fw-bold text-primary">Price</h3>
                                    <p>Rp {{ $wtb_detail->wtb_price }}</p>
                              </div>

                              <div class="item-quantity">
                                   <h3 class="fw-bold text-primary">Quantity</h3>
                                    <p>Rp {{ $wtb_detail->wtb_amount }}</p>
                              </div>

                              @php
                              $price = $wtb_detail->wtb_price;
                              $quantity = $wtb_detail->wtb_amount;
                               @endphp
                              <div class="item-total-price">
                                   <h3 class="fw-bold text-primary">Total Price</h3>
                                   <p>Rp {{ $price*$quantity }}</p>
                              </div>
                         </div>

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