@extends('layout')

@section('mainSection')
    <section>
        <div class="hero hero-header my-3" style="height: 50vh">
           <div class="container">
                <h1 class="text-white text-center">Dashboard</h1>
           </div>
        </div>

        <div class="container my-3 py-5 dashboard">
            <div class="row">
                <div class="col-lg-3">
                    <div class="menu-header text-center mb-3">Menu</div>
                    <ul class="nav flex-column gap-2" id="nav-tab" role="tablist">
                        <li class="dashboard-nav">
                            <a class="nav-link active d-flex align-items-center" id="nav-dashboard-tab" data-bs-toggle="tab" data-bs-target="#nav-dashboard" type="button" role="tab" aria-controls="nav-dashboard" aria-selected="true">
                                <i class="fa fa-columns"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="dashboard-nav">
                            <a class="nav-link d-flex align-items-center" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false">
                                <i class="fa fa-user"></i>
                                <span>Profile </span>
                            </a>
                        </li> 
                        <li class="dashboard-nav">
                            <a class="nav-link d-flex align-items-center" id="nav-item-tab" data-bs-toggle="tab" data-bs-target="#nav-item" type="button" role="tab" aria-controls="nav-item" aria-selected="false">
                                <i class="fa fa-shopping-cart"></i>
                                <span>item</span>
                            </a>
                        </li>
                        <li class="dashboard-nav">
                            <a class="nav-link d-flex align-items-center" id="nav-trip-tab" data-bs-toggle="tab" data-bs-target="#nav-trip" type="button" role="tab" aria-controls="nav-trip" aria-selected="false">
                                <i class="fa fa-map-marker-alt"></i>
                                <span>trip</span>
                            </a>
                        </li>
                        @auth
                        <form action="/logout" method="POST">
                        @csrf
                        <li class="dashboard-nav">
                            <button class="btn btn-link nav-link text-decoration-none d-flex gap-4 align-items-center" type="submit" id="logout">
                                <i class="fa fa-power-off"></i>
                                <span>Logout</span>
                            </button>
                        </li>
                        </form>
                        @endauth
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="menu-header text-center mb-3">Dashboards</div>   
                    <div class="tab-content" id="nav-tabContent">
                         <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel" aria-labelledby="nav-dashboard-tab">
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="card shadow-sm py-3">
                                        <h1 class="text-dark fw-bold px-3">welcome</h1><br>
                                        <h3 class="px-3">User</h3>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card shadow-sm text-center">
                                        <h2 class="text-dark fw-bold mt-1 text-decoration-underline">Balance</h2>
                                        <div class="card-body mt-0">
                                            <h2 class="text-success">$20</h2>
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-lg-3">
                                    <div class="card shadow-sm text-center">
                                        <h2 class="text-dark fw-bold mt-1">Trip</h2>
                                        <a href="/trip" class="card-body dashboard-icon mt-0">
                                            <i class="fa fa-map-marker-alt fa-2x text-warning"></i>
                                            <h2>30</h2>
                                        </a>
                                    </div>
                                 </div>
                                 <div class="col-lg-3">
                                    <div class="card shadow-sm text-center">
                                        <h2 class="text-dark fw-bold mt-1">Item</h2>
                                        <a href="/item" class="card-body dashboard-icon mt-0">
                                            <i class="fa fa-shopping-cart fa-2x text-primary"></i>
                                        </a>
                                    </div>
                                 </div>
                            </div>
                        
                         </div>
                        
                        
                        
                        <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                          <div class="card p-3 shadow-sm">
                             <div class="mb-3 form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly class="form-control" id="name" value="name">
                                </div>
                              </div>
                              <div class="mb-3 form-group row">
                                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly class="form-control" id="email" value="email">
                                </div>
                              </div>
                              <div class="mb-3 form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="inputPassword">
                                </div>
                              </div>
                              <div class="mb-3 form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="inputPassword">
                                </div>
                              </div>

                              <div class="submit-btn text-center">
                                <a href="" class="btn btn-primary">Submit</a>
                              </div>
                         
                          </div>
                        </div>

                        <div class="tab-pane fade" id="nav-item" role="tabpanel" aria-labelledby="nav-item-tab">
                            <div class="row"> 
                                <div class="add-item mb-3">
                                    <a href="" class="float-end btn btn-warning">add item</a>
                                </div>     
                                <div class="col-lg-4">
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="img/laptop.jpg" class="card-img" alt="">
                                        </div>
                                        <div class="product-btm">
                                          <div class="price">
                                            <a href="#" class="d-block">
                                              <h4>Laptop</h4>
                                            </a>
                                            <div class="mt-3">
                                              <span class="me-4">$25.00</span>
                                              <del>$35.00</del>
                                            </div>
                                          </div>
                                          <div class="product-button text-center mt-3">
                                            <a href="" class="btn btn-warning text-center mx-auto">See detail</a>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                  
                                <div class="col-lg-4">
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="img/laptop.jpg" class="card-img" alt="">
                                        </div>
                                        <div class="product-btm">
                                          <div class="price">
                                            <a href="#" class="d-block">
                                              <h4>Laptop</h4>
                                            </a>
                                            <div class="mt-3">
                                              <span class="me-4">$25.00</span>
                                              <del>$35.00</del>
                                            </div>
                                          </div>
                                          <div class="product-button text-center mt-3">
                                            <a href="" class="btn btn-warning text-center mx-auto">See detail</a>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                  
                                <div class="col-lg-4">
                                  <div class="product">
                                    <div class="product-img">
                                        <img src="img/laptop.jpg" class="card-img" alt="">
                                    </div>
                                    <div class="product-btm">
                                      <div class="price">
                                        <a href="#" class="d-block">
                                          <h4>Laptop</h4>
                                        </a>
                                        <div class="mt-3">
                                          <span class="me-4">$25.00</span>
                                          <del>$35.00</del>
                                        </div>
                                      </div>
                                      <div class="product-button text-center mt-3">
                                        <a href="" class="btn btn-warning text-center mx-auto">See detail</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                       
                              </div>
                        </div>
                       
                        <div class="tab-pane fade" id="nav-trip" role="tabpanel" aria-labelledby="nav-trip-tab">
                            <div class="travel-list d-flex flex-column gap-2">
                                <div class="add-trip mb-3">
                                    <a href="" class="float-end btn btn-warning">add trip</a>
                                </div> 
                                <div class="card shadow-sm">
                                    <div class="card-header d-flex align-items-center gap-5">
                                        <h2>Jakarta</h2>
                                        <span>-</span>
                                        <h2>Tokyo</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <img src="img/laptop.jpg" class="img-fluid" alt="">
                                            </div>
                                        <div class="col-lg-9">
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At debitis itaque blanditiis dicta porro quidem nihil magni molestiae nemo aspernatur. Et doloremque porro quaerat culpa officiis molestiae ducimus asperiores eligendi.</p>
                                        <div class="row g-0">
                                            <div class="col-lg-2">
                                                <img src="img/snack.jpg" style="width: 60px" class="img-fluid" alt="">
                                            </div>
                                            <div class="col-lg-2">
                                                <img src="img/snack.jpg" style="width: 60px" class="img-fluid" alt="">
                                            </div>
                                            <div class="col-lg-2">
                                                <img src="img/snack.jpg" style="width: 60px" class="img-fluid" alt="">
                                            </div>
                                            <div class="col-lg-2">
                                                <img src="img/snack.jpg" style="width: 60px" class="img-fluid" alt="">
                                            </div>
                                            <div class="col-lg-2">
                                                <img src="img/snack.jpg" style="width: 60px" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="float-end">
                                            <a href="" class="btn btn-outline-primary">see details</a>
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
