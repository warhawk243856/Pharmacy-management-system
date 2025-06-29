<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Medicine;
use App\Models\Customer;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with(['medicine', 'customer'])->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $medicines = Medicine::all();
        $customers = Customer::all();
        return view('sales.create', compact('medicines', 'customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'customer_id' => 'nullable|exists:customers,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $medicine = Medicine::findOrFail($validated['medicine_id']);
        $totalPrice = $medicine->price_per_unit * $validated['quantity'];

        Sale::create([
            'medicine_id' => $validated['medicine_id'],
            'customer_id' => $validated['customer_id'] ?? null,
            'quantity' => $validated['quantity'],
            'total_price' => $totalPrice,
            'sale_date' => now(), // set current date
        ]);

        return redirect()->route('sales.index')->with('success', 'Sale recorded successfully.');
    }

    public function report(Request $request)
    {
        $sales = Sale::with(['medicine', 'customer'])
            ->when($request->from_date && $request->to_date, function ($query) use ($request) {
                $query->whereBetween('sale_date', [$request->from_date, $request->to_date]);
            })
            ->get();

        return view('sales.report', compact('sales'));
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }
}
