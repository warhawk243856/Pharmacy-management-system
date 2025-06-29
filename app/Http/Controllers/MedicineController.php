<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of all medicines.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $medicines = Medicine::with('supplier')->get();
        return view('medicines.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new medicine.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('medicines.create', compact('suppliers'));
    }

    /**
     * Store a newly created medicine in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price_per_unit' => 'required|numeric',
            'expiry_date' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        // Set stock equal to quantity
        $validated['stock'] = $validated['quantity'];

        Medicine::create($validated);

        return redirect()->route('medicines.index')->with('success', 'Medicine added successfully.');
    }

    /**
     * Show the form for editing an existing medicine.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\View\View
     */
    public function edit(Medicine $medicine)
    {
        $suppliers = Supplier::all();
        return view('medicines.edit', compact('medicine', 'suppliers'));
    }

    /**
     * Update the specified medicine in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Medicine $medicine)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price_per_unit' => 'required|numeric',
            'expiry_date' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        // Update stock to match quantity
        $validated['stock'] = $validated['quantity'];

        $medicine->update($validated);

        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully.');
    }

    /**
     * Remove the specified medicine from the database.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()->route('medicines.index')->with('success', 'Medicine deleted successfully.');
    }
}