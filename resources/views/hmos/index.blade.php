<!-- resources/views/hmos/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">HMOs</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hmos as $hmo)
                                    <tr>
                                        <td>{{ $hmo->name }}</td>
                                        <td>{{ $hmo->type }}</td>
                                        <td>{{ $hmo->status }}</td>
                                        <td>
                                            <a href="{{ route('hmos.show', $hmo) }}" class="btn btn-primary">View</a>
                                            <a href="{{ route('hmos.edit', $hmo) }}" class="btn btn-secondary">Edit</a>
                                            <form action="{{ route('hmos.destroy', $hmo) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('hmos.create') }}" class="btn btn-success">Create HMO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection