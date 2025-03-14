<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body class="container py-5">
    <div class="card p-4 shadow-lg">
        <h2 class="text-center mb-4">Orders List</h2>
        <table id="ordersTable" class="table table-striped w-100">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Order ID</th>
                    <th>Email</th>
                    <th>Amazon Name</th>
                    <th>Shipping Address</th>
                    <th>Image</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($happy as $key => $order)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->shipping_address }}</td>
                        <td>
                            @if ($order->image_path)
                                <img src="{{ asset('storage/app/private/public/' . $order->image_path) }}" width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#ordersTable').DataTable();
        });
    </script>
</body>
</html>
