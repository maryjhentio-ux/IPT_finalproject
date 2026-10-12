
@extends('layouts.app')

@section('title', 'Edit Officer')

@section('content')
<h2 class="page-title mb-4">Edit Officer Assignment</h2>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('officers.update', $officer) }}" method="POST">
            @csrf
            @method('PUT')
            @include('officers.form')

            <button class="btn btn-primary">Update Officer</button>
            <a href="{{ route('officers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
