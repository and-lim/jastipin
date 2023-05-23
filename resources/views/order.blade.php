@extends('layout')

@section('mainSection')
<section>
    <div class="hero-header py-5" style="height: 45vh">
        <div class="container mt-4">
            <div class="row col-lg-10 mx-auto">
                <div class="search-title my-3 text-center">
                    <h1 class="fw-bold text-white">Your Order</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="line p-2"></div>

    <div class="container my-5">

        <div class="title">
            <h1 class="fw-bold">Request List</h1>
        </div>

        @foreach ($request_list as $request)
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                        <img src="img/laptop.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-9">
                        <h1 class="mb-2">From: {{ $request->fullname }}</h1>
                        <p>Item Name: {{ $request->request_name }}</p>
                        <p>Quantity: {{ $request->request_quantity }}</p>
                        <p>Price: {{ $request->request_price }}</p>
                        <p>Weight: {{ $request->request_weight }}</p>

                        <div class="float-end d-flex gap-2">
                            <form action="/acceptRequest" method="POST">
                                @csrf
                                <input type="hidden" name="request_id" value="{{ $request->id }}">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                </button>
                            </form>
                            <form action="/rejectRequest" method="POST">
                                @csrf
                                <input type="hidden" name="request_id" value="{{ $request->id }}">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="title">
                <h1 class="fw-bold">Order List</h1>
            </div>
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="card p-3 mb-3 shadow">
                        <div class="form-group mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">From</label>
                            <div class="col-lg-10">
                                <input type="text" readonly class="form-control-plaintext " id="" value="User 3">
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-lg-10">
                                <input type="text" readonly class="form-control-plaintext " id="" value="address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-lg-10">
                                <input type="text" readonly class="form-control-plaintext " id="" value="1234678">
                            </div>
                        </div>
                    </div>

                    <div class="items">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10px"></th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Profit</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 10px;">
                                        <div class="button">
                                            <button type="button" class="btn btn-danger py-0 px-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i  class="fa fa-times"></i>
                                              </button>
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header border-none">
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3 class="fw-bold mb-3">Why Cancel?</h3>
                                                        <div class="form-group mb-3">
                                                            <label for="" class="form-label">reason</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Select reason</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                  Default radio
                                                                </label>
                                                              </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-primary">Submit</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                        </div>
                                    </td>
                                    <td scope="row" class="d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="">
                                                Item 1
                                            </label>
                                        </div>
                                
                                    </td>
                                    <td>2</td>
                                    <td>Rp.12345</td>
                                    <td>Rp.123</td>
                                    <td>Rp.12468</td>
                                </tr>
                                <tr>
                                    <td style="width: 10px;">
                                        <div class="button">
                                            <button type="button" class="btn btn-danger py-0 px-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i  class="fa fa-times"></i>
                                              </button>
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header border-none">
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3 class="fw-bold mb-3">Why Cancel?</h3>
                                                        <div class="form-group mb-3">
                                                            <label for="" class="form-label">reason</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Select reason</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                  Default radio
                                                                </label>
                                                              </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-primary">Submit</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                        </div>
                                    </td>
                                    <td scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="">
                                                Item 2
                                            </label>
                                        </div>
                                    </td>
                                    <td>2</td>
                                    <td>Rp.12345</td>
                                    <td>Rp.123</td>
                                    <td>Rp.12468</td>
                                </tr>
                            </tbody>
                            <tfoot style="border-top: 2px solid black; ">
                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td></td>
                                    <td></td>
                                    <td>23</td>
                                    <td>23</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="text-start">
                        <button class="btn btn-primary px-3">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="title">
                <h1 class="fw-bold">Shipment List</h1>
            </div>
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="form-group mb-3 row">
                        <label for="" class="col-sm-2 col-form-label">To</label>
                        <div class="col-lg-10">
                            <input type="text" readonly class="form-control-plaintext " id="" value="User 3">
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <label for="" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-lg-10">
                            <input type="text" readonly class="form-control-plaintext " id="" value="address">
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <label for="" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-lg-10">
                            <input type="text" readonly class="form-control-plaintext " id="" value="1234678">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Shipping Receipt</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>
@endsection