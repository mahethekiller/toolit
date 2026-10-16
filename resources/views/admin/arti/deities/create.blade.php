@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <a href="{{ route('admin.arti.deities.index') }}" class="text-decoration-none">
            <i class="fas fa-arrow-left me-1"></i> Back to Deities
        </a>
        <h2 class="mt-2">Add New Deity</h2>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <form action="{{ route('admin.arti.deities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <h5 class="fw-bold mb-3 text-primary border-bottom pb-2">Basic Information</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label fw-bold">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Shiva, Ganesha" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="name_devanagari" class="form-label fw-bold">Name in Devanagari / Hindi</label>
                        <input type="text" class="form-control @error('name_devanagari') is-invalid @enderror" id="name_devanagari" name="name_devanagari" value="{{ old('name_devanagari') }}" placeholder="e.g. भगवान शिव, श्री गणेश">
                        @error('name_devanagari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="slug" class="form-label fw-bold">Slug <span class="text-muted fw-normal">(Optional, auto-generated if empty)</span></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" placeholder="e.g. shiva, ganesha">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="title_sub" class="form-label fw-bold">Subtitle / Epithet</label>
                        <input type="text" class="form-control @error('title_sub') is-invalid @enderror" id="title_sub" name="title_sub" value="{{ old('title_sub') }}" placeholder="e.g. Lord of Beginnings & Wisdom">
                        @error('title_sub')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h5 class="fw-bold mb-3 mt-3 text-primary border-bottom pb-2">Calendar & Design Theme</h5>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="day_of_week" class="form-label fw-bold">Day of Week</label>
                        <input type="text" class="form-control @error('day_of_week') is-invalid @enderror" id="day_of_week" name="day_of_week" value="{{ old('day_of_week') }}" placeholder="e.g. Monday, Tuesday">
                        @error('day_of_week')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="day_hindi" class="form-label fw-bold">Day in Hindi</label>
                        <input type="text" class="form-control @error('day_hindi') is-invalid @enderror" id="day_hindi" name="day_hindi" value="{{ old('day_hindi') }}" placeholder="e.g. सोमवार, मंगलवार">
                        @error('day_hindi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="icon" class="form-label fw-bold">Icon / Emoji</label>
                        <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" value="{{ old('icon', '🕉️') }}" placeholder="e.g. 🕉️, 🔱, 🐘">
                        @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="theme_color" class="form-label fw-bold">Primary Theme Color</label>
                        <div class="input-group">
                            <input type="color" class="form-control form-control-color" id="theme_color_picker" value="{{ old('theme_color', '#E65100') }}" onchange="document.getElementById('theme_color').value = this.value">
                            <input type="text" class="form-control @error('theme_color') is-invalid @enderror" id="theme_color" name="theme_color" value="{{ old('theme_color', '#E65100') }}" placeholder="#E65100" onchange="document.getElementById('theme_color_picker').value = this.value">
                        </div>
                        @error('theme_color')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="accent_color" class="form-label fw-bold">Accent Color</label>
                        <div class="input-group">
                            <input type="color" class="form-control form-control-color" id="accent_color_picker" value="{{ old('accent_color', '#FFA726') }}" onchange="document.getElementById('accent_color').value = this.value">
                            <input type="text" class="form-control @error('accent_color') is-invalid @enderror" id="accent_color" name="accent_color" value="{{ old('accent_color', '#FFA726') }}" placeholder="#FFA726" onchange="document.getElementById('accent_color_picker').value = this.value">
                        </div>
                        @error('accent_color')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h5 class="fw-bold mb-3 mt-3 text-primary border-bottom pb-2">Description & Media</h5>
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Brief description of the deity..." required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="image_file" class="form-label fw-bold">Upload Image File</label>
                        <input type="file" class="form-control @error('image_file') is-invalid @enderror" id="image_file" name="image_file" accept="image/*">
                        <div class="form-text text-muted">Upload a local image file.</div>
                        @error('image_file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="image_url" class="form-label fw-bold">Or Image URL</label>
                        <input type="text" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url') }}" placeholder="https://example.com/image.jpg or /images/arties/...">
                        <div class="form-text text-muted">Or enter web URL or local path.</div>
                        @error('image_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('admin.arti.deities.index') }}" class="btn btn-light">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Deity</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
