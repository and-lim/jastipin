@extends('layout')

@section('mainSection')
<section class="py-5">

    <div class="hero-header py-5" style="height: 70vh">
        <div class="container mt-4">
            <div class="row col-lg-10 mx-auto">
                <div class="search-title my-3 text-center">
                    <h1 class="fw-bold text-white">Search your Trip</h1>
                </div>
                <div class="form-group mx-auto col-lg-8">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-5">
                            <input type="text" class="form-control" placeholder="Departure" aria-label="First name">
                        </div>
                        <div class="col-lg-1">
                            <div class="bg-white" style="height: 5px;"></div>
                        </div>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" placeholder="Destination" aria-label="Last name">
                        </div>
                    </div>
                    <div class="row mt-5 justify-content-center">
                        <div class="calendar-form col-lg-6 ">
                            <input type="date" class="form-control form-input">
                        </div>
                    </div>
                    <div class="search-button d-flex justify-content-center mt-3">
                        <a href="" class="btn btn-warning text-center mx-auto">Search</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="line p-2"></div>

    <div class="container-fluid py-3 mx-1 mt-5">
        <h2 class="text-center fw-bold mb-5 ms-lg-3" id="slebew">Ongoing Trip</h2>
        <div class="row m-0">
            <div class="col-lg-3">
                <aside class="left-sidebar rounded-3 p-3 shadow">
                    <div class="sidebar-title">
                        <h5 class="fw-bold">Category</h5>
                    </div>
                    <div class="category-list mt-3">
                        <input type="checkbox" id="food" name="category" value="food" class="category_check_box">
                        <label for="food"> Food & Beverages</label><br></li>
                        <input type="checkbox" id="fashion" name="category" value="fashion" class="category_check_box">
                        <label for="fashion"> Fashion</label><br></li>
                        <input type="checkbox" id="electronic" name="category" value="electronic" class="category_check_box">
                        <label for="electronic"> Electronic Gadget</label><br></li>
                        <input type="checkbox" id="accessories" name="category" value="accessories" class="category_check_box">
                        <label for="accessories"> Accessories</label><br></li>
                    </div>
                </aside>
            </div>

            <div class="col-lg-9">
                <div id="price">50000</div>
                <div id="adjusted_price"></div>
                <input type="hidden" id="adjusted_price_field" name="adjusted_price" value="">
                <div id="cart_box">
                    
                </div>
                @foreach ($trip_list as $trip)
                        <div class="trip-list mb-3">
                            <div class="card rounded-4  shadow-sm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3 text-center">
                                            <img src="{{ asset('/storage/' .$trip->avatar) }}" class="img-fluid" style="width: 200px" alt="">
                                            <h5 class="text-center mt-3">{{ $trip->fullname }}</h5>
                                            <a href="/traveler" class="btn btn-success mt-3"> See Profile</a>
                                        </div>
                                        <div class="col-lg-9">
                                            <h3 class="text-primary fw-bold">{{ $trip->destination }} - {{ $trip->origin }}</h3>
                                            <p>{{ $trip->description }}</p>
                                            <div class="row gap-1">
                                                @foreach ($items as $item)

                                                @if ($item->trip_id == $trip->id)
                                                <div class="col-lg-2 trip-item">
                                                    <img src="{{ asset('/storage/' .$item->item_image) }}" style="width: 70px" class="img-fluid item-img" alt="">
                                                    <div class="img-detail d-flex flex-column mt-1">
                                                        <label for="" class="form-label mb-0">{{ $item->item_name }}</label>
                                                        <label for="" class="form-label mb-0">{{ $item->item_price }}</label>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                            <a href="/trip-detail/{{ $trip->id }}" class="btn btn-outline-primary float-end"> See Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>        
                        @endforeach
            </div>

</section>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    var richard = 0;
    $('.category_check_box').click(function(){
        if($(this).prop('checked') == true){
            // console.log(Math.floor(Math.random() * 1000));

            var category = $(this).val();

            if(category == "food"){
                var price_adjusment = 5000;
            }else if(category == "fashion"){
                var price_adjusment = 10000;
            }else{
                var price_adjusment = 20000;
            }

            var origin_price = parseInt($('#price').text());

            var adjusted_price = origin_price + price_adjusment;

            $('#adjusted_price').text(adjusted_price);
            $('#adjusted_price_field').val(adjusted_price); 
        }else{
            $('#adjusted_price').text("");
            $('#adjusted_price_field').val(""); 
        }
        
    });

    $('#slebew').click(function(){
        $('#cart_box').append('<div class="row"><div class="col-md-3">Icon</div><div class="col-md-9">'+Math.floor(Math.random() * 1000)+' | <a href="javascript:;" class="btn-hapus">Hapus</a></div></div>')
    })

    $(document).on('click', '.btn-hapus', function(){
        $(this).parent().parent().remove();
    })
</script>
@endsection