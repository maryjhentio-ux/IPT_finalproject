
@extends('layouts.app')

@section('title', 'Memberships')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="page-title">Memberships</h2>
        <p class="text-muted mb-0">Manage student organization memberships.</p>
    </div>
    <a href="{{ route('memberships.create') }}" class="btn btn-primary">
        + Add Membership
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Student</th>
                        <th>Organization</th>
                        <th>Date Joined</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($memberships as $membership)
                        <tr>
                            <td>
                                {{ $membership->student->first_name }}
                                {{ $membership->student->last_name }}
                            </td>
                            <td>{{ $membership->organization->name }}</td>
                            <td>{{ $membership->joined_at->format('M d, Y') }}</td>
                            <td>
                                <span class="badge {{ $membership->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($membership->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('memberships.show', $membership) }}"
                                       class="btn btn-sm btn-info text-white">View</a>
                                    <a href="{{ route('memberships.edit', $membership) }}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('memberships.destroy', $membership) }}"
                                          method="POST"
                                          onsubmit="return confirm('Remove this membership?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                No memberships registered.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $memberships->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
