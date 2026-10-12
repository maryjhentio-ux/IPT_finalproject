
@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
<h2 class="page-title mb-4">Add Student</h2>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            @include('students.form')

            <button class="btn btn-primary">Save Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
