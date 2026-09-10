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
            <label class="form-label">Position (Slot Key)</label>
            <input type="text" name="position" class="form-control" list="positionList" placeholder="e.g., sidebar, toola, home_grid">
            <datalist id="positionList">
                <option value="header">Top Header Leaderboard (728x90)</option>
                <option value="sidebar">Tool Desktop Sidebar (1:1 / 300x250)</option>
                <option value="toola">Post-Tool Break (Mobile / In-flow)</option>
                <option value="toolb">Below Tool Guide / Above FAQ</option>
                <option value="home_divider">Homepage Section Divider (728x90)</option>
                <option value="home_grid">Homepage Tools Grid (1:1 Native)</option>
                <option value="tools_grid">All Tools Catalog Grid (1:1 Native)</option>
                <option value="footer">Page Footer Banner (728x90)</option>
            </datalist>
            <small class="text-muted d-block mt-1">Available slots: <code>header</code>, <code>sidebar</code>, <code>toola</code>, <code>toolb</code>, <code>home_divider</code>, <code>home_grid</code>, <code>tools_grid</code>, <code>footer</code></small>
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
