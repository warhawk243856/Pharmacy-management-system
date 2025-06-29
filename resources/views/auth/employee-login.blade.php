<!DOCTYPE html>
<html>
<head>
    <title>Employee Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f5f7fa; }
        .login-card { max-width: 400px; margin: 100px auto; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="login-card">
        <h3 class="text-center mb-4">Login</h3>
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('employee.login') }}">
            @csrf
            <div class="mb-3">
                <label for="role" class="form-label">Login As</label>
                <select name="role" class="form-control" required>
                    <option value="employee">Employee</option>
                    <option value="owner">Owner</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>