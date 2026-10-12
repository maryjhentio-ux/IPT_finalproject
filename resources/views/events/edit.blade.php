
@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')
<h2 class="page-title mb-4">Edit Event</h2>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')
            @include('events.form')

            <button class="btn btn-primary">Update Event</button>
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
