@extends('layout')

@section('mainSection')

    <section class="hero">  
        <div class="hero-header py-5">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-6 mx-auto text-center text-lg-center">
                        <h1 class="text-white mb-4 text-slider-items intro-title text-center">Web jastip</h1>
                        <h1 class="text-white mb-4 text-slider intro-title"></h1>
                        <p class="text-white animated slideInDown">Tempor rebum no at dolore lorem clita rebum rebum ipsum rebum stet dolor sed justo kasd dolor sed magna dolor.</p>
                    </div>
                </div>
                <div class=" form-hero rounded-3 pb-3 col-9 position-relative mt-3">
                    {{-- <div class="form-header text-center text-white my-2">
                        <h1>form</h1>
                        <div class="bg-success my-2 mx-1" style="width: 95%; height: 5px;"></div>
                    </div> --}}
                    <div class="search mt-3"> 
                        <div class="row"> 
                          <div class="col-md-6">
                             <div class="search-1"> 
                              <i class='fa fa-search text-dark'></i>
                               <input type="text" placeholder="Item"> 
                              </div>
                             </div> 
        
                             <div class="col-md-6"> 
                                <div class="search-2"> 
                                  <i class='fa fa-map text-dark me-5'></i> 
                                  <input type="text" placeholder="country"> 
                                  <a class="btn btn-warning position-absolute px-3 mt-1" style="right: 10px;">Search</a> 
                                </div> 
                            </div>
                        </div>
                      </div>
                  <!-- <div class="row m-0 text-center d-flex justify-content-center align-items-center">
                    <div class="col-lg-5 col-12 d-flex align-items-center">
                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control px-5" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <i class="fa fa-user fa-2x mt-4 ms-1 d-lg-block d-none mx-auto"></i>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group ">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control border-2" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <a class="btn btn-warning mt-4 px-5 d-flex g-2 align-items-center">
                            <h5 class="mt-1">Search</h5>
                            <i class="fa fa-search ps-2"></i>   
                        </a>
                    </div>
                  </div> -->
                </div>
            </div>
        </div>
        <div class="line p-2"></div>
    </section>
    
    <section class="category">
        <div class="container-xl my-5">
            <div class="text-title mb-3">
                <h1 class="text-start title">Category</h1>
            </div>
            <div class="row mt-3" style="row-gap: 1rem;">
                <div class="col-lg-2">
                    <div class="category-card" >
                        <div class="card-image">
                            <img src="img/snack.png" alt="" srcset="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Food</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="category-card position-relative" >
                        <div class="card-image">
                            <img src="img/electronic.png" alt="" srcset="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Electronic</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="category-card" >
                        <div class="card-image">
                            <img src="img/skin-care.png" alt="" srcset="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Skin Care</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="category-card" >
                        <div class="card-image">
                            <img src="img/fashion.png" alt="" srcset="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Fashion</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="category-card" >
                        <div class="card-image">
                            <img src="img/furniture.png" alt="" srcset="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Furniture</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="category-card" >
                        <div class="card-image">
                            <img src="img/other.png" alt="" srcset="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mx-auto">Other</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    {{-- <section class="trip-list">
        <div class="container">
            <h1 class="title mb-3">Trip</h1>
            <div class="row ">
                <div class="col-lg-6">
                    <div class="travel-list d-flex flex-column gap-2">
                        <div class="card" style="height: 100px;">
                            <div class="card-body">
                                <div class="d-flex align-items-center" style="gap: 35px">
                                    <img src="laptop.jpg" class="img-fluid" style="width: 100px;" alt="" srcset="">
                                    <div class="trip-list">
                                        <a href="" class="d-flex gap-2 nav-link align-items-center">
                                            <i class="fa fa-user fa-1x"></i>
                                            <span> trip</span>
                                        </a>
                                        <a href="" class="d-flex gap-2 nav-link align-items-center">
                                            <i class="fa fa-map-marked-alt fa-1x"></i>
                                            <div class="d-flex align-items-center">
                                                    <i class="fa fa-flag"></i>
                                                    <div>Indonesia</div> -
                                                    <i class="fa fa-flag"></i>
                                                    <div>Indonesia</div> 
                                            </div>
                                        </a>
                                        <a href="" class="d-flex gap-2 nav-link align-items-center">
                                            <i class="fa fa-users fa-1x"></i>
                                            <span> trip</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="height: 100px;">
                            <div class="card-body">
                                <div class="d-flex align-items-center" style="gap: 35px">
                                    <img src="laptop.jpg" class="img-fluid" style="width: 100px;" alt="" srcset="">
                                    <div class="trip-list">
                                        <a href="" class="d-flex gap-2 nav-link align-items-center">
                                            <i class="fa fa-user fa-1x"></i>
                                            <span> trip</span>
                                        </a>
                                        <a href="" class="d-flex gap-2 nav-link align-items-center">
                                            <i class="fa fa-map-marked-alt fa-1x"></i>
                                            <div class="d-flex align-items-center">
                                                    <i class="fa fa-flag"></i>
                                                    <div>Indonesia</div> -
                                                    <i class="fa fa-flag"></i>
                                                    <div>Indonesia</div> 
                                            </div>
                                        </a>
                                        <a href="" class="d-flex gap-2 nav-link align-items-center">
                                            <i class="fa fa-users fa-1x"></i>
                                            <span> trip</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    
    <section class="favourite">
                <div class="container my-5">
                    <div class="col-lg-4 text-start my-5">
                        <h1 class="fw-700 border-bottom border-dark border-3">Featured Product</h1>
                    </div>
                    <div class="swiper pb-3 position-relative">
                        <div class="swiper-wrapper py-5 px-3 mb-3">
                            <div class="swiper-slide">
                                <div class="swiper-item shadow rounded overflow-hidden">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="laptop.jpg" alt="">
                                        <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">$100</small>
                                    </div>
                                    <div class="feature-item p-4 mt-2">
                                        <div class="d-flex justify-content-between mb-3">
                                            <h5 class="mb-0">Laptop</h5>
                                            <div class="ps-2">
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <small class="border-end me-3 pe-3"><i class="fa fa-city text-primary me-2"></i>Seoul</small>
                                            <small class="border-end me-3 pe-3"><i class="fa fa-map text-primary me-2"></i>S Korea</small>
                                        </div>
                                        <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                                        <div class="d-flex justify-content-between">
                                            <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">View Detail</a>
                                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="">Order</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper-item shadow rounded overflow-hidden">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="img/laptop.jpg" alt="">
                                        <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">$100</small>
                                    </div>
                                    <div class="feature-item p-4 mt-2">
                                        <div class="d-flex justify-content-between mb-3">
                                            <h5 class="mb-0">Laptop</h5>
                                            <div class="ps-2">
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <small class="border-end me-3 pe-3"><i class="fa fa-city text-primary me-2"></i>Seoul</small>
                                            <small class="border-end me-3 pe-3"><i class="fa fa-map text-primary me-2"></i>S Korea</small>
                                        </div>
                                        <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                                        <div class="d-flex justify-content-between">
                                            <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">View Detail</a>
                                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="">Order</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper-item shadow rounded overflow-hidden">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="img/laptop.jpg" alt="">
                                        <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">$100</small>
                                    </div>
                                    <div class="feature-item p-4 mt-2">
                                        <div class="d-flex justify-content-between mb-3">
                                            <h5 class="mb-0">Laptop</h5>
                                            <div class="ps-2">
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <small class="border-end me-3 pe-3"><i class="fa fa-city text-primary me-2"></i>Seoul</small>
                                            <small class="border-end me-3 pe-3"><i class="fa fa-map text-primary me-2"></i>S Korea</small>
                                        </div>
                                        <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                                        <div class="d-flex justify-content-between">
                                            <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">View Detail</a>
                                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="">Order</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination  my-5 "></div>
                        <div class="swiper-button-prev "></div>
                        <div class="swiper-button-next "></div>
                    </div>
          
                    </div>
                    
                </div>
      </section>

      @endsection