@extends('layout')

@section('mainSection')

<section>
    <div class="container my-5 py-5">
        <div class="d-flex justify-content-start">
            <a href="/dashboard" class="btn btn-warning px-2">
                <h6 class="mt-2"><i class="fa fa-arrow-left me-2"></i>
                    Back to Trip
                </h6>
            </a>
        </div>
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-3">
                <div class="image-profile mb-3 d-flex flex-column justify-content-center align-items-center my-3">
                    <img src="{{ $user_detail->avatar }}" class="" alt="">
                </div>
                <div class="traveler-profile text-center">
                    <h2 class="fw-bold mb-3">{{ $user_detail->fullname }}</h2>
                    <div class="d-flex justify-content-between mx-auto col-lg-8">
                        <div class="star ">
                            @for($i = 0; $i<$rate; $i++) <small class="fa fa-star"></small>
                                @endfor
                        </div>
                        <div class="score">
                            <p class="d-inline-block">{{ $rate }}</p>
                            <p class="d-inline-block"> /5</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="swiper pb-5">
                <div class="swiper-wrapper pb-5">
                    @foreach($show_review as $review)
                    <div class="swiper-slide">
                        <div class="review-card p-3 border border-5 border-primary rounded-2">
                            <div class="d-flex align-items-center mb-3">
                                <img src="img/laptop.jpg" alt="" class="img-fluid flex-shrink-0 rounded-circle" style="width: 65px;">
                                <div class="ps-4">
                                    <h5 class="mb-1">{{ $review->fullname }}</h5>
                                    <!-- <span>profession</span> -->
                                    <div class="star text-primary">
                                        @for($i=0; $i<$review->rate; $i++)
                                            <i class="fa fa-star"></i>
                                            @endfor
                                            <!-- </i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> -->
                                    </div>
                                </div>
                            </div>
                            <div class="comment">
                                <p>{{ $review->review }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination "></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>

        <div class="row my-5">
            <div class="ongoing-trip mt-4">
                <h3 class="fw-bold">Ongoing Trip</h3>
                @foreach($ongoing_trip as $ongoing)
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 text-center">
                                <img src="{{ $ongoing->avatar }}" class="img-fluid" style="width: 200px" alt="">
                                <h3 class="text-center">{{ $ongoing->fullname }}</h3>
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-primary fw-bold">{{ $ongoing->destination }} - {{ $ongoing->origin }}</h3>
                                <p>{{ $ongoing->description }}</p>
                                <div class="row gap-1">
                                    @foreach($item_in_trip as $item)

                                    @if($item->trip_id == $ongoing->id)
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
                                <div class="float-end">
                                    <a href="/trip-detail/{{ $ongoing->id }}" class="btn btn-outline-primary">see details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="line"></div>

        <div class="ongoing-trip mt-4">
            <h3 class="fw-bold">Past Trip</h3>
            @foreach($finished_trip as $finished)
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 text-center">
                            <img src="{{ $finished->avatar }}" class="img-fluid" style="width: 200px" alt="">
                            <h3 class="text-center">{{ $finished->fullname }}</h3>
                        </div>
                        <div class="col-lg-9">
                            <h3 class="text-primary fw-bold">{{ $finished->destination }} - {{ $finished->origin }}</h3>
                            <p>{{ $finished->description }}</p>
                            <div class="row gap-1">
                                @foreach($item_in_trip as $item)
                                @if($item->trip_id == $finished->id)
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
                            <div class="float-end">
                                <a href="/trip-detail/{{ $finished->id }}" class="btn btn-outline-primary">see details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>

@endsection