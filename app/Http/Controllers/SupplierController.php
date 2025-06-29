<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Medicine;
use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'nullable|string|max:255',
        ]);

        Supplier::create([
            'name' => $request->name,
            'contact_info' => $request->contact_info,
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Supplier added successfully!');
    }
    public function report()
{
    $sales = Sale::with(['medicine', 'customer'])->latest()->get();
    return view('sales.report', compact('sales'));
}
}
