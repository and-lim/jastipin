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
            <div class="dashboard-btn mb-3">
                <a href="/dashboard" class="btn btn-warning p-1 float-end">
                    <h6 class="mt-2"><i class="fa fa-arrow-left me-2"></i>  
                        Back to Dashboard   
                    </h6>
                </a>
            </div>
            <div class="col-lg-12">
                <div class="card p-3 shadow">
                    <h3 class="fw-bold ">Trip Details</h3>

                    <div class="d-flex align-items-center gap-3 my-3">
                            <img src="img/laptop.jpg" class="checkout-image" alt="" srcset="">
                            <div class="item-details">
                                <h3>tes</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet sed laboriosam mollitia tenetur enim. Voluptate, placeat sint error fugit voluptatum veritatis ratione et enim dicta hic rem ex numquam tempora.</p>
                            </div>
                    </div>
                  
                    <div class="trip-item my-3">
                        <h3 class="fw-bold">Trip Item</h3>
                        <div class="card my-3 p-3">
                            <div class="row gap-3 p-1 align-items-center ">
                                <div class="col-lg-2">
                                    <img src="img/laptop.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-lg-7">
                                    <h3 class="mb-2">Lorem</h3>
                                    <p>Lorem ipsum</p>
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
                            </div>
                        </div>
                    </div>
                    {{-- <div class="request mt-3 p-3">
                        <h2 class="mb-3">Category</h2>

                        <div class="form-group">
                            <div class="form-category">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <select class="form-select">
                                            <option selected>Category</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
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
                            
                            <a href="" class="btn btn-primary mt-3 px-5">Update</a>
                        </div>
                    </div> --}}
                </div>
        </div>
    </div>
</section>

@endsection