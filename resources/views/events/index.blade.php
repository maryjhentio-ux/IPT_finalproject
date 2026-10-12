
@extends('layouts.app')

@section('title', 'Events')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="page-title">Events</h2>
        <p class="text-muted mb-0">Manage campus organization events.</p>
    </div>
    <a href="{{ route('events.create') }}" class="btn btn-primary">+ Add Event</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Organization</th>
                        <th>Location</th>
                        <th>Start</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->organization->name }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->start_at->format('M d, Y h:i A') }}</td>
                            <td>
                                <span class="badge
                                    {{ $event->status === 'upcoming' ? 'bg-primary' : ($event->status === 'completed' ? 'bg-success' : 'bg-secondary') }}">
                                    {{ ucfirst($event->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('events.show', $event) }}"
                                       class="btn btn-sm btn-info text-white">View</a>
                                    <a href="{{ route('events.edit', $event) }}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('events.destroy', $event) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this event?');">
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
                                No events have been created.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $events->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
