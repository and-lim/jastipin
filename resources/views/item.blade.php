@extends('layout')

@section('mainSection')
<section class="hero">  
    <div class="hero-header py-5" style="height: 50vh">
        <div class="container mt-4">
            <div class="row">
                <div class="search-title text-center">
                    <h1 class="fw-bold text-white">Search your item</h1>
                </div>
            </div>
            <div class=" form-hero rounded-3 pb-3 col-9 position-relative mt-3">
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
                              <button>Search</button> 
                            </div> 
                        </div>
                    </div>
                  </div>
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
                    <div class="p_icon">
                      <a href="#">
                        <i class="fa fa-eye"></i>
                      </a>
                      <a href="#">
                        <i class="fa fa-heart"></i>
                      </a>
                      <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                      </a>
                    </div>
                  </div>
                  <div class="product-btm">
                    <a href="#" class="d-block">
                      <h4>Laptop</h4>
                    </a>
                    <div class="mt-3">
                      <span class="me-4">$25.00</span>
                      <del>$35.00</del>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="product">
                  <div class="product-img">
                      <img src="img/laptop.jpg" class="card-img" alt="">
                    <div class="p_icon">
                      <a href="#">
                        <i class="fa fa-eye"></i>
                      </a>
                      <a href="#">
                        <i class="fa fa-heart"></i>
                      </a>
                      <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                      </a>
                    </div>
                  </div>
                  <div class="product-btm">
                    <a href="#" class="d-block">
                      <h4>Laptop</h4>
                    </a>
                    <div class="mt-3">
                      <span class="me-4">$25.00</span>
                      <del>$35.00</del>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="product">
                  <div class="product-img">
                      <img src="img/laptop.jpg" class="card-img" alt="">
                    <div class="p_icon">
                      <a href="#">
                        <i class="fa fa-eye"></i>
                      </a>
                      <a href="#">
                        <i class="fa fa-heart"></i>
                      </a>
                      <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                      </a>
                    </div>
                  </div>
                  <div class="product-btm">
                    <a href="#" class="d-block">
                      <h4>Laptop</h4>
                    </a>
                    <div class="mt-3">
                      <span class="me-4">$25.00</span>
                      <del>$35.00</del>
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