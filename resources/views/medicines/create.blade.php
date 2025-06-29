<!DOCTYPE html>
<html>
<head>
    <title>Add Medicine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>Add New Medicine</h2>

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

    <form action="{{ route('medicines.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ old('brand') }}" required>
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
        </div>

        <div class="mb-3">
            <label>Price per Unit ($)</label>
            <input type="number" name="price_per_unit" step="0.01" class="form-control" value="{{ old('price_per_unit') }}" required>
        </div>

        <div class="mb-3">
            <label>Expiry Date</label>
            <input type="date" name="expiry_date" class="form-control" value="{{ old('expiry_date') }}" required>
        </div>

        <div class="mb-3">
            <label>Supplier</label>
            <select name="supplier_id" class="form-control" required>
                <option value="">Select Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add Medicine</button>
    </form>

</body>
</html>
