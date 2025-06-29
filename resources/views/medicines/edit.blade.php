<!DOCTYPE html>
<html>
<head>
    <title>Edit Medicine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>Edit Medicine</h2>

    <a href="{{ route('medicines.index') }}" class="btn btn-secondary mb-3">← Back to List</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medicines.update', $medicine->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $medicine->name }}" required>
        </div>

        <div class="mb-3">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ $medicine->brand }}" required>
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $medicine->quantity }}" required>
        </div>

        <div class="mb-3">
            <label>Price per Unit ($)</label>
            <input type="number" name="price_per_unit" step="0.01" class="form-control" value="{{ $medicine->price_per_unit }}" required>
        </div>

        <div class="mb-3">
            <label>Expiry Date</label>
            <input type="date" name="expiry_date" class="form-control" value="{{ $medicine->expiry_date }}" required>
        </div>

        <div class="mb-3">
            <label>Supplier</label>
            <select name="supplier_id" class="form-control" required>
                <option value="">Select Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $medicine->supplier_id == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Medicine</button>
    </form>

</body>
</html>
