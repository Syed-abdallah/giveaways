<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Orders List</h2>
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
                    @foreach ($happy as $key => $order)
                        <tr>
                            <td>{{ $key + 1 }}</td> <!-- Adding 1 to start from 1 instead of 0 -->
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->shipping_address }}</td>
                            <td>
                                @if ($order->image_path)
                                    <img src="{{ asset('storage/app/private/public/' . $order->image_path) }}"
                                        width="50">
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
        </div>
    </div>

    {{-- Include DataTables CSS and JS from CDN --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#ordersTable').DataTable();
        });
    </script>

</x-app-layout>
