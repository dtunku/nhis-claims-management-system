@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit HMO</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('hmos.update', $hmo) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $hmo->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">Select Type</option>
                                    <option value="Public" {{ $hmo->type == 'Public' ? 'selected' : '' }}>Public</option>
                                    <option value="Private" {{ $hmo->type == 'Private' ? 'selected' : '' }}>Private</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">Select Status</option>
                                    <option value="Active" {{ $hmo->status == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ $hmo->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
