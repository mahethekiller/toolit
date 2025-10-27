@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit Ad: {{ $ad->name }}</h2>

    <form action="{{ route('admin.ads.update', $ad) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Ad Name</label>
            <input type="text" name="name" class="form-control" value="{{ $ad->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Position</label>
            <input type="text" name="position" class="form-control" value="{{ $ad->position }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Ad Code</label>
            <textarea name="code" class="form-control" rows="5" required>{{ $ad->code }}</textarea>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="active" value="1" {{ $ad->active ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-success">💾 Update Ad</button>
    </form>
</div>
@endsection
