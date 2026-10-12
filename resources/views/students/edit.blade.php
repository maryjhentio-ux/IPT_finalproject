@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
<h2 class="page-title mb-4">Edit Student</h2>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')

            @include('students.form')

            <button class="btn btn-primary">Update Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
