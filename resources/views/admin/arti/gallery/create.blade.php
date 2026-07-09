@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <a href="{{ route('admin.arti.gallery.index') }}" class="text-decoration-none">
            <i class="fas fa-arrow-left me-1"></i> Back to Gallery
        </a>
        <h2 class="mt-2">Add New Wallpaper</h2>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <form action="{{ route('admin.arti.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="deity_id" class="form-label fw-bold">Associated Deity</label>
                    <select class="form-select @error('deity_id') is-invalid @enderror" id="deity_id" name="deity_id" required>
                        <option value="">Select Deity...</option>
                        @foreach($deities as $deity)
                            <option value="{{ $deity->id }}" {{ old('deity_id') == $deity->id ? 'selected' : '' }}>{{ $deity->name }}</option>
                        @endforeach
                    </select>
                    @error('deity_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="e.g. Lord Shiva Adiyogi" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="image_file" class="form-label fw-bold">Upload Wallpaper File</label>
                        <input type="file" class="form-control @error('image_file') is-invalid @enderror" id="image_file" name="image_file" accept="image/*">
                        <div class="form-text text-muted">Upload a local wallpaper image.</div>
                        @error('image_file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="image_url" class="form-label fw-bold">Or Wallpaper URL</label>
                        <input type="url" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url') }}" placeholder="https://example.com/wallpaper.jpg">
                        <div class="form-text text-muted">Or paste an external web URL.</div>
                        @error('image_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="download_count" class="form-label fw-bold">Initial Download Count</label>
                    <input type="number" class="form-control @error('download_count') is-invalid @enderror" id="download_count" name="download_count" value="{{ old('download_count', 0) }}" min="0" required>
                    @error('download_count')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('admin.arti.gallery.index') }}" class="btn btn-light">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Wallpaper</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
