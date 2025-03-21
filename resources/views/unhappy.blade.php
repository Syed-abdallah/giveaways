<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap & DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    <style>
        /* Make table responsive */
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert"
            aria-live="polite" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Updated Successfully!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <!-- Timer Line -->
            <div class="toast-timer bg-white" style="height: 3px; width: 100%;"></div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">Happy Orders</a>
            <a class="navbar-brand" href="/unhappy">UnHappy Orders</a>
            <a class="navbar-brand" href="/admin_email">Admin Email</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/profile">Profile</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid py-5">
        <div class="card p-4 shadow-lg">
            <h2 class="text-center mb-4">Unhappy Orders</h2>

            <!-- Date Range Filter -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="startDate" class="form-label">Start Date:</label>
                    <input type="date" id="startDate" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="endDate" class="form-label">End Date:</label>
                    <input type="date" id="endDate" class="form-control">
                </div>
                {{-- <div class="col-md-4 d-flex align-items-end">
                    <button id="filterBtn" class="btn btn-primary w-100">Filter</button>
                </div> --}}
                <div class="col-md-4 d-flex align-items-end">
                    <button id="filterBtn" class="btn btn-primary me-2">Filter</button>
                    <button id="resetBtn" class="btn btn-secondary">Reset</button>
                </div>
            </div>

            <!-- Export Button -->
            {{-- <div class="mb-3">
                <button id="exportExcel" class="btn btn-success">Download Excel</button>
            </div> --}}

            <div class="table-responsive">
                <table id="ordersTable" class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Order ID</th>
                            <th>Email</th>
                            <th>Amazon Name</th>
                            <th>Reason</th>
                            <th>Shipping Address</th>
                            <th>Option</th>
                            <th>Second Option</th>
                            <th>Date</th>
                            <th>following</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unhappy as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $order->amazon_id ?? 'No ID' }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{!! nl2br(e($order->reason)) !!}</td>

                                <td>{{ $order->shipping_address }}</td>

                                <td>{{ $order->option }}</td>
                                <td>{{ $order->option2 }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}</td>
                                {{-- <td>
                                    <select class="form-select update-following" data-order-id="{{ $order->id }}">
                                        <option value="" disabled>Select Option</option>
                                        <option value="Replacement sent"
                                            {{ $order->following == 'Replacement sent' ? 'selected' : '' }}>Replacement
                                            sent</option>
                                        <option value="Full refunded"
                                            {{ $order->following == 'Full refunded' ? 'selected' : '' }}>Full refunded
                                        </option>
                                        <option value="Other" {{ $order->following == 'Other' ? 'selected' : '' }}>
                                            Other</option>
                                        <option value="$10 Amazon Gift Card sent"
                                            {{ $order->following == '$10 Amazon Gift Card sent' ? 'selected' : '' }}>
                                            $10 Amazon Gift Card sent</option>
                                    </select>
                                </td> --}}
                                <td>
                                    <select class="form-select update-following" data-order-id="{{ $order->id }}">
                                        <option value="" disabled {{ is_null($order->following) ? 'selected' : '' }}>Select Option</option>
                                        <option value="Replacement sent" {{ $order->following == 'Replacement sent' ? 'selected' : '' }}>
                                            Replacement sent
                                        </option>
                                        <option value="Full refunded" {{ $order->following == 'Full refunded' ? 'selected' : '' }}>
                                            Full refunded
                                        </option>
                                        <option value="Other" {{ $order->following == 'Other' ? 'selected' : '' }}>
                                            Other
                                        </option>
                                        <option value="$10 Amazon Gift Card sent" {{ $order->following == '$10 Amazon Gift Card sent' ? 'selected' : '' }}>
                                            $10 Amazon Gift Card sent
                                        </option>
                                    </select>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#ordersTable').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    text: 'Export to Excel',
                    className: 'btn btn-success',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], // Include all columns
                        format: {
                            body: function(data, row, column, node) {
                                if (column === 8) { // Date column index
                                    return data.trim(); // Ensure date format remains unchanged
                                }
                                if (column === 9) { // Following column index
                                    return $(node).find("option:selected")
                                .text(); // Get the selected text from the dropdown
                                }
                                return data;
                            }
                        }
                    }

                }]

            });

            // Filter Table Based on Date Range
            $('#filterBtn').on('click', function() {
                var startDate = $('#startDate').val();
                var endDate = $('#endDate').val();

                $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                    var orderDate = data[8]; // Column index for Date
                    var orderDateObj = new Date(orderDate); // Convert to Date object
                    var start = startDate ? new Date(startDate) : null;
                    var end = endDate ? new Date(endDate) : null;

                    if ((!start || orderDateObj >= start) && (!end || orderDateObj <= end)) {
                        return true;
                    }
                    return false;
                });

                table.draw();
                $.fn.dataTable.ext.search.pop(); // Remove filter after applying
            });

            // Bind the export button to filtered data
            $("#exportExcel").on("click", function() {
                table.button('.buttons-excel').trigger();
            });



            // Reset filter
            $('#resetBtn').on('click', function() {
                $('#startDate').val('');
                $('#endDate').val('');
                table.search('').columns().search('').draw();
            });
        });











        $(document).ready(function() {
            $(".update-following").change(function() {
                var orderId = $(this).data("order-id");
                var selectedOption = $(this).val();

                $.ajax({
                    url: "{{ route('update-following') }}",
                    type: "POST",
                    data: {
                        order_id: orderId,
                        following: selectedOption,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            var toastElement = new bootstrap.Toast(document.getElementById(
                                "successToast"));
                            $(".toast-body").text(response.message);
                            toastElement.show();

                            $(".toast-timer").css({
                                width: "100%"
                            }).animate({
                                width: "0%"
                            }, 3000, function() {
                                toastElement.hide();
                            });
                        } else {
                            alert("Update failed. Try again.");
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert("Error updating. Please check the console.");
                    }
                });
            });
        });
    </script>

</body>

</html>
