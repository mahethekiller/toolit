@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <a href="{{ route('admin.arti.gallery.index') }}" class="text-decoration-none">
            <i class="fas fa-arrow-left me-1"></i> Back to Gallery
        </a>
        <h2 class="mt-2">Edit Wallpaper: {{ $image->title }}</h2>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <form action="{{ route('admin.arti.gallery.update', $image->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="deity_id" class="form-label fw-bold">Associated Deity</label>
                    <select class="form-select @error('deity_id') is-invalid @enderror" id="deity_id" name="deity_id" required>
                        @foreach($deities as $deity)
                            <option value="{{ $deity->id }}" {{ old('deity_id', $image->deity_id) == $deity->id ? 'selected' : '' }}>{{ $deity->name }}</option>
                        @endforeach
                    </select>
                    @error('deity_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $image->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold d-block">Current Wallpaper</label>
                    <img src="{{ $image->image_url }}" alt="{{ $image->title }}" class="rounded img-thumbnail mb-2" style="max-height: 120px;">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="image_file" class="form-label fw-bold">Upload New Wallpaper File</label>
                        <input type="file" class="form-control @error('image_file') is-invalid @enderror" id="image_file" name="image_file" accept="image/*">
                        <div class="form-text text-muted">Upload a local image file to replace current.</div>
                        @error('image_file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="image_url" class="form-label fw-bold">Or Wallpaper URL</label>
                        <input type="url" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url', $image->image_url) }}">
                        <div class="form-text text-muted">Or update the external web URL.</div>
                        @error('image_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="download_count" class="form-label fw-bold">Download Count</label>
                    <input type="number" class="form-control @error('download_count') is-invalid @enderror" id="download_count" name="download_count" value="{{ old('download_count', $image->download_count) }}" min="0" required>
                    @error('download_count')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('admin.arti.gallery.index') }}" class="btn btn-light">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Wallpaper</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
