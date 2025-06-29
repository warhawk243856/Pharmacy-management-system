@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Sales</h2>
        <a href="{{ route('sales.create') }}" class="btn btn-primary">Add Sale</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Medicine</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Sold At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->medicine->name }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->total_price }}</td>
                    <td>{{ $sale->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
