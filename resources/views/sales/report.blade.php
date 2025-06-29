@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Sales Report</h1>

        <table class="table-auto w-full border-collapse">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Medicine</th>
                    <th class="border px-4 py-2">Customer</th>
                    <th class="border px-4 py-2">Quantity</th>
                    <th class="border px-4 py-2">Total Price</th>
                    <th class="border px-4 py-2">Sale Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sales as $sale)
                    <tr>
                        <td class="border px-4 py-2">{{ $sale->medicine->name ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $sale->customer->name ?? 'Walk-in' }}</td>
                        <td class="border px-4 py-2">{{ $sale->quantity }}</td>
                        <td class="border px-4 py-2">{{ number_format($sale->total_price, 2) }}</td>
                        <td class="border px-4 py-2">{{ $sale->sale_date ?? $sale->created_at->toDateString() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">No sales found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
