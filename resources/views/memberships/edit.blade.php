
@extends('layouts.app')

@section('title', 'Edit Membership')

@section('content')
<h2 class="page-title mb-4">Edit Membership</h2>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('memberships.update', $membership) }}" method="POST">
            @csrf
            @method('PUT')
            @include('memberships.form')

            <button class="btn btn-primary">Update Membership</button>
            <a href="{{ route('memberships.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
