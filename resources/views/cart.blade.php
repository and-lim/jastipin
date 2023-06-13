@extends('layout')

@section('mainSection')

<section>
    <div class="container-xl mt-3 py-5">
        <h1 class="title mt-3 pb-5">Cart</h1>
        <div class="row">
            <div class="card col-lg-9 shadow-sm p-3">
                @if ($errors->any())
                <div class="alert alert-dark" role="alert" style="outline: none">
                    <i class="text-danger mt-1">{{$errors->first()}}</i>
                </div>
                @endif

                @php

                $sumItemPriceTrip = array();
                $sumRequestPriceTrip = array();
                $sumItemAmount = array();
                $sumRequestAmount = array();
                $sumBeacukaiPabean = array();
                $item_array = array();
                $request_array = array();
                $array_cart_trip = array();
                $sumTaxTrip = array();

                $sumItemPrice = 0;
                $sumItemQuantity = 0;
                $sumItemWeight = 0;
                $sumItemPpn = 0;
                $sumItemPabean = 0;

                $sumRequestPrice = 0;
                $sumRequestQuantity = 0;
                $sumRequestWeight = 0;
                $sumRequestPpn = 0;
                $sumRequestPabean = 0;

                $sumTaxTotal = 0;
                @endphp

                @foreach ($cart_trip as $trip)
                
                @php
                $contain_item_price = 0;
                $contain_request_price = 0;
                $contain_item_quantity = 0;
                $contain_request_quantity = 0;
                $contain_beacukai_pabean = 0;
                $array_cart_trip[$trip->trip_id] = $trip;
                $sumTaxTrip[$trip->trip_id] = $trip->tax;
                $sumTaxTotal = $sumTaxTotal + $sumTaxTrip[$trip->trip_id];
                @endphp


        

                @foreach($array_trip[$trip->trip_id]->items as $item)


                @php
                $sumItemQuantity = $sumItemQuantity + $item->cart_item_quantity;
                $sumItemWeight = $sumItemWeight + $item->item_weight;
                $sumItemPpn = $sumItemPpn + $item->item_price_ppn;
                $sumItemPabean = $sumItemPabean + $item->item_price_pabean;
                $sumItemPrice = $sumItemPrice + ($item->item_display_price * $item->cart_item_quantity);
                $contain_item_price = $contain_item_price + ($item->item_display_price * $item->cart_item_quantity);
                $contain_item_quantity = $contain_item_quantity + $item->cart_item_quantity;
                $contain_beacukai_pabean = $contain_beacukai_pabean + $sumItemPpn + $sumItemPabean;
                @endphp


                <div class="item-cart border border-2 border-dark p-3 my-1">
                    <p>{{ $trip->destination }} - {{ $trip->origin }}</p>
                    <div class="row gap-3">
                        <div class="col-lg-3">
                            <img src="{{ asset('/storage/' .$item->item_image) }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-8">
                            <div class="item-detail pb-2">
                                <a href="/trip-detail/{{ $item->trip_id }}" class="text-decoration-none text-dark">
                                    <h1 class="mb-2">{{ $item->item_name }}</h1>
                                </a>
                                <p>{{ $item->item_description }}</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form">
                                        <label class="form-label text-primary">Display Price</label>
                                        <p>Rp {{ $item->item_display_price }}</p>
                                    </div>
                                    <div class="form">
                                        <label class="form-label text-primary">Weight</label>
                                        <p>{{ $item->item_weight }} Kg</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="float-end d-flex gap-2 mb-3">
                        <input type="number" value="{{ $item->cart_item_quantity }}" min="1" max="{{ $item->item_stock }}" style="width: 50px">
                        <form action="/deleteItemCart" method="POST">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item->item_id }}">
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>

                </div>
                @endforeach

                @foreach($array_trip[$trip->trip_id]->request_items as $request)

                @php
                $sumRequestQuantity = $sumRequestQuantity + $request->request_quantity;
                $sumRequestWeight = $sumRequestWeight + $request->request_weight;
                $sumRequestPpn = $sumRequestPpn + $request->request_price_ppn;
                $sumRequestPabean = $sumRequestPabean + $request->request_price_pabean;
                $sumRequestPrice = $sumRequestPrice + ($request->request_price * $request->request_quantity) + $sumRequestPpn + $sumRequestPabean;
                $contain_request_price = $contain_request_price + ($request->request_price * $request->request_quantity) + $sumRequestPpn + $sumRequestPabean;
                $contain_request_quantity = $contain_request_quantity + $request->request_quantity;
                $contain_beacukai_pabean = $contain_beacukai_pabean + $sumRequestPpn + $sumRequestPabean;
                @endphp

                <div class="item-cart border border-2 border-dark p-3 my-1">
                    <h4 class="mb-3">Request</h4>
                    <div class="row gap-3">
                        <div class="col-lg-3">
                            <img src="{{ asset('/storage/' .$request->request_image) }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-8">
                            <div class="request-detail pb-2">
                                <a href="/trip-detail/{{ $request->trip_id }}" class="text-decoration-none">
                                    <h1 class="mb-2">{{ $request->request_name }}</h1>
                                </a>
                                <p>{{ $request->request_description }}</p>
                            </div>
                        
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form">
                                        <label class="form-label text-primary">Price</label>
                                        <p>Rp {{ $request->request_price }}</p>
                                    </div>
                                    <div class="form">
                                        <label class="form-label text-primary">Quantity</label>
                                        <p>{{ $request->request_quantity }} PC/s</p>
                                    </div>
                                    <div class="form">
                                        <label class="form-label text-primary">Weight</label>
                                        <p>{{ $request->request_weight }} Kg</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form">
                                        <label class="form-label text-primary">Status</label>
                                        <p>{{ $request->request_status }}</p>
                                    </div>
                                    <div class="form">
                                        <label class="form-label text-primary">PPN</label>
                                        <p>Rp {{ $request->request_price_ppn }}</p>
                                    </div>
                                    <div class="form">
                                        <label class="form-label text-primary">Pabean</label>
                                        <p>Rp {{ $request->request_price_pabean }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="float-end d-flex gap-2 mb-3">
                        <form action="/deleteRequestCart" method="POST">
                            @csrf
                            <input type="number" value="{{ $request->request_quantity }}" style="width: 50px">
                            <input type="hidden" name="request_id" value="{{ $request->request_id }}">
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>

                </div>
                @endforeach

                @php
                $sumItemPriceTrip[$trip->trip_id] = $contain_item_price;
                $sumRequestPriceTrip[$trip->trip_id] = $contain_request_price;
                $sumItemAmount[$trip->trip_id] = $contain_item_quantity;
                $sumRequestAmount[$trip->trip_id] = $contain_request_quantity;
                $sumBeacukaiPabean[$trip->trip_id] = $contain_beacukai_pabean;
                @endphp

                <p>Total Item Price in this Trip: Rp {{ $sumItemPriceTrip[$trip->trip_id] }}</p>
                <p>Total Request Price in this Trip: Rp {{ $sumRequestPriceTrip[$trip->trip_id] }}</p>
                <p>Total tax in this trip: RP {{ $trip->tax }}</p>

                @endforeach

                {{-- details --}}
                <div class="cart-details 1 mt-2 py-5">
                    <h3 class="mb-3">Details</h3>
                    <div class="d-flex justify-content-between">
                        <p>total pesanan:</p>
                        <p>{{ $sumItemQuantity + $sumRequestQuantity }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>total price:</p>
                        <p>{{ $sumItemPrice + $sumRequestPrice + $sumTaxTotal }}</p>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <input type="hidden" name="$sumItemQuantity" value="{{ $sumItemQuantity }}">
                    <input type="hidden" name="$sumRequestQuantity" value="{{ $sumRequestQuantity }}">
                    <input type="hidden" name="$sumItemPrice" value="{{ $sumItemPrice }}">
                    <input type="hidden" name="$sumRequestPrice" value="{{ $sumRequestPrice }}">
                    <input type="hidden" name="$sumItemWeight" value="{{ $sumItemWeight }}">
                    <input type="hidden" name="$sumRequestWeight" value="{{ $sumRequestWeight }}">
                    <!-- <button type="submit" @if ($check_status) disabled @endif class="btn btn-success px-3 fw-bold">Checkout</button> -->
            
                </div>

                <div class="button text-start">
                    <button type="button" @if ($check_status) disabled @endif class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Checkout
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Checkout</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h3 class="text-start text-primary">Shipping</h3>

                                    @foreach ($cart_trip as $trip)
                                    <p hidden id="ongkir{{ $trip->trip_id }}">{{ $trip->ongkir }}</p>
                                    <p>{{ $trip->destination }} - {{ $trip->origin }}</p>

                                    <div class="button-shipping d-flex gap-3 my-3">
                                        <button id="regular{{ $trip->trip_id }}" class="btn btn-warning regular">Regular</button>
                                        <button id="instant{{ $trip->trip_id }}" class="btn btn-success instant">Instant</button>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="items-checkout">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td class="col-10">Total Item</td>
                                                        <td>{{ $sumItemAmount[$trip->trip_id] + $sumRequestAmount[$trip->trip_id] }} Pcs</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-10">Total Item Price</td>
                                                        <td>Rp {{ $sumItemPriceTrip[$trip->trip_id] + $sumRequestPriceTrip[$trip->trip_id] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-10">Total Tax Price</td>
                                                        <td>Rp {{ $sumTaxTrip[$trip->trip_id] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-10">Total Shipping Fee</td>
                                                        <td>
                                                            <p class="shipping_fee" id="shipping_fee{{ $trip->trip_id }}"></p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot style="border-top: 2px solid black; ">
                                                    <tr class="table-padding">
                                                        <td class="col-10">Total</td>
                                                        <td>
                                                            <p id="total_pay{{ $trip->trip_id }}"></p>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                                <input type="hidden" id="sumItemPriceTrip{{ $trip->trip_id }}" value="{{ $sumItemPriceTrip[$trip->trip_id] }}">
                                                <input type="hidden" id="sumRequestPriceTrip{{ $trip->trip_id }}" value="{{ $sumRequestPriceTrip[$trip->trip_id] }}">
                                                <input type="hidden" id="sumTaxTrip{{ $trip->trip_id }}" value="{{ $sumTaxTrip[$trip->trip_id] }}">
                                            </table>
                                            @endforeach
                                            <p id="total_all">Total Pay: Rp {{ $sumItemPrice + $sumRequestPrice + $sumTaxTotal}}</p>
                                            <p>Your Balance</p>
                                            @auth
                                            <p>Rp {{ auth()->user()->balance }}</p>
                                            @endauth

                                            <div class="text-center mt-3">
                                                <form action="/pay" method="POST">
                                                    @csrf
                                                    @foreach ($cart_trip as $trip)
                                                    
                                                    <input type="hidden" name="cart_trip[{{ $trip->trip_id }}]" value="{{ json_encode($array_cart_trip[$trip->trip_id]) }}">
                                                    <input type="hidden" name= "array_trip_item[{{ $trip->trip_id }}]" value=" {{ json_encode($array_trip[$trip->trip_id]->items) }}">
                                                    <input type="hidden" name= "array_trip_request[{{ $trip->trip_id }}]" value="{{ json_encode($array_trip[$trip->trip_id]->request_items) }}">
                                                    <input type="hidden" name="beacukai_pabean[{{$trip->trip_id}}]" value="{{ json_encode($sumBeacukaiPabean[$trip->trip_id]) }}">
                                                    <input type="hidden" id="shipping_type{{ $trip->trip_id }}" name="shipping_type[{{ json_encode($trip->trip_id) }}]" value="">
                                                    <input type="hidden" id="shipping_price{{ $trip->trip_id }}" name="shipping_price[{{ json_encode($trip->trip_id) }}]" value="">
                                                    <input type="hidden" id="price_per_trip{{ $trip->trip_id }}" name="price_per_trip[{{ $trip->trip_id }}]" value="">
                                                    @endforeach
                                                    <input type="hidden" class="total_all" name="total_all" value="">
                                                    <button type="submit" disabled id="pay" class="btn btn-primary">Pay</button>
                                                </form>
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
            <div class=" col-lg-3">
                <div class="card p-3 shadow-sm">
                    <h3 class="text-primary fw-bold">Tax Note</h3>
                    <div class="line" style =""></div>
                    <ul class="tax-content my-3 d-flex flex-column gap-2">
                        <li>FOB = USD $500</li>
                        <li>$1 = Rp 15000</li>
                        <li>PPN = 11%</li>
                        <li>PPH dengan NPWP = 10%</li>
                        <li>Jika barang dikurangi nilai pabean > USD $500 = Bea cukai</li>
                    </ul>

                </div>
            </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>

    
    $('.regular').click(function() {
        $(this).addClass('ongkir')
        $(this).siblings('.instant').removeClass('ongkir')
       
        var id = $(this).attr("id")
        var number_id = parseInt(id.replace("regular", ""));
        var regular = parseInt(document.getElementById('ongkir' + number_id).innerHTML)/2

        console.log(regular);

        
        var sumItemPriceTrip = parseInt($('#sumItemPriceTrip'+ number_id).val());
        var sumRequestPriceTrip = parseInt($('#sumRequestPriceTrip'+ number_id).val());
        var sumTaxTrip = parseInt($('#sumTaxTrip' + number_id).val())
        // var sumBeacukaiPabean = parseInt($('#sumBeacukaiPabean' + number_id).val())

        $('#shipping_fee'+ number_id).text('Rp ' + regular);

        var price = sumItemPriceTrip + sumRequestPriceTrip + sumTaxTrip;
        var total_pay = price + regular;

        
        $('#total_pay'+ number_id).text('Rp ' + total_pay);
        $('#price_per_trip'+ number_id).val(total_pay);
        $('#total_payment').val(total_pay);
        $('#shipping_type' + number_id).val(1);
        $('#shipping_price' + number_id).val(regular);
        $('#pay').prop('disabled', false)

        updateTotal()
        border()
    });

    $('.instant').click(function() {
        $(this).addClass('ongkir')
        $(this).siblings('.regular').removeClass('ongkir')
        var id = $(this).attr("id")
        var number_id = id.replace("instant", "")
        var instant = parseInt(document.getElementById('ongkir' + number_id).innerHTML)

        console.log(instant);
        var sumItemPriceTrip = parseInt($('#sumItemPriceTrip'+ number_id).val());
        var sumRequestPriceTrip = parseInt($('#sumRequestPriceTrip'+ number_id).val());
        var sumTaxTrip = parseInt($('#sumTaxTrip' + number_id).val())
        // var sumBeacukaiPabean = parseInt($('#sumBeacukaiPabean' + number_id).val())
        

        $('#shipping_fee' + number_id).text('Rp ' + instant);

        var price = sumItemPriceTrip + sumRequestPriceTrip + sumTaxTrip;
        // console.log(price)
        var total_pay = price + instant;

        $('#total_pay'+ number_id).text('Rp ' + total_pay);
        $('#price_per_trip'+ number_id).val(total_pay);

        $('#total_payment').val(total_pay);
        $('#shipping_type' + number_id).val(2);
        $('#shipping_price' + number_id).val(instant);
        $('#pay').prop('disabled', false)

        updateTotal()

    });

    function updateTotal(){
        var total_all = "{{ $sumItemPrice + $sumRequestPrice + $sumTaxTotal }}"
        total_all = parseInt(total_all)

        const total_shipping = document.getElementsByClassName("shipping_fee");


        for(let i = 0; i<total_shipping.length; i++){

            if(total_shipping[i].innerHTML != ""){

                total_all += parseInt(total_shipping[i].innerHTML.replace("Rp ", ""));
            }

        }


        $('#total_all').text('Total Pay: Rp ' + total_all)
        $('.total_all').val(total_all)
    }
</script>

@endsection