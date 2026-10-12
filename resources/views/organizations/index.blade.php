
@extends('layouts.app')

@section('title', 'Organizations')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
    <div>
        <h2 class="page-title">Organizations</h2>
        <p class="text-muted mb-0">Manage registered campus organizations.</p>
    </div>
    <a href="{{ route('organizations.create') }}" class="btn btn-primary">
        + Add Organization
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Acronym</th>
                        <th>Category</th>
                        <th>Officers</th>
                        <th>Events</th>
                        <th>Members</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($organizations as $organization)
                        <tr>
                            <td>{{ $organization->name }}</td>
                            <td>{{ $organization->acronym ?: '—' }}</td>
                            <td>{{ $organization->category }}</td>
                            <td>{{ $organization->officers_count }}</td>
                            <td>{{ $organization->events_count }}</td>
                            <td>{{ $organization->memberships_count }}</td>
                            <td>
                                <span class="badge {{ $organization->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($organization->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('organizations.show', $organization) }}"
                                       class="btn btn-sm btn-info text-white">View</a>

                                    <a href="{{ route('organizations.edit', $organization) }}"
                                       class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('organizations.destroy', $organization) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this organization and its related records?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                No organizations registered yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $organizations->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
