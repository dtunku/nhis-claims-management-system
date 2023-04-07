@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Edit Claim</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('claims.update', $claim) }}">

                            @csrf

                            @method('PUT')

                            <div class="form-group">

                                <label for="hmo_name">HMO Name</label>

                                <input id="hmo_name" type="text" class="form-control" name="hmo_name" value="{{ $claim->hmo_name}}" readonly>

                            </div>

                            <div class="form-group">

                                <label for="hmo_type">HMO Type</label>

                                <input id="hmo_type" type="text" class="form-control" name="hmo_type" value="{{ $claim->hmo_type }}" readonly>

                            </div>

                            <div class="form-group">

                                <label for="billed_period">Billed Period</label>

                                <input id="billed_period" type="text" class="form-control" name="billed_period" value="{{ $claim->billed_period }}">

                            </div>

                            <div class="form-group">

                                <label for="billed_amount">Billed Amount</label>

                                <input id="billed_amount" type="number" class="form-control" name="billed_amount" value="{{ $claim->billed_amount }}">

                            </div>

                            <div class="form-group">

                                <label for="payment_date">Payment Date</label>

                                <input id="payment_date" type="date" class="form-control" name="payment_date" value="{{ $claim->payment_date }}">

                            </div>

                            <div class="form-group">

                                <label for="paid_amount">Paid Amount</label>

                                <input id="paid_amount" type="number" class="form-control" name="paid_amount" value="{{ $claim->paid_amount }}">

                            </div>

                            <div class="form-group">

                                <label for="attachment">Attachment</label>

                                <input id="attachment" type="file" class="form-control-file" name="attachment">

                            </div>

                            <div class="form-group">

                                <label for="remark">Remark</label>

                                <textarea id="remark" class="form-control" name="remark">{{ $claim->remark }}</textarea>

                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
