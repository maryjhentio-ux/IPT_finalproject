
@extends('layouts.app')

@section('title', 'Edit Organization')

@section('content')
<h2 class="page-title mb-4">Edit Organization</h2>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('organizations.update', $organization) }}" method="POST">
            @csrf
            @method('PUT')
            @include('organizations.form')

            <button type="submit" class="btn btn-primary">Update Organization</button>
            <a href="{{ route('organizations.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
