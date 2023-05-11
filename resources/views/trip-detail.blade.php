@extends('layout')

@section('mainSection')
<section>
    <div class="checkout-container mx-auto py-5" style="max-width: 1180px">
        <div class="title my-5">
            <h1 class="fw-bold">Trip Details</h1>
        </div>
        <div class="card p-3">
            <div class="row">
                <div class="col-lg-8">
                        <div class="d-flex align-items-center gap-3 my-3">
                                <img src="img/laptop.jpg" class="checkout-image" alt="" srcset="">
                                <div class="item-details">
                                    <h3>tes</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet sed laboriosam mollitia tenetur enim. Voluptate, placeat sint error fugit voluptatum veritatis ratione et enim dicta hic rem ex numquam tempora.</p>
                                </div>
                        </div>
                       
                        <div class="trip-item my-3">
                            <h3 class="fw-bold">Item</h3>
                            <div class="card my-3 p-3">
                                <div class="row gap-3 p-1 align-items-center ">
                                    <div class="col-lg-2">
                                        <img src="img/laptop.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-7">
                                        <h3 class="mb-2">Lorem</h3>
                                        <p>Lorem ipsum, .</p>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="">
                                        <i class="fa fa-shopping-cart fa-2x"></i>
                                    </a>
                                </div>
                                </div>            
                            </div>

                            <div class="card my-3 p-3">
                                <div class="row gap-3 p-1 align-items-center ">
                                    <div class="col-lg-2">
                                        <img src="img/laptop.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-7">
                                        <h3 class="mb-2">Lorem</h3>
                                        <p>Lorem ipsum, .</p>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="">
                                        <i class="fa fa-shopping-cart fa-2x"></i>
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>
                 

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
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="form-category">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <select class="form-select">
                                                            <option selected>Category</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-select">
                                                            <option selected>Brand</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form">
                                                    <div class="form-check mt-3">
                                                        <input class="form-check-input" type="radio" name="" id="">
                                                        <label class="form-check-label" for="">
                                                        Food
                                                        </label>
                                                    </div>
                    
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="radio" name="" id="" checked>
                                                        <label class="form-check-label" for="">
                                                        Electronic
                                                        </label>
                                                    </div>
                    
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name=" id="" checked>
                                                        <label class="form-check-label" for="">
                                                        Other
                                                        </label>
                                                        <input type="text" class="form-control" style="width: 50%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-request my-3">
                                                <label for="" class="form-label">Request</label>
                                                <textarea name="" class="form-control" id="" cols="20" rows="5"></textarea>
                                            </div>
                                            <div class="form-price my-3">
                                                <label for="" class="form-label">Input your Desired Price</label>
                                                <input type="text" class="form-control " style="width: 50%">
                                            </div>
                                            <div class="quantity d-flex flex-column">
                                                <label for="" class="form-label">Quantity</label>
                                                <input type="number" style="width: 50px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="order-btn">
                            <a href="" class="btn btn-primary mt-3 px-5">Order</a>
                        </div>
                </div>

                
                <div class="col-lg-4">
                        <div class="card gap-3 shadow mt-5 p-3">
                            <div class="card d-block shadow p-3">
                                <div class="row gap-3">
                                    <div class="col-lg-3">
                                        <img src="img/laptop.jpg" class="img-fluid" alt="">
                                    </div>
                                     <div class="col-lg-8">
                                        <h5 class="mb-2">Lorem</h5>
                                        <p>Lorem ipsum, </p>
                                   </div>
                                </div>
                                
                                <div class="float-end">
                                    <input type="number" style="width: 50px">
                                      <a href="" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                      </a>
                                </div>

                            </div>
                            
                            <div class="card d-block shadow p-3">
                                <div class="row gap-3">
                                    <div class="col-lg-3">
                                        <img src="img/laptop.jpg" class="img-fluid" alt="">
                                    </div>
                                     <div class="col-lg-8">
                                        <h5 class="mb-2">Lorem</h5>
                                        <p>Lorem ipsum, </p>
                                   </div>
                                </div>
                                
                                <div class="float-end">
                                    <input type="number" style="width: 50px">
                                      <a href="" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                      </a>
                                </div>

                            </div>
                            <a href="" class="btn btn-success">add to cart</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection