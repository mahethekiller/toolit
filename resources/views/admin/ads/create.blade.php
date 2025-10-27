@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Add New Google Ad</h2>

    <form action="{{ route('admin.ads.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Ad Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Position (Optional)</label>
            <input type="text" name="position" class="form-control" placeholder="e.g., header, sidebar, footer">
        </div>

        <div class="mb-3">
            <label class="form-label">Ad Code (HTML/JS)</label>
            <textarea name="code" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="active" value="1" checked>
            <label class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-success">💾 Save Ad</button>
    </form>
</div>
@endsection
