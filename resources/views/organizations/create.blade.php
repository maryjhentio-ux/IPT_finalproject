
@extends('layouts.app')

@section('title', 'Add Organization')

@section('content')
<h2 class="page-title mb-4">Add Organization</h2>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('organizations.store') }}" method="POST">
            @csrf
            @include('organizations.form')

            <button type="submit" class="btn btn-primary">Save Organization</button>
            <a href="{{ route('organizations.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
