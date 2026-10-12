
@extends('layouts.app')

@section('title', 'Officer Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title">Officer Details</h2>
    <a href="{{ route('officers.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body p-4">
        <h4>{{ $officer->student->first_name }} {{ $officer->student->last_name }}</h4>
        <p class="text-muted">{{ $officer->position }}</p>
        <hr>

        <p><strong>Student Number:</strong> {{ $officer->student->student_number }}</p>
        <p><strong>Organization:</strong> {{ $officer->organization->name }}</p>
        <p><strong>Position:</strong> {{ $officer->position }}</p>
        <p><strong>Start Date:</strong> {{ $officer->start_date->format('F d, Y') }}</p>
        <p><strong>End Date:</strong> {{ $officer->end_date?->format('F d, Y') ?? 'Current' }}</p>

        <a href="{{ route('officers.edit', $officer) }}" class="btn btn-warning">
            Edit Officer
        </a>
    </div>
</div>
@endsection
