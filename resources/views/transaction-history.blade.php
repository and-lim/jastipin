@extends('layout')
@section('mainSection')

<section class="py-5">
    <div class="container py-5">
        <div class="row pb-3">
            <div class="text-start mb-3">
                <h3 class="fw-bold">Your Transaction History</h3>
            </div>
            <div class="col-lg-10 pb-5 mx-auto my-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row gap-3 p-0">
                            <div class="col-lg-3">
                                <img src="img/laptop.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-8">
                                <div class="shipping-status float-end d-flex gap-5 mb-3">
                                    <p class="text-primary fw-bold">Shipping Status:</p>
                                    <p>Shipping</p>
                                </div>
                                <h3 class="my-3">Item Name</h3>
                                <p class="mb-2">location</p>
                                <div class="address my-3">
                                    <label for="" class="form-label">Adress</label>
                                    <p>address Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum doloremque aliquid mollitia quidem nihil deleniti suscipit voluptatum ut cumque aspernatur, vel neque fuga at ratione repudiandae facere autem laudantium magni.</p>
                                </div>
                                <div class="quantity">
                                    <p class="d-inline-block me-3">Quantity :</p>
                                    <p class="d-inline-block">3x</p>
                                </div>
                                <div class="mt-1 d-flex align-items-center gap-5">
                                    <p>Price: </p>
                                    <p>$123</p>
                                </div>
                                <div class="line mb-3"></div>
                                <div class="float-end mb-3 d-flex align-items-center gap-4">
                                    <p>Total Price: </p>
                                    <h3 class="fw-bold text-success">$123</h3>
                                </div>
                                <div class="button mt-5 d-flex gap-3">
                                    <button type="button" class="btn btn-outline-success">
                                        Item Accepted
                                   </button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Submit Review
                                   </button>
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                       <div class="modal-content">
                                         <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalLabel">Item Review</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                               <div class="row mt-2">
                                                    <div class="form-group d-flex gap-3 align-items-center">
                                                        <label for="" class="form-label">Score</label>
                                                        <input type="number" min="0" max="5" class="col-2">
                                                    </div>
                                                    <div class="form-group my-3">
                                                        <label for="" class="form-label">Note</label>
                                                        <textarea name="" class="form-control" id="" cols="20" rows="10"></textarea>
                                                    </div>
                                                    <div class="text-center">
                                                        <button class="btn btn-success">Submit Review</button>
                                                    </div>
                                              </div>
                                       </div>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
    
@endsection