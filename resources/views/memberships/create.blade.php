<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Membership</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5" style="max-width: 600px;">
        <h2 class="mb-4">Register New Membership</h2>
        <div class="card shadow-sm p-4">
            <form action="{{ route('memberships.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Student Name</label>
                    <input type="text" name="student_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Organization</label>
                    <input type="text" name="organization" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <input type="text" name="role" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Save Membership</button>
                <a href="{{ route('memberships.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>