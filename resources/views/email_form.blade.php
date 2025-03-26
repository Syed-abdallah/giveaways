<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Update</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">Happy Orders</a>
            <a class="navbar-brand" href="/unhappy">Un-Happy Orders</a>
            <a class="navbar-brand" href="/settings">Admin Settings</a>
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

    <!-- Email Update Section -->
    <div class="container py-5">
        <div class="card p-4 shadow-lg">
            <h2 class="text-center mb-4">Admin Email</h2>
            <p class="text-muted " style="font-size: 16px; line-height: 1.6;">
                This is the official email where the admin will receive important notifications, 
                like customer feedback. Please ensure that the provided email address is correct 
                to stay informed and respond promptly.
            </p>
            
            @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif

            <form action="{{ route('email.storeOrUpdate') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" value="{{ $email->email ?? '' }}" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Save Email</button>
            </form>
        </div>
    </div>
    <div class="container py-5">
        <div class="card p-4 shadow-lg">
            <h2 class="text-center mb-4">Review Section</h2>
            <p class="text-muted " style="font-size: 16px; line-height: 1.6;">
                This section allows you to update the review link where customers can leave their feedback. 
                Please ensure the link is accurate to direct users to the correct review page.
            </p>
            
            @if(session('links'))
                <p class="alert alert-success">{{ session('links') }}</p>
            @endif

            <form action="{{ route('review.storeOrUpdateLink') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Link</label>
                    <input type="name" class="form-control" name="link" value="{{ $link->link ?? '' }}" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Save Link</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
