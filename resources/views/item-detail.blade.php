@extends('layout')

@section('mainSection')
<section class="my-5 py-3">

     <div class="container py-5 my-5">
          <h1 class="mb-3">Details</h1>
          <div class="card shadow p-3">
               <div class="row gap-5 justify-content-center">
                    <div class="col-lg-3 me-lg-3">
                         <img src="{{ asset('/storage/' .$wtb_detail->wtb_image) }}" style="width: 300px" alt="" srcset="">
                    </div>
                    <div class="col-lg-8">
                         <div class="row">
                              <div class="col-lg-6">
                                   <div class="item-name">
                                        <h3 class="fw-bold text-primary">Item Name</h3>
                                        <h5 class="my-3">{{ $wtb_detail->wtb_name }}</h5>
                                   </div>

                                   <div class="item-desc">
                                        <h3 class="fw-bold text-primary ">Item Description :</h3>
                                        <p>{{ $wtb_detail->wtb_description }}</p>
                                   </div>

                                   <div class="item-weight">
                                        <h3 class="fw-bold text-primary">Weight</h3>
                                        <p>{{ $wtb_detail->wtb_weight }}</p>
                                   </div>
                              </div>

                              <div class="col-lg-6">
                                   <div class="item-price">
                                        <h3 class="fw-bold text-primary">Price</h3>
                                        <p>Rp {{ $wtb_detail->wtb_price }}</p>
                                   </div>

                                   <div class="item-quantity">
                                        <h3 class="fw-bold text-primary">Quantity</h3>
                                        <p>Rp {{ $wtb_detail->wtb_amount }}</p>
                                   </div>

                                   @php
                                   $price = $wtb_detail->wtb_price;
                                   $quantity = $wtb_detail->wtb_amount;
                                   @endphp
                                   <div class="item-total-price">
                                        <h3 class="fw-bold text-primary">Total Price</h3>
                                        <p>Rp {{ $price*$quantity }}</p>
                                   </div>
                              </div>

                         </div>
                         <div class="button d-flex gap-3">
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                   Checkout
                              </button>
                              @if (Auth::user()->id != $wtb_detail->user_id)
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                   Checkout
                              </button>
                              @endif
                              <a href="/item" class="btn btn-warning">Back</a>
                         </div>

                    </div>
               </div>
               <!-- Modal -->
               <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h1 class="modal-title fs-5" id="exampleModalLabel">Checkout</h1>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                   <h3 class="text-start text-primary">Shipping</h3>
                                   <div class="button-shipping d-flex gap-3 my-3">
                                        <button class="btn btn-warning">Regular</button>
                                        <button class="btn btn-success">Instant</button>
                                   </div>
                                   <div class="row mt-2">
                                        <div class="items-checkout">
                                             <table class="table table-borderless">
                                                  <tbody>
                                                       <tr>
                                                            <td class="col-10">Total Item</td>
                                                            <td> Pcs</td>
                                                       </tr>
                                                       <tr>
                                                            <td class="col-10">Total Item Price</td>
                                                            <td>Rp.12468</td>
                                                       </tr>
                                                       <tr>
                                                            <td class="col-10">Total Shipping Fee</td>
                                                            <td>Rp.12468</td>
                                                       </tr>
                                                  </tbody>
                                                  <tfoot style="border-top: 2px solid black; ">
                                                       <tr class="table-padding">
                                                            <td class="col-10">Total</td>
                                                            <td>Rp.12468</td>
                                                       </tr>
                                                       <tr>
                                                            <td class="col-10">Your Balance</td>
                                                            <td>Rp.12468</td>
                                                       </tr>
                                                  </tfoot>
                                             </table>
                                             <div class="text-center mt-3">
                                                  <button type="button" class="btn btn-primary">Pay</button>
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