@extends('layout')

@section('mainSection')
<section class="mt-5">

    <div class="container py-5 my-5">
        <h1 class="dashboard-title mb-3">Details</h1>
        <div class="card shadow p-3">
            <div class="row gap-5 justify-content-center">
                <div class="col-lg-3">
                    <img src="img/laptop.jpg" style="width: 300px" alt="" srcset="">
                </div>
                <div class="col-lg-8 d-flex flex-column gap-3">
                   <h1 class="my-3">Item Name</h1>
                   <div class="item-desc">
                        <h3 class="text-decoration-underline fw-bold">Item Description :</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem ducimus, reprehenderit assumenda soluta a sit mollitia eligendi dolor animi provident facere doloribus itaque similique libero ipsa qui omnis cupiditate praesentium.</p>
                   </div>

                   <div class="item-weight">
                        <h3 class="fw-bold text-decoration-underline">Weight</h3>
                        <p>5kg</p>
                   </div>

                   <div class="item-price">
                        <h3 class="fw-bold text-decoration-underline">Price</h3>
                         <p>$30</p>
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