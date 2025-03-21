{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders List</title>
    
    <!-- Bootstrap & DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    
    <style>
        /* Full-Screen Zoom Effect */
        .zoom-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
            z-index: 9999;
            padding: 20px;
        }

        .zoom-container img {
            max-width: 90vw; /* 90% of viewport width */
            max-height: 80vh; /* 90% of viewport height */
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
        }

        .zoom-container.active {
            visibility: visible;
            opacity: 1;
        }

        /* Make table responsive */
        .table-responsive {
            overflow-x: auto;
        }

        /* Adjust image size on small screens */
        .order-img {
            width: 80px;
            height: 60px;
            cursor: pointer;
            border-radius: 5px;
            transition: transform 0.2s;
        }

        @media (max-width: 768px) {
            .order-img {
                width: 60px;
                height: 50px;
            }

            .zoom-container img {
                max-width: 95vw; /* Slightly larger for smaller screens */
                max-height: 85vh;
            }
        }
    </style>
</head>
<body>

    <!-- Zoomed Image Container (Initially Hidden) -->
    <div id="zoom-container" class="zoom-container" onclick="closeZoom()">
        <img id="zoomed-image" src="" alt="Zoomed Image">
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">Happy Orders</a>
            <a class="navbar-brand" href="/unhappy">UnHappy Orders</a>
            <a class="navbar-brand" href="/admin_email">Admin Email</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <div class="container py-5">
        <div class="card p-4 shadow-lg">
            <h2 class="text-center mb-4">Happy Orders</h2>
            
            <div class="table-responsive">
                <table id="ordersTable" class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Order ID</th>
                            <th>Email</th>
                            <th>Amazon Name</th>
                            <th>Option</th>
                            <th>Shipping Address</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($happy as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->options }}</td>
                                <td>{{ $order->shipping_address }}</td>
                                <td>
                                    @if ($order->image_path)
                                        <img src="{{ asset('/image/happyorder/' . $order->image_path) }}" 
                                             class="order-img"
                                             onclick="zoomImage(this)">
                                    @else
                                        No Image
                                    @endif
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

    <script>
        $(document).ready(function() {
            $('#ordersTable').DataTable();
        });

        function zoomImage(img) {
            const zoomContainer = document.getElementById('zoom-container');
            const zoomedImage = document.getElementById('zoomed-image');

            zoomedImage.src = img.src; // Set the clicked image as the zoomed image
            zoomContainer.classList.add('active');
        }

        function closeZoom() {
            document.getElementById('zoom-container').classList.remove('active');
        }
    </script>

</body>
</html> --}}




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders List</title>
    
    <!-- Bootstrap & DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    <style>
        /* Full-Screen Zoom Effect */
        .zoom-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
            z-index: 9999;
            padding: 20px;
        }

        .zoom-container img {
            max-width: 90vw;
            max-height: 80vh;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
        }

        .zoom-container.active {
            visibility: visible;
            opacity: 1;
        }

        /* Make table responsive */
        .table-responsive {
            overflow-x: auto;
        }

        /* Adjust image size on small screens */
        .order-img {
            width: 80px;
            height: 60px;
            cursor: pointer;
            border-radius: 5px;
            transition: transform 0.2s;
        }

        @media (max-width: 768px) {
            .order-img {
                width: 60px;
                height: 50px;
            }

            .zoom-container img {
                max-width: 95vw;
                max-height: 85vh;
            }
        }
    </style>
</head>
<body>

    <!-- Zoomed Image Container -->
    <div id="zoom-container" class="zoom-container" onclick="closeZoom()">
        <img id="zoomed-image" src="" alt="Zoomed Image">
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
            <h2 class="text-center mb-4">Happy Orders</h2>

            <!-- Date Range Filter & Export Button -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="startDate">From Date:</label>
                    <input type="date" id="startDate" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="endDate">To Date:</label>
                    <input type="date" id="endDate" class="form-control">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button id="filterBtn" class="btn btn-primary me-2">Filter</button>
                    <button id="resetBtn" class="btn btn-secondary">Reset</button>
                </div>
            </div>

            <div class="table-responsive">
                <table id="ordersTable" class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Order ID</th>
                            <th>Email</th>
                            <th>Amazon Name</th>
                            <th>Option</th>
                            <th>Shipping Address</th>
                            <th>Image</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($happy as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->options }}</td>
                                <td>{{ $order->shipping_address }}</td>
                                <td>
                                    @if ($order->image_path)
                                        <img src="{{ asset('/image/happyorder/' . $order->image_path) }}" 
                                             class="order-img"
                                             onclick="zoomImage(this)">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}</td>
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
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jszip/dist/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#ordersTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Export to Excel',
                className: 'btn btn-success',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 7], // Excludes column index 6 (Image)
                    format: {
                        body: function(data, row, column, node) {
                            return column === 7 ? data.trim() : data; // Ensure correct date format
                        }
                    }
                }
            }
        ]
    });

          // Filter function
    $('#filterBtn').on('click', function() {
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();

        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            var orderDate = data[7]; // Column index for Date
            var orderDateObj = new Date(orderDate);
            var start = startDate ? new Date(startDate) : null;
            var end = endDate ? new Date(endDate) : null;

            return (!start || orderDateObj >= start) && (!end || orderDateObj <= end);
        });

        table.draw();
        $.fn.dataTable.ext.search.pop();
    });

    // Reset filter
    $('#resetBtn').on('click', function() {
        $('#startDate').val('');
        $('#endDate').val('');
        table.search('').columns().search('').draw();
    });
        });

        function zoomImage(img) {
            $('#zoomed-image').attr('src', img.src);
            $('#zoom-container').addClass('active');
        }

        function closeZoom() {
            $('#zoom-container').removeClass('active');
        }
    </script>

</body>
</html>
