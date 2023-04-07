@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Claim Details</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="hmo_name" class="col-md-4 col-form-label text-md-right">HMO Name</label>

                            <div class="col-md-6">
                                <input id="hmo_name" type="text" class="form-control" name="hmo_name" value="{{ $claim->hmo_name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hmo_type" class="col-md-4 col-form-label text-md-right">HMO Type</label>

                            <div class="col-md-6">
                                <input id="hmo_type" type="text" class="form-control" name="hmo_type" value="{{ $claim->hmo_type }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="billed_period" class="col-md-4 col-form-label text-md-right">Billed Period</label>

                            <div class="col-md-6">
                                <input id="billed_period" type="text" class="form-control" name="billed_period" value="{{ $claim->billed_period }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="billed_amount" class="col-md-4 col-form-label text-md-right">Billed Amount</label>

                            <div class="col-md-6">
                                <input id="billed_amount" type="text" class="form-control" name="billed_amount" value="{{ $claim->billed_amount }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_date" class="col-md-4 col-form-label text-md-right">Payment Date</label>

                            <div class="col-md-6">
                                <input id="payment_date" type="text" class="form-control" name="payment_date" value="{{ $claim->payment_date }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="paid_amount" class="col-md-4 col-form-label text-md-right">Paid Amount</label>

                            <div class="col-md-6">
                                <input id="paid_amount" type="text" class="form-control" name="paid_amount" value="{{ $claim->paid_amount }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="difference" class="col-md-4 col-form-label text-md-right">Difference</label>

                            <div class="col-md-6">
                                <input id="difference" type="text" class="form-control" name="difference" value="{{ $claim->billed_amount - $claim->paid_amount }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="attachment" class="col-md-4 col-form-label text-md-right">Attachment</label>

                            <div class="col-md-6">
                                {{-- <a href="{{ asset('storage/attachments/'.$claim->attachment) }}" target="_blank">View Attachment</a>  --}}
                                <a href="{{ asset('storage/attachments/'.$claim->attachment) }}" download="{{ $claim->attachment }}">Download Attachment</a>

                        
                            </div

                     
                        
                        
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('claims.edit', $claim->id) }}" class="btn btn-primary">Edit</a>
                        
                                <form action="{{ route('claims.destroy', $claim->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection