@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Supplier</h2>

    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $supplier->name }}" required>
        </div>

        <div class="mb-3">
            <label>Contact Info:</label>
            <input type="text" name="contact_info" class="form-control" value="{{ $supplier->contact_info }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Supplier</button>
    </form>
</div>
@endsection
