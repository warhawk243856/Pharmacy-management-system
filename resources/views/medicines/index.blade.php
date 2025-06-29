<!DOCTYPE html>
<html>
<head>
    <title>Medicine List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>Medicines</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('medicines.create') }}" class="btn btn-primary mb-3">Add New Medicine</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Brand</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Expiry Date</th>
                <th>Supplier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($medicines as $medicine)
                <tr>
                    <td>{{ $medicine->name }}</td>
                    <td>{{ $medicine->brand }}</td>
                    <td>{{ $medicine->quantity }}</td>
                    <td>${{ $medicine->price_per_unit }}</td>
                    <td>{{ $medicine->expiry_date }}</td>
                    <td>{{ $medicine->supplier->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('medicines.edit', $medicine->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No medicines available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
