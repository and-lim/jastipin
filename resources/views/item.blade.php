@extends('layout')

@section('mainSection')
<section>  
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

    <div class="container-fluid mx-1 my-5 py-5">
        <div class="row m-0">
          <div class="col-lg-3">
                <aside class="left-sidebar rounded-3 p-3 shadow">
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
                  <div class="button text-center">
                    <button class="btn btn-primary my-2 text-center">Filter</button>
                  </div>
                </aside>
            </div>

          <div class="col-lg-9">
            <div class="row">
              @foreach ($wtb_item as $wtb)
              <div class="col-lg-4">
                <div class="product">
                  <div class="product-img">
                      <img src="{{ asset('/storage/' .$wtb->wtb_image) }}" class="card-img" alt="">
                  </div>
                  <div class="product-btm">
                    <div class="item-details mb-3">
                      <a href="#" class="d-block">
                        <h4>{{ $wtb->wtb_name }}</h4>
                      </a>
                      <div class="mt-3">
                        <span class="me-4">Rp {{ $wtb->wtb_price }}</span>
                        <!-- <del>$35.00</del> -->
                      </div>
                      <div class="mt-3">
                        <span class="me-4">Quantity: {{ $wtb->wtb_amount }} Pc/s</span>
                      </div>
                    </div>
                  
                  </div>
                  <div class="product-button d-flex justify-content-end p-3">
                    <a href="/item-detail/{{ $wtb->id }}" class="btn btn-warning">See detail</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
        </div>
        </div>
    </div>
    
</section>
@endsection