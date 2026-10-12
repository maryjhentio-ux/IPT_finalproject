
@extends('layouts.app')

@section('title', 'Event Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title">Event Details</h2>
    <a href="{{ route('events.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body p-4">
        <h3>{{ $event->title }}</h3>
        <span class="badge bg-primary">{{ ucfirst($event->status) }}</span>
        <hr>

        <p><strong>Organization:</strong> {{ $event->organization->name }}</p>
        <p><strong>Location:</strong> {{ $event->location }}</p>
        <p><strong>Start:</strong> {{ $event->start_at->format('F d, Y h:i A') }}</p>
        <p><strong>End:</strong> {{ $event->end_at?->format('F d, Y h:i A') ?? 'Not specified' }}</p>
        <p><strong>Description:</strong> {{ $event->description ?: 'No description provided.' }}</p>

        <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Edit Event</a>
    </div>
</div>
@endsection
