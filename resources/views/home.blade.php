<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmacy Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .container {
            margin-top: 80px;
        }
        .title {
            text-align: center;
            margin-bottom: 50px;
            font-weight: bold;
            font-size: 32px;
        }
        .block {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            padding: 40px 0;
            text-align: center;
            transition: 0.3s;
            font-size: 20px;
        }
        .block:hover {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .row > div {
            margin-bottom: 30px;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">Pharmacy Management System</div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <a href="{{ route('medicines.index') }}">
                    <div class="block">Medicines</div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('suppliers.index') }}">
                    <div class="block">Suppliers</div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('sales.index') }}">
                    <div class="block">Sales</div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('sales.report') }}">
                    <div class="block">Sales Report</div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
