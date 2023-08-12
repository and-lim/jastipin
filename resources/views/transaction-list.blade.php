@extends('layout')

<section class="py-5">
    <div class="container-fluid mx-4 px-3 py-5 pb-5">
        <h1 class="fw-bold mb-5">Transaction List</h1>
        @if ($errors->any())
        <div class="alert alert-dark" role="alert" style="outline: none">
            <i class="text-danger mt-1">{{$errors->first()}}</i>
        </div>
        @endif
        <div class="row">
            <div class="form-group mb-3">

                    <form action="" method="GET">
                        <div class="row align-items-center">
                            <div class="col-lg-2 p-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input id="start_date_recap" name="start_date_recap" required class="form-control" type="date" />
                            </div>
                            <div class="col-lg-2 p-3">
                                <label for="arrival_date" class="form-label">End Date</label>
                                <input id="end_date_recap" name="end_date_recap" required class="form-control" type="date" />
                            </div>
                            <div class="col-lg-2 p-3 mt-lg-4 pt-lg-4">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="col-lg-12">
                <div class="card p-3 table-responsive">
                    <table class="table table-borderless">
                        <thead class="border-3 border-bottom border-dark">
                            <tr>
                                <th>Trip Name</th>
                                <th>Traveler</th>
                                <th>Buyer</th>
                                <th>Balance</th>
                                <th>Balance to Buyer</th>
                                <th>Item</th>
                                <th>Item Status</th>
                                <th>Shipping Type</th>
                                <th>Transaction Status</th>
                                <th>Item Receive Confirmation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaction_header as $transaction)
                            <tr>
                                <td>
                                    <a href="/transaction">{{ $transaction->destination }} - {{ $transaction->origin }}</a>
                                </td>
                                <td>{{ $transaction->traveler_fullname }}</td>
                                <td>{{ $transaction->buyer_fullname }}</td>
                                <td>{{ $transaction->hold_balance }}</td>
                                <td>{{ $transaction->balance_to_buyer }}</td>
                                <td>
                                    <ul class="list-item-admin">
                                        @foreach($item_list[$transaction->id] as $item)
                                        <li>
                                            {{ $item->item_name }}
                                        </li>
                                        @endforeach
                                        @foreach($request_list[$transaction->id] as $request)
                                        <li>
                                            {{ $request->request_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-item-admin">
                                        @foreach($item_list[$transaction->id] as $item)
                                        <li>
                                            {{ $item->item_status }}
                                        </li>
                                        @endforeach
                                        @foreach($request_list[$transaction->id] as $request)
                                        <li>
                                            {{ $request->item_status }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    {{ $transaction->shipping_name }}
                                </td>
                                <td>
                                    {{ $transaction->transaction_status }}
                                </td>

                                <td class="d-flex gap-2">
                                    @if($transaction->transaction_status == 'hold')
                                    <form action="/item_received" method="POST">
                                        @csrf
                                        <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                        <input type="hidden" name="transaction_list_id" value="{{ $transaction->transaction_list_id }}">
                                        <input type="hidden" name="buyer_id" value="{{ $transaction->buyer_id }}">
                                        <input type="hidden" name="traveler_id" value="{{ $transaction->traveler_id }}">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </form>

                                    <form action="/item_not_received" method="POST">
                                        @csrf
                                        <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                        <input type="hidden" name="transaction_list_id" value="{{ $transaction->transaction_list_id }}">
                                        <input type="hidden" name="buyer_id" value="{{ $transaction->buyer_id }}">
                                        <input type="hidden" name="traveler_id" value="{{ $transaction->traveler_id }}">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</section>