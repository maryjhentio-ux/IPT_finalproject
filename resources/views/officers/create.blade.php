@extends('layouts.app')

@section('title', 'Assign Officer')

@section('content')
<h2 class="page-title mb-4">Assign Officer</h2>

@if ($students->isEmpty() || $organizations->isEmpty())
    <div class="alert alert-warning">
        You must register at least one student and one organization first.
        <a href="{{ route('students.create') }}">Add a student</a> or
        <a href="{{ route('organizations.create') }}">add an organization</a>.
    </div>
@endif

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('officers.store') }}" method="POST">
            @csrf
            @include('officers.form')
            <button class="btn btn-primary" @disabled($students->isEmpty() || $organizations->isEmpty())>
                Save Officer
            </button>
            <a href="{{ route('officers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
