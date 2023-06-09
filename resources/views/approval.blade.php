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
              @foreach($approval_list as $approval)
              <tr>
                <td>{{ $approval->fullname }}</td>
                <td>Rp {{ $approval->amount }}</td>
                <td>{{ $approval->unique_code }}</td>
                <td>
                  @if($approval->transfer_receipt)
                  <a href="{{ asset('/storage/' .$approval->transfer_receipt) }}" data-fancybox="gallery" data-slug="dog">
                    <img src="{{ asset('/storage/' .$approval->transfer_receipt) }}" style="width: 250px" />
                  </a>
                  @endif
                </td>
                <td>{{ $approval->activity }}</td>
                <td class="d-flex gap-2">
                  @if($approval->approval_status != 'declined')
                  <form action="/approve" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $approval->user_id }}">
                    <input type="hidden" name="approval_id" value="{{ $approval->id }}">
                    <input type="hidden" name="amount" value="{{ $approval->amount }}">
                    <input type="hidden" name="activity" value="{{ $approval->activity }}">
                    <button type="submit" @if($approval->approval_status == 'approved') disabled @endif class="btn btn-success">
                      <i class="fa fa-check"></i>
                    </button>
                  </form>
                  @endif

                  @if($approval->approval_status != 'approved')
                  <button type="button" class="btn btn-danger" @if($approval->approval_status == 'cancelled') disabled @endif data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-times"></i>
                  </button>
                  @endif
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body">
                          <h3 class="fw-bold my-3">Decline Reason</h3>
                          <form action="/decline" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="" class="form-label">Select reason :</label>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="reason" id="wrongUniqueCode" value="Wrong Unique Code">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Wrong Unique Code
                                </label>
                              </div>

                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="reason" id="accountNumberNotMatch" value="Account Number didn't match">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Account Number didn't match
                                </label>
                              </div>

                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="reason" id="amountNotMatch" value="Amount didn't match">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Amount didn't match
                                </label>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <input type="hidden" name="user_id" value="{{ $approval->user_id }}">
                              <input type="hidden" name="approval_id" value="{{ $approval->id }}">
                              <input type="hidden" name="amount" value="{{ $approval->amount }}">
                              <input type="hidden" name="activity" value="{{ $approval->activity }}">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
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