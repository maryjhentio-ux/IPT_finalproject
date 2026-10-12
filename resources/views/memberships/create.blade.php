
@extends('layouts.app')

@section('title', 'Add Membership')

@section('content')
<h2 class="page-title mb-4">Add Membership</h2>

@if ($students->isEmpty() || $organizations->isEmpty())
    <div class="alert alert-warning">
        Register at least one student and one organization first.
        <a href="{{ route('students.create') }}">Add student</a> |
        <a href="{{ route('organizations.create') }}">Add organization</a>
    </div>
@endif

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('memberships.store') }}" method="POST">
            @csrf
            @include('memberships.form')

            <button class="btn btn-primary" @disabled($students->isEmpty() || $organizations->isEmpty())>
                Save Membership
            </button>
            <a href="{{ route('memberships.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
