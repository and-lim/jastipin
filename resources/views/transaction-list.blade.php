@extends('layout')

<section class="py-5">
    <div class="container py-5 pb-5" style="height: 100%;">
        <h1 class="fw-bold mb-5">Transaction List</h1>
        <div class="row">
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
                                <th>Transaction Status</th>
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
                                    {{ $transaction->transaction_status }}
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