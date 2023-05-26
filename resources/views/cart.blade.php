@extends('layout')

@section('mainSection')

<section>
    <div class="container mt-3 py-5">
        <h1 class="title mt-3 pb-5">Cart</h1>

        <div class="card col-lg-10 mx-auto shadow-sm p-3">
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

            @endphp

            @foreach ($cart_trip as $trip)
            @php
            $contain_item_price = 0;
            $contain_request_price = 0;
            $contain_item_quantity = 0;
            $contain_request_quantity = 0;
            $contain_beacukai_pabean = 0;
            $array_cart_trip[$trip->trip_id] = $trip;
            @endphp


            <p>{{ $trip->destination }} - {{ $trip->origin }}</p>

            @foreach($array_trip[$trip->trip_id]->items as $item)


            @php
            $sumItemQuantity = $sumItemQuantity + $item->cart_item_quantity;
            $sumItemWeight = $sumItemWeight + $item->item_weight;
            $sumItemPpn = $sumItemPpn + $item->item_price_ppn;
            $sumItemPabean = $sumItemPabean + $item->item_price_pabean;
            $sumItemPrice = $sumItemPrice + ($item->item_display_price * $item->cart_item_quantity) + $sumItemPpn + $sumItemPabean;
            $contain_item_price = $contain_item_price + ($item->item_display_price * $item->cart_item_quantity) + $sumItemPpn + $sumItemPabean;
            $contain_item_quantity = $contain_item_quantity + $item->cart_item_quantity;
            $contain_beacukai_pabean = $contain_beacukai_pabean + $sumItemPpn + $sumItemPabean;
            @endphp


            <div class="item-cart border-bottom border-2 border-dark my-1">
                <div class="row gap-3">
                    <div class="col-lg-3">
                        <img src="{{ asset('/storage/' .$item->item_image) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8">
                        <a href="/trip-detail/{{ $item->trip_id }}" class="text-decoration-none text-dark">
                            <h1 class="mb-2">{{ $item->item_name }}</h1>
                        </a>
                        <p>Rp {{ $item->item_display_price }}</p>
                        <p>{{ $item->item_weight }} Kg</p>
                        <p>{{ $item->item_description }}</p>
                        <p>PPN : Rp{{ $item->item_price_ppn }}</p>
                        <p>Pabean : Rp{{ $item->item_price_pabean }}</p>
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
            $contain_request_quantity = $contain_request_quantity + $item->cart_item_quantity;
            $contain_beacukai_pabean = $contain_beacukai_pabean + $sumRequestPpn + $sumRequestPabean;
            @endphp

            <div class="item-cart border-bottom border-2 border-dark my-1">
                <div class="row gap-3">
                    <div class="col-lg-2">
                        <img src="{{ asset('/storage/' .$request->request_image) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8">
                        <a href="/trip-detail/{{ $request->trip_id }}">
                            <h1 class="mb-2">{{ $request->request_name }}</h1>
                        </a>
                        <p>Rp {{ $request->request_price }}</p>
                        <p>{{ $request->request_quantity }} PC/s</p>
                        <p>{{ $request->request_weight }} Kg</p>
                        <p>{{ $request->request_description }}</p>
                        <p>{{ $request->request_status }}</p>
                        <p>PPN : Rp {{ $request->request_price_ppn }}</p>
                        <p>Pabean : Rp {{ $request->request_price_pabean }}</p>
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

            <p>Total Item Price in this Trip: Rp {{ $contain_item_price }}</p>
            <p>Total Request Price in this Trip: Rp {{ $contain_request_price }}</p>

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
                    <p>{{ $sumItemPrice + $sumRequestPrice }}</p>
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
                <button type="button" @if ($check_status) disabled @endif class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Checkout
                </button>
            </div>



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
                                    </table>
                                    @endforeach
                                    <p id="total_all">Total Pay: {{ $sumItemPrice + $sumRequestPrice }}</p>
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
</section>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    var reg_price = 20000;
    var instant_price = 30000;
    $('.regular').click(function() {

        var id = $(this).attr("id")
        var number_id = parseInt(id.replace("regular", ""));

        
        var sumItemPriceTrip = parseInt($('#sumItemPriceTrip'+ number_id).val());
        var sumRequestPriceTrip = parseInt($('#sumRequestPriceTrip'+ number_id).val());
        

        $('#shipping_fee'+ number_id).text('Rp ' + reg_price);

        var price = sumItemPriceTrip + sumRequestPriceTrip;
        // console.log(price)
        var total_pay = price + reg_price;

        
        $('#total_pay'+ number_id).text('Rp ' + total_pay);
        $('#price_per_trip'+ number_id).val(total_pay);
        $('#total_payment').val(total_pay);
        $('#shipping_type' + number_id).val(1);
        $('#pay').prop('disabled', false)

        updateTotal()

    });

    $('.instant').click(function() {

        var id = $(this).attr("id")
        var number_id = id.replace("instant", "");

        var sumItemPriceTrip = parseInt($('#sumItemPriceTrip'+ number_id).val());
        var sumRequestPriceTrip = parseInt($('#sumRequestPriceTrip'+ number_id).val());

        $('#shipping_fee' + number_id).text('Rp ' + instant_price);

        var price = sumItemPriceTrip + sumRequestPriceTrip;
        // console.log(price)
        var total_pay = price + instant_price;

        $('#total_pay'+ number_id).text('Rp ' + total_pay);
        $('#price_per_trip'+ number_id).val(total_pay);

        $('#total_payment').val(total_pay);
        $('#shipping_type' + number_id).val(2);
        $('#pay').prop('disabled', false)

        updateTotal()

    });

    function updateTotal(){
        var total_all = "{{ $sumItemPrice + $sumRequestPrice }}"
        total_all = parseInt(total_all)

        const total_shipping = document.getElementsByClassName("shipping_fee");


        for(let i = 0; i<total_shipping.length; i++){

            if(total_shipping[i].innerHTML != ""){

                total_all += parseInt(total_shipping[i].innerHTML.replace("Rp ", ""));
            }

        }


        $('#total_all').text('Rp ' + total_all)
        $('.total_all').val(total_all)
        // $('.table-borderless > tbody > tr > td > p')
        // {
        //     console.log($('#shipping_id').attr('value')); 
        // }


    }
</script>

@endsection