<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Organization Management System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Top Header Bar */
        .top-header {
            background-color: #1a365d; /* Rich Dark Blue */
            color: #ffffff;
            padding: 24px 40px;
        }

        .top-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0;
        }

        .top-header p {
            font-size: 0.95rem;
            margin: 4px 0 0 0;
            opacity: 0.9;
        }

        .admin-btn {
            background-color: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 6px 16px;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .admin-btn:hover {
            background-color: rgba(255, 255, 255, 0.25);
            color: #ffffff;
        }

        /* Main Content */
        .main-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
            flex: 1;
        }

        .welcome-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 8px;
        }

        .welcome-subtext {
            color: #4a5568;
            font-size: 1rem;
            margin-bottom: 35px;
        }

        /* Cards Style */
        .card-custom {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 30px;
            height: 100%;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card-custom:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.04);
        }

        /* Feature Icon Box */
        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            margin-bottom: 20px;
        }

        .icon-cyan {
            background-color: #e0f2fe;
            color: #0284c7;
        }

        .icon-green {
            background-color: #dcfce7;
            color: #16a34a;
        }

        .card-title-custom {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 12px;
        }

        .card-text-custom {
            color: #4a5568;
            font-size: 0.92rem;
            line-height: 1.5;
            margin-bottom: 25px;
        }

        /* Action Buttons */
        .btn-custom {
            background-color: #0ea5e9; /* Bright Blue / Cyan */
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.2s;
        }

        .btn-custom:hover {
            background-color: #0284c7;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header class="top-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1>Student Organization Management System</h1>
                    <p>Manage student organizations and memberships in one place.</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="#" class="admin-btn">
                        <i class="bi bi-person-badge-fill me-1"></i> Admin Dashboard
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Dashboard Main Content -->
    <main class="main-container">
        <h2 class="welcome-title">Welcome to the Dashboard!</h2>
        <p class="welcome-subtext">This system helps manage student organization membership records. Choose an action below to get started.</p>

        <div class="row g-4">
            <!-- Membership Management Card -->
            <div class="col-md-6">
                <div class="card-custom">
                    <div class="icon-box icon-cyan">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h5 class="card-title-custom">Membership Management</h5>
                    <p class="card-text-custom">
                        View membership records, register new memberships, edit existing information, and remove records.
                    </p>
                    <a href="{{ route('memberships.index') }}" class="btn btn-custom">
                        Manage Memberships <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Register Membership Card -->
            <div class="col-md-6">
                <div class="card-custom">
                    <div class="icon-box icon-green">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <h5 class="card-title-custom">Register Membership</h5>
                    <p class="card-text-custom">
                        Open the membership registration form to add a new record to the system.
                    </p>
                    <a href="{{ route('memberships.create') }}" class="btn btn-custom">
                        Add Membership <i class="bi bi-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </main>

</body>
</html>