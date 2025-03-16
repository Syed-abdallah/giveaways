<!DOCTYPE html>
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
            max-width: 150vw; /* 90% of viewport width */
            max-height: 140vh; /* 90% of viewport height */
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
</html>
