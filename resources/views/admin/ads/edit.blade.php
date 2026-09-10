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
            <label class="form-label">Position (Slot Key)</label>
            <input type="text" name="position" class="form-control" list="positionList" value="{{ $ad->position }}">
            <datalist id="positionList">
                <option value="sidebar">Tool Desktop Sidebar</option>
                <option value="toola">Post-Tool Break (Mobile / In-flow)</option>
                <option value="toolb">Below Tool Guide / Above FAQ</option>
                <option value="home_grid">Homepage Tools Grid</option>
                <option value="tools_grid">All Tools Catalog Grid</option>
                <option value="footer">Page Footer Banner</option>
            </datalist>
            <small class="text-muted d-block mt-1">Available slots: <code>sidebar</code>, <code>toola</code>, <code>toolb</code>, <code>home_grid</code>, <code>tools_grid</code>, <code>footer</code></small>
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
