@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Claim</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('claims.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="hmo_name">HMO Name</label>
                                <select name="hmo_name" id="hmo_name" class="form-control">
                                    @foreach ($hmos as $hmo)
                                        <option value="{{ $hmo->name }}">{{ $hmo->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="hmo_type">HMO Type</label>
                                <select name="hmo_type" id="hmo_type" class="form-control">
                                    <option value="Public">Public</option>
                                    <option value="Private">Private</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="billed_period">Billed Period</label>
                                <select name="billed_period" id="billed_period" class="form-control">
                                    <option value="">Select a month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="billed_amount">Billed Amount</label>
                                <input type="number" name="billed_amount" id="billed_amount" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="payment_date">Payment Date</label>
                                <input type="date" name="payment_date" id="payment_date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="paid_amount">Paid Amount</label>
                                <input type="number" name="paid_amount" id="paid_amount" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="attachment">Attachment</label>
                                <input type="file" name="attachment" id="attachment" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="remark">Remark</label>
                                <textarea name="remark" id="remark" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('claims.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
