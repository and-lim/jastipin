@extends('layout')

@section('mainSection')
<section class="py-5">

 

    <div class="container my-5">
        
        <div class="title">
            <h1 class="fw-bold">Trip Checkout</h1>
        </div>
        <div class="row">
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
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Amounts</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>item 1</td>
                                    <td>2</td>
                                    <td>Rp.12345</td>
                                    <td>Rp.12468</td>
                                </tr>
                                <tr>
                                    <td>item 2</td>
                                    <td>2</td>
                                    <td>Rp.12345</td>
                                    <td>Rp.12468</td>
                                </tr>
                            </tbody>
                            <tfoot style="border-top: 2px solid black; ">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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