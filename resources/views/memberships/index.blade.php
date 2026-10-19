<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Membership Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Membership Management</h2>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Dashboard</a>
                <a href="{{ route('memberships.create') }}" class="btn btn-primary btn-sm">Add Membership</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Organization</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($memberships ?? [] as $membership)
                            <tr>
                                <td>{{ $membership->id }}</td>
                                <td>{{ $membership->student_name }}</td>
                                <td>{{ $membership->organization }}</td>
                                <td>{{ $membership->role }}</td>
                                <td>
                                    <a href="{{ route('memberships.edit', $membership->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('memberships.destroy', $membership->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No membership records found. Click "Add Membership" to create one.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>