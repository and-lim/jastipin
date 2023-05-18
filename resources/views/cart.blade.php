@extends('layout')

@section('mainSection')

<section>
    <div class="container mt-3 py-5">
        <h1 class="title mt-3 pb-5">Cart</h1>

        <div class="card shadow-sm p-3">

            @if ($cart_request != null)
            @foreach($cart_request as $request)

            <div class="item-cart border-bottom border-2 border-dark my-1">
                <div class="row gap-3">
                    <div class="col-lg-2">
                        <img src="{{ asset('/storage/' .$request->request_image) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8">
                        <h1 class="mb-2">{{ $request->request_name }}</h1>
                        <p>Rp {{ $request->request_price }}</p>
                        <p>{{ $request->request_quantity }} PC/s</p>
                        <p>{{ $request->request_weight }} Kg</p>
                        <p>{{ $request->request_description }}</p>
                    </div>
                </div>

                <div class="float-end d-flex gap-2 mb-3">
                    <input type="number" style="width: 50px">
                    <a href="" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>

            </div>
            @endforeach
            @endif

            <div class="item-cart border-bottom border-2 border-dark my-1">
                <div class="row gap-3">
                    <div class="col-lg-2">
                        <img src="img/laptop.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8">
                        <h1 class="mb-2">Lorem</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At debitis itaque blanditiis dicta porro quidem nihil magni molestiae nemo aspernatur. Et doloremque porro quaerat culpa officiis molestiae ducimus asperiores eligendi.</p>
                    </div>
                </div>

                <div class="float-end d-flex gap-2 mb-3">
                    <input type="number" min="1" max="100" style="width: 50px">
                    <a href="" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            </div>

            {{-- details --}}
            <div class="cart-details 1 mt-2 py-5">
                <h3 class="mb-3">Details</h3>
                <div class="d-flex justify-content-between">
                    <p>total pesanan:</p>
                    <p>50000</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>total pesanan:</p>
                    <p>50000</p>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <h3>Total</h3>
                    <p>50000</p>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="/trip" class="btn btn-warning px-3 fw-bold">Back to Trip</a>
                <a href="" class="btn btn-success px-3 fw-bold">Checkout</a>
            </div>
        </div>
    </div>
</section>

@endsection