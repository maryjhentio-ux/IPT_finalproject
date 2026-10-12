
@extends('layouts.app')

@section('title', 'Officers')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="page-title">Officers</h2>
        <p class="text-muted mb-0">Manage organization officer assignments.</p>
    </div>
    <a href="{{ route('officers.create') }}" class="btn btn-primary">
        + Assign Officer
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
                        <th>Position</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($officers as $officer)
                        <tr>
                            <td>
                                {{ $officer->student->first_name }}
                                {{ $officer->student->last_name }}
                            </td>
                            <td>{{ $officer->organization->name }}</td>
                            <td>{{ $officer->position }}</td>
                            <td>{{ $officer->start_date->format('M d, Y') }}</td>
                            <td>
                                {{ $officer->end_date?->format('M d, Y') ?? 'Current' }}
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('officers.show', $officer) }}"
                                       class="btn btn-sm btn-info text-white">View</a>
                                    <a href="{{ route('officers.edit', $officer) }}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('officers.destroy', $officer) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this officer assignment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                No officer assignments yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $officers->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
