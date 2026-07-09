@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Deities</h2>
        <a href="{{ route('admin.arti.deities.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Add Deity
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 80px;">Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-end px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($deities as $deity)
                        <tr>
                            <td>
                                <img src="{{ $deity->image_url }}" alt="{{ $deity->name }}" class="rounded img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                            </td>
                            <td class="fw-bold">{{ $deity->name }}</td>
                            <td class="text-muted">{{ Str::limit($deity->description, 100) }}</td>
                            <td class="text-end px-4">
                                <a href="{{ route('admin.arti.deities.edit', $deity->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.arti.deities.destroy', $deity->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this deity? This will delete all associated aartis and wallpapers.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">No deities found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $deities->links() }}
    </div>
</div>
@endsection
