
@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title">Student Details</h2>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body p-4">
        <h4>{{ $student->first_name }} {{ $student->last_name }}</h4>
        <hr>

        <p><strong>Student Number:</strong> {{ $student->student_number }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Course:</strong> {{ $student->course }}</p>
        <p><strong>Year Level:</strong> {{ $student->year_level }}</p>
        <p><strong>Phone:</strong> {{ $student->phone ?: 'Not provided' }}</p>

        <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">
            Edit Student
        </a>
    </div>
</div>
@endsection
