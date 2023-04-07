<!-- resources/views/claims/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Claims</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>HMO Name</th>
                                    <th>HMO Type</th>
                                    <th>Billed Period</th>
                                    <th>Billed Amount</th>
                                    <th>Payment Date</th>
                                    <th>Paid Amount</th>
                                    <th>Difference</th>
                                    <th>Attachment</th>
                                    <th>Remark</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($claims as $claim)
                                    <tr>
                                        {{-- <td>{{ $claim->hmo->name }}</td>
                                        <td>{{ $claim->hmo->type }}</td> --}}
                                        <td>{{ $claim->hmo_name }}</td>
                                        <td>{{ $claim->hmo_type }}</td>
                                        <td>{{ $claim->billed_period }}</td>
                                        <td>{{ $claim->billed_amount }}</td>
                                        <td>{{ $claim->payment_date }}</td>
                                        <td>{{ $claim->paid_amount }}</td>
                                        <td>{{ $claim->billed_amount - $claim->paid_amount }}</td>
                                        <td>{{ $claim->attachment }}</td>
                                        <td>{{ $claim->remark }}</td>
                                        <td>
                                            <a href="{{ route('claims.show', $claim) }}" class="btn btn-primary">View</a>
                                            <a href="{{ route('claims.edit', $claim) }}" class="btn btn-secondary">Edit</a>
                                            <form action="{{ route('claims.destroy', $claim) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                                


                            </tbody>
                        </table>

                        <a href="{{ route('claims.create') }}" class="btn btn-success">Create Claim</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
