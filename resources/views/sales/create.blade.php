@extends('layouts.app')

@section('content')
    <h1>Add Sale</h1>
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="medicine_id">Medicine:</label>
            <select name="medicine_id" class="form-control">
                @foreach($medicines as $medicine)
                    <option value="{{ $medicine->id }}">{{ $medicine->name }} - Rs {{ $medicine->price }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="customer_id">Customer (optional):</label>
            <select name="customer_id" class="form-control">
                <option value="">-- None --</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" class="form-control" required min="1">
        </div>
        <button type="submit" class="btn btn-success mt-2">Record Sale</button>
    </form>
@endsection
