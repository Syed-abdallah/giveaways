<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap & DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    <style>
        /* Ensure table is responsive */
        .table-responsive {
            overflow-x: auto;
        }

        /* Fix table width issue */
        table.dataTable {
            width: 100% !important;
        }
    </style>
</head>

<body>
    <!-- Toast Message -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert"
            aria-live="polite" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">Updated Successfully!</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">Happy Orders</a>
            <a class="navbar-brand" href="/unhappy">Un-Happy Orders</a>
            <a class="navbar-brand" href="/settings">Admin Settings</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ optional(Auth()->user())->name ?: "settings" }}
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
            <h2 class="text-center mb-4">Restricted Countries</h2>

            <div class="table-responsive">
                <table id="countrysTable" class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Country</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($countries as $key => $country)
                            <tr id="row-{{ $country->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $country->name }}</td>
                                <td>{{ $country->code }}</td>
                                <td id="status-{{ $country->id }}">
                                    <span class="badge {{ $country->status == 1 ? 'bg-warning' : 'bg-danger' }}">
                                        {{ $country->status == 1 ? 'Active' : 'In Active' }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm toggle-status btn-{{ $country->status == 1 ? 'danger' : 'success' }}"
                                        data-id="{{ $country->id }}">
                                        {{ $country->status == 1 ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- jQuery & Bootstrap Bundle -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables Scripts -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

  



    <script>
      
      $(document).ready(function() {
    // Initialize DataTable
    var table = $('#countrysTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "responsive": true,
        "autoWidth": false,
        "lengthChange": true,
        "pageLength": 10
    });

    // Use event delegation for dynamically loaded elements
    $(document).on("click", ".toggle-status", function() {
        var countryId = $(this).data("id");
        var button = $(this);

        $.ajax({
            url: "{{ route('toggle-country-status') }}",
            type: "POST",
            data: {
                id: countryId,
                _token: $('meta[name="csrf-token"]').attr("content")
            },
            success: function(response) {
                if (response.success) {
                    // Update the status badge
                    var statusElement = $("#status-" + countryId + " span");

                    if (response.new_status === 1) {
                        statusElement.removeClass("bg-danger").addClass("bg-warning").text("Active");
                        button.removeClass("btn-success").addClass("btn-danger").text("Deactivate");
                    } else {
                        statusElement.removeClass("bg-warning").addClass("bg-danger").text("In Active");
                        button.removeClass("btn-danger").addClass("btn-success").text("Activate");
                    }

                    // Show success toast
                    var toastElement = new bootstrap.Toast(document.getElementById("successToast"));
                    $(".toast-body").text(response.message);
                    toastElement.show();
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
