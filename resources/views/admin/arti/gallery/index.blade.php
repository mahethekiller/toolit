@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Gallery Wallpapers</h2>
        <a href="{{ route('admin.arti.gallery.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Add Wallpaper
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
                            <th style="width: 100px;">Thumbnail</th>
                            <th>Title</th>
                            <th>Deity</th>
                            <th>Downloads</th>
                            <th class="text-end px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($images as $image)
                        <tr>
                            <td>
                                <img src="{{ $image->image_url }}" alt="{{ $image->title }}" class="rounded img-thumbnail" style="width: 80px; height: 50px; object-fit: cover;">
                            </td>
                            <td class="fw-bold">{{ $image->title }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $image->deity->name ?? 'None' }}</span>
                            </td>
                            <td>{{ $image->download_count }}</td>
                            <td class="text-end px-4">
                                <a href="{{ route('admin.arti.gallery.edit', $image->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.arti.gallery.destroy', $image->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this wallpaper?');">
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
                            <td colspan="5" class="text-center py-4 text-muted">No wallpapers found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $images->links() }}
    </div>
</div>
@endsection
