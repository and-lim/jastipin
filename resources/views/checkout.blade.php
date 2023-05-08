@extends('layout')

@section('mainSection')

<section>
    <div class="checkout-container mx-auto py-5" style="max-width: 1180px">
        <div class="title my-5">
            <h1 class="fw-bold">Checkout</h1>
        </div>
        <div class="card p-3">
            <div class="row">
                <div class="col-lg-8">
                    <div class="address p-3 mb-3">
                        <h2 class="text-decoration-underline mb-3">Address</h2>
                        <h5>test</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, officia vero neque sequi fuga animi, obcaecati nulla vitae iure culpa quo atque quisquam asperiores autem accusantium tenetur, placeat illo itaque?</p>
                    </div>

                    <div class="items mt-3 p-3">
                        <h2 class="text-decoration-underline mb-3">items</h2>
                        <div class="d-flex align-items-center gap-3">
                            <img src="img/laptop.jpg" class="checkout-image" alt="" srcset="">
                            <div class="item-details">
                                <h3>tes</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet sed laboriosam mollitia tenetur enim. Voluptate, placeat sint error fugit voluptatum veritatis ratione et enim dicta hic rem ex numquam tempora.</p>
                            </div>
                        </div>
                    </div>

                    <div class="shipping mt-3 p-3">
                        <h2 class="text-decoration-underline mb-3">Shipping</h2>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio" name="" id="">
                            <label class="form-check-label" for="">
                              Instant
                            </label>
                          </div>
                          <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="" id="" checked>
                            <label class="form-check-label" for="">
                              Regular
                            </label>
                          </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow mt-5 p-3">
                        <div class="payment">
                            <h3 class="fw-bold mb-5">Payment</h3>
                            <div class="d-flex justify-content-between">
                                <h5>Total Price</h5>
                                <h5>20</h5>
                            </div>
                            <div class="d-flex justify-content-between my-4">
                                <h5>Total Price</h5>
                                <h5>20</h5>
                            </div>
                            <a href="" class="btn btn-primary w-100 ">Proceed</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection