@extends('layout')

@section('mainSection')
<section>
    <div class="container mx-auto py-5">
        <div class="row mb-3">
            <div class="title mt-5 mb-3">
                <h1 class="fw-bold">Trip Details</h1>
            </div>
            <div class="back-btn">
                <a href="/trip" class="btn btn-warning float-end py-0 px-3">
                    <h6 class="mt-2"><i class="fa fa-arrow-left me-2"></i>  
                        Back
                    </h6>
                </a>
            </div>
        </div>
  
        <div class="card p-3">
            <div class="row">
                <div class="col-lg-12">
                        <div class="row align-items-center gap-3 my-3">
                            <div class="col-lg-3">
                                <img src="img/laptop.jpg" class="checkout-image" alt="" srcset="">
                            </div>
                            <div class="col-lg-7">
                                <div class="item-details">
                                   <div class="destination d-flex gap-3 mb-3 align-items-center">
                                        <h3 class="fw-bold">Jakarta</h3>
                                        <span class="bg-primary" style="width: 15px; height: 2px;"></span>
                                        <h3 class="fw-bold">Jakarta</h3>
                                   </div>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet sed laboriosam mollitia tenetur enim. Voluptate, placeat sint error fugit voluptatum veritatis ratione et enim dicta hic rem ex numquam tempora.</p>
                                </div>
                            </div>
                        </div>
                       
                        <div class="trip-item my-5">
                            <h3 class="fw-bold">Item</h3>
                            <div class="card my-3 p-3">
                                <div class="row p-1 ">
                                    <div class="col-lg-2">
                                        <img src="img/laptop.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-6 ms-lg-5">
                                        <div class="item-name mb-3">
                                            <h4 class="fw-bold text-primary">Item Name</h4>
                                            <p>Laptop</p>
                                        </div>

                                        <div class="item-price mb-3">
                                            <h4 class="fw-bold text-primary">Item price</h4>
                                            <p>$190</p>
                                        </div>

                                        <div class="item-weight mb-3">
                                            <h4 class="fw-bold text-primary">Item weight</h4>
                                            <p>1KG</p>
                                        </div>

                                        <div class="item-description mb-3">
                                            <h4 class="fw-bold text-primary">Item Description</h4>
                                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis, similique fugit? Architecto enim nostrum minima quam recusandae cumque sapiente vero magni. Ut laborum id autem et eos dolorum placeat inventore.</p>
                                        </div>
                                </div>
                                <div class="col-lg-2 me-lg-5 position-absolute" style="top: 45%; right: 0;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="form-group">
                                            <label for="" class="form-label">Amount</label>
                                            <input type="number" style="width: 50px">
                                        </div>
                                        <a href="#" class="mt-lg-4">
                                            <i class="fa fa-shopping-cart fa-2x"></i>
                                        </a>
                                    </div>
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

{{--                 
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
                </div> --}}
            </div>
        </div>
    </div>
</section>
@endsection