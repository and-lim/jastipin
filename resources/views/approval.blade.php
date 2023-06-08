@extends('layout')

<section class="py-5">
    <div class="container py-5 pb-5" style="height: 100%;">
        <h1 class="fw-bold mb-5">Approval</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3 table-responsive">
                    <table class="table table-borderless">
                        <thead class="border-3 border-bottom border-dark">
                          <tr>
                            <th scope="col">User</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Unique Code</th>
                            <th scope="col">Transfer Receipt</th>
                            <th scope="col">Activity</th>
                            <th scope="col">Approval</th>
                          </tr>
                        </thead>
                        <tbody class="table-group-divider">
                          <tr>
                            <td>Nama User</td>
                            <td>Rp 100000</td>
                            <td>789</td>
                            <td>Gambar Bukti Transfer</td>
                            <td>Top Up</td>
                            <td class="d-flex gap-2"> 
                                <button class="btn btn-success">
                                    <i class="fa fa-check"></i></button>
                                
                                <button class="btn btn-danger">
                                    <i class="fa fa-times"></i></button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                
            </div>
        </div>
    </div>

</section>