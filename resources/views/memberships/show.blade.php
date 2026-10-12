
@extends('layouts.app')

@section('title', 'Membership Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title">Membership Details</h2>
    <a href="{{ route('memberships.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body p-4">
        <h4>
            {{ $membership->student->first_name }}
            {{ $membership->student->last_name }}
        </h4>
        <hr>

        <p><strong>Student Number:</strong> {{ $membership->student->student_number }}</p>
        <p><strong>Organization:</strong> {{ $membership->organization->name }}</p>
        <p><strong>Date Joined:</strong> {{ $membership->joined_at->format('F d, Y') }}</p>
        <p><strong>Status:</strong> {{ ucfirst($membership->status) }}</p>

        <a href="{{ route('memberships.edit', $membership) }}" class="btn btn-warning">
            Edit Membership
        </a>
    </div>
</div>
@endsection
