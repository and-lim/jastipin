@extends('layout')

@section('mainSection')
<section>
    <div class="container my-5 py-5">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-3">
                <div class="image-profile mb-3 d-flex flex-column justify-content-center align-items-center my-3">
                    <img src="img/laptop.jpg" class="" alt="">
                </div>
                <div class="traveler-profile text-center">
                    <h2 class="fw-bold mb-3">Name</h2>
                    <div class="d-flex justify-content-between mx-auto col-lg-8">
                        <div class="star ">
                            <small class="fa fa-star"></small>
                            <small class="fa fa-star"></small>
                            <small class="fa fa-star"></small>
                            <small class="fa fa-star"></small>
                            <small class="fa fa-star"></small>
                        </div>
                        <div class="score">
                            <p class="d-inline-block">5</p>
                            <p class="d-inline-block"> /5</p>
                        </div>
                    </div>
                    <div class="profile-desc">
                        <p class="text-center">profile-desc </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="swiper pb-5">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="review-card p-3 border border-5 border-primary rounded-2">
                            <div class="d-flex align-items-center mb-3">
                                <img src="img/laptop.jpg" alt="" class="img-fluid flex-shrink-0 rounded-circle" style="width: 65px;">
                                <div class="ps-4">
                                    <h5 class="mb-1">Client name</h5>
                                    <span>profession</span>
                                    <div class="star text-primary">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div> 
                            <div class="comment">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa illo aperiam sequi earum praesentium repudiandae, recusandae hic,</p>    
                            </div> 
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review-card p-3 border border-5 border-primary rounded-2">
                            <div class="d-flex align-items-center mb-3">
                                <img src="img/laptop.jpg" alt="" class="img-fluid flex-shrink-0 rounded-circle" style="width: 65px;">
                                <div class="ps-4">
                                    <h5 class="mb-1">Client name</h5>
                                    <span>profession</span>
                                    <div class="star text-primary">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div> 
                            <div class="comment">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa illo aperiam sequi earum praesentium repudiandae, recusandae hic,</p>    
                            </div> 
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review-card p-3 border border-5 border-primary rounded-2">
                            <div class="d-flex align-items-center mb-3">
                                <img src="img/laptop.jpg" alt="" class="img-fluid flex-shrink-0 rounded-circle" style="width: 65px;">
                                <div class="ps-4">
                                    <h5 class="mb-1">Client name</h5>
                                    <span>profession</span>
                                    <div class="star text-primary">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div> 
                            <div class="comment">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa illo aperiam sequi earum praesentium repudiandae, recusandae hic,</p>    
                            </div> 
                        </div>
                    </div>
         
                </div>
                <div class="swiper-pagination "></div>
            </div>
        </div>

        <div class="row my-5">
            <div class="ongoing-trip mt-4">
                <h3 class="fw-bold">Ongoing Trip</h3>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 text-center">
                                <img src="img/laptop.jpg" class="img-fluid" style="width: 200px" alt="">
                                <h3 class="text-center">name</h3>
                            </div>
                        <div class="col-lg-9">
                            <h3 class="text-primary fw-bold">Jakarta - Tokyo</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At debitis itaque blanditiis dicta porro quidem nihil magni molestiae nemo aspernatur. Et doloremque porro quaerat culpa officiis molestiae ducimus asperiores eligendi.</p>
                        <div class="row gap-1">
                            <div class="col-lg-2 trip-item">
                                <img src="img/snack.jpg" style="width: 70px" class="img-fluid item-img" alt="">
                                <div class="img-detail d-flex flex-column mt-1">
                                    <label for="" class="form-label mb-0">Snack</label>
                                    <label for="" class="form-label mb-0">$30</label>
                                </div>
                            </div>
                            <div class="col-lg-2 trip-item">
                                <img src="img/snack.jpg" style="width: 70px" class="img-fluid item-img" alt="">
                                <div class="img-detail d-flex flex-column mt-1">
                                    <label for="" class="form-label mb-0">Snack</label>
                                    <label for="" class="form-label mb-0">$30</label>
                                </div>
                            </div>
                            <div class="col-lg-2 trip-item">
                                <img src="img/snack.jpg" style="width: 70px" class="img-fluid item-img" alt="">
                                <div class="img-detail d-flex flex-column mt-1">
                                    <label for="" class="form-label mb-0">Snack</label>
                                    <label for="" class="form-label mb-0">$30</label>
                                </div>
                            </div>

                
                        </div>
                        <div class="float-end">
                            <a href="/trip-detail" class="btn btn-outline-primary">see details</a>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
         
        <div class="line"></div>

        <div class="ongoing-trip mt-4">
            <h3 class="fw-bold">Past Trip</h3>
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 text-center">
                            <img src="img/laptop.jpg" class="img-fluid" style="width: 200px" alt="">
                            <h3 class="text-center">name</h3>
                        </div>
                    <div class="col-lg-9">
                        <h3 class="text-primary fw-bold">Jakarta - Tokyo</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At debitis itaque blanditiis dicta porro quidem nihil magni molestiae nemo aspernatur. Et doloremque porro quaerat culpa officiis molestiae ducimus asperiores eligendi.</p>
                    <div class="row gap-1">
                        <div class="col-lg-2 trip-item">
                            <img src="img/snack.jpg" style="width: 70px" class="img-fluid item-img" alt="">
                            <div class="img-detail d-flex flex-column mt-1">
                                <label for="" class="form-label mb-0">Snack</label>
                                <label for="" class="form-label mb-0">$30</label>
                            </div>
                        </div>
                        <div class="col-lg-2 trip-item">
                            <img src="img/snack.jpg" style="width: 70px" class="img-fluid item-img" alt="">
                            <div class="img-detail d-flex flex-column mt-1">
                                <label for="" class="form-label mb-0">Snack</label>
                                <label for="" class="form-label mb-0">$30</label>
                            </div>
                        </div>
                        <div class="col-lg-2 trip-item">
                            <img src="img/snack.jpg" style="width: 70px" class="img-fluid item-img" alt="">
                            <div class="img-detail d-flex flex-column mt-1">
                                <label for="" class="form-label mb-0">Snack</label>
                                <label for="" class="form-label mb-0">$30</label>
                            </div>
                        </div>

            
                    </div>
                    <div class="float-end">
                        <a href="/trip-detail" class="btn btn-outline-primary">see details</a>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection