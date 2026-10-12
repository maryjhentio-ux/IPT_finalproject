
@extends('layouts.app')

@section('title', 'Organization Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title">Organization Details</h2>
    <a href="{{ route('organizations.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card mb-4">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h3>{{ $organization->name }}</h3>
                <p class="text-muted mb-1">
                    {{ $organization->acronym ?: 'No acronym' }}
                </p>
                <span class="badge {{ $organization->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                    {{ ucfirst($organization->status) }}
                </span>
            </div>
            <a href="{{ route('organizations.edit', $organization) }}"
               class="btn btn-warning">Edit Organization</a>
        </div>

        <hr>

        <p><strong>Category:</strong> {{ $organization->category }}</p>
        <p><strong>Email:</strong> {{ $organization->email ?: 'Not provided' }}</p>
        <p><strong>Description:</strong> {{ $organization->description ?: 'No description provided.' }}</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header bg-white">
                <h5 class="mb-0">Officers</h5>
            </div>
            <div class="card-body">
                @forelse ($organization->officers as $officer)
                    <p>
                        <strong>{{ $officer->student->first_name }} {{ $officer->student->last_name }}</strong>
                        <br>
                        <span class="text-muted">{{ $officer->position }}</span>
                    </p>
                @empty
                    <p class="text-muted">No officers assigned.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header bg-white">
                <h5 class="mb-0">Events</h5>
            </div>
            <div class="card-body">
                @forelse ($organization->events as $event)
                    <p>
                        <strong>{{ $event->title }}</strong>
                        <br>
                        <span class="text-muted">
                            {{ $event->start_at->format('M d, Y h:i A') }}
                        </span>
                    </p>
                @empty
                    <p class="text-muted">No events created.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header bg-white">
                <h5 class="mb-0">Members</h5>
            </div>
            <div class="card-body">
                @forelse ($organization->memberships as $membership)
                    <p>
                        {{ $membership->student->first_name }}
                        {{ $membership->student->last_name }}
                        <br>
                        <span class="text-muted">{{ ucfirst($membership->status) }}</span>
                    </p>
                @empty
                    <p class="text-muted">No members registered.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
