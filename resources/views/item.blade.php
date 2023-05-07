@extends('layout')

@section('mainSection')
<section class="hero">  
    <div class="hero-header py-5" style="height: 50vh">
        <div class="container mt-4">
            <div class="row col-lg-10 mx-auto">
                <div class="search-title my-3 text-center">
                    <h1 class="fw-bold text-white">Search your item</h1>
                </div>
                <div class="search-form col-lg-9 mx-auto ">
                  <i class="fa fa-search"></i>
                  <input type="text" class="form-control form-input" placeholder="Search anything...">
                </div>
              </div>
              <div class="search-button d-flex justify-content-center mt-3">
                <a href="" class="btn btn-warning text-center mx-auto">Search</a>
            </div>
        </div>
    </div>
    <div class="line p-2"></div>

    <div class="container-fluid mx-1 mt-5">
        <p class="text-start">Result</p>
        <div class="row m-0">
          <div class="col-lg-3">
                <aside class="left-sidebar p-3 shadow">
                  <div class="sidebar-title">
                      <h5 class="fw-bold">Category</h5>
                  </div>
                  <div class="category-list mt-3">
                    <input type="checkbox" id="food" name="food" value="food">
                    <label for=""> Food</label><br></li>   
                    <input type="checkbox" id="food" name="food" value="food">
                    <label for=""> Food</label><br></li>   
                    <input type="checkbox" id="food" name="food" value="food">
                    <label for=""> Food</label><br></li>   
                  </div>
                </aside>
            </div>

          <div class="col-lg-9">
            <div class="row">
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
                    <div class="product-button">
                      <a href="#" class="icon">
                        <i class="fa fa-shopping-cart"></i>
                      </a>
                      <a href="/item-detail" class="btn btn-warning text-center mx-auto float-end">See detail</a>
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
                    <div class="product-button">
                      <a href="#" class="icon">
                        <i class="fa fa-shopping-cart"></i>
                      </a>
                      <a href="" class="btn btn-warning text-center mx-auto float-end">See detail</a>
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
                    <div class="product-button">
                      <a href="#" class="icon">
                        <i class="fa fa-shopping-cart"></i>
                      </a>
                      <a href="" class="btn btn-warning text-center mx-auto float-end">See detail</a>
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