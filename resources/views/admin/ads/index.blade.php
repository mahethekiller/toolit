@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Manage Google Ads</h2>

    <a href="{{ route('admin.ads.create') }}" class="btn btn-primary mb-3">➕ Add New Ad</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ads as $ad)
                <tr>
                    <td>{{ $ad->name }}</td>
                    <td>{{ $ad->position ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $ad->active ? 'bg-success' : 'bg-danger' }}">
                            {{ $ad->active ? 'Yes' : 'No' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.ads.edit', $ad) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.ads.destroy', $ad) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
