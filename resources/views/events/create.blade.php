
@extends('layouts.app')

@section('title', 'Add Event')

@section('content')
<h2 class="page-title mb-4">Add Event</h2>

@if ($organizations->isEmpty())
    <div class="alert alert-warning">
        Create an organization before adding an event.
        <a href="{{ route('organizations.create') }}">Add organization</a>
    </div>
@endif

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            @include('events.form')

            <button class="btn btn-primary" @disabled($organizations->isEmpty())>
                Save Event
            </button>
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
