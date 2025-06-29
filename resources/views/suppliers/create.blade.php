@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Supplier</h1>

    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary mb-3">← Back to List</a>

    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Supplier Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter supplier name" required>
        </div>

        <div class="mb-3">
            <label for="contact_info" class="form-label">Contact Info</label>
            <input type="text" name="contact_info" id="contact_info" class="form-control" placeholder="Phone number or email" required>
        </div>

        <button type="submit" class="btn btn-success">Add Supplier</button>
    </form>
</div>
@endsection
