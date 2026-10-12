
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Organization Management System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #263247;
        }

        .header {
            background: #172554;
            color: white;
            padding: 24px 7%;
        }

        .header h1 {
            font-size: 27px;
            margin-bottom: 8px;
        }

        .header p {
            color: #dbeafe;
        }

        .container {
            width: 86%;
            max-width: 1100px;
            margin: 35px auto;
        }

        .welcome {
            margin-bottom: 28px;
        }

        .welcome h2 {
            margin-bottom: 10px;
            color: #172554;
        }

        .welcome p {
            color: #64748b;
            line-height: 1.6;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.07);
        }

        .card h3 {
            color: #172554;
            margin-bottom: 12px;
        }

        .card p {
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 11px 17px;
            border-radius: 6px;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .footer {
            text-align: center;
            color: #64748b;
            padding: 25px;
            margin-top: 25px;
        }
    </style>
</head>
<body>

    <header class="header">
        <h1>Student Organization Management System</h1>
        <p>Manage student organizations and memberships in one place.</p>
    </header>

    <main class="container">
        <section class="welcome">
            <h2>Welcome to the Dashboard!</h2>
            <p>
                This system helps manage student organization membership
                records. Choose an action below to get started.
            </p>
        </section>

        <section class="cards">
            <div class="card">
                <h3>Membership Management</h3>
                <p>
                    View membership records, register new memberships,
                    edit existing information, and remove records.
                </p>
                <a href="{{ url('/memberships') }}" class="btn">
                    Manage Memberships
                </a>
            </div>

            <div class="card">
                <h3>Register Membership</h3>
                <p>
                    Open the membership registration form to add
                    a new record to the system.
                </p>
                <a href="{{ url('/memberships/create') }}" class="btn">
                    Add Membership
                </a>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Student Organization Management System</p>
    </footer>

</body>
</html>
