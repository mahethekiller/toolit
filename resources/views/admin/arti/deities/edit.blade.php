@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <a href="{{ route('admin.arti.deities.index') }}" class="text-decoration-none">
            <i class="fas fa-arrow-left me-1"></i> Back to Deities
        </a>
        <h2 class="mt-2">Edit Deity: {{ $deity->name }}</h2>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <form action="{{ route('admin.arti.deities.update', $deity->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h5 class="fw-bold mb-3 text-primary border-bottom pb-2">Basic Information</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label fw-bold">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $deity->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="name_devanagari" class="form-label fw-bold">Name in Devanagari / Hindi</label>
                        <input type="text" class="form-control @error('name_devanagari') is-invalid @enderror" id="name_devanagari" name="name_devanagari" value="{{ old('name_devanagari', $deity->name_devanagari) }}" placeholder="e.g. भगवान शिव, श्री गणेश">
                        @error('name_devanagari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="slug" class="form-label fw-bold">Slug <span class="text-muted fw-normal">(Optional, auto-generated if empty)</span></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $deity->slug) }}">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="title_sub" class="form-label fw-bold">Subtitle / Epithet</label>
                        <input type="text" class="form-control @error('title_sub') is-invalid @enderror" id="title_sub" name="title_sub" value="{{ old('title_sub', $deity->title_sub) }}" placeholder="e.g. Lord of Beginnings & Wisdom">
                        @error('title_sub')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h5 class="fw-bold mb-3 mt-3 text-primary border-bottom pb-2">Calendar & Design Theme</h5>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="day_of_week" class="form-label fw-bold">Day of Week</label>
                        <input type="text" class="form-control @error('day_of_week') is-invalid @enderror" id="day_of_week" name="day_of_week" value="{{ old('day_of_week', $deity->day_of_week) }}" placeholder="e.g. Monday, Tuesday">
                        @error('day_of_week')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="day_hindi" class="form-label fw-bold">Day in Hindi</label>
                        <input type="text" class="form-control @error('day_hindi') is-invalid @enderror" id="day_hindi" name="day_hindi" value="{{ old('day_hindi', $deity->day_hindi) }}" placeholder="e.g. सोमवार, मंगलवार">
                        @error('day_hindi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="icon" class="form-label fw-bold">Icon / Emoji</label>
                        <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" value="{{ old('icon', $deity->icon ?? '🕉️') }}" placeholder="e.g. 🕉️, 🔱, 🐘">
                        @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="theme_color" class="form-label fw-bold">Primary Theme Color</label>
                        <div class="input-group">
                            <input type="color" class="form-control form-control-color" id="theme_color_picker" value="{{ old('theme_color', $deity->theme_color ?? '#E65100') }}" onchange="document.getElementById('theme_color').value = this.value">
                            <input type="text" class="form-control @error('theme_color') is-invalid @enderror" id="theme_color" name="theme_color" value="{{ old('theme_color', $deity->theme_color ?? '#E65100') }}" placeholder="#E65100" onchange="document.getElementById('theme_color_picker').value = this.value">
                        </div>
                        @error('theme_color')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="accent_color" class="form-label fw-bold">Accent Color</label>
                        <div class="input-group">
                            <input type="color" class="form-control form-control-color" id="accent_color_picker" value="{{ old('accent_color', $deity->accent_color ?? '#FFA726') }}" onchange="document.getElementById('accent_color').value = this.value">
                            <input type="text" class="form-control @error('accent_color') is-invalid @enderror" id="accent_color" name="accent_color" value="{{ old('accent_color', $deity->accent_color ?? '#FFA726') }}" placeholder="#FFA726" onchange="document.getElementById('accent_color_picker').value = this.value">
                        </div>
                        @error('accent_color')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h5 class="fw-bold mb-3 mt-3 text-primary border-bottom pb-2">Description & Media</h5>
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $deity->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @if($deity->image_url)
                    <div class="mb-3">
                        <label class="form-label fw-bold d-block">Current Image</label>
                        <img src="{{ $deity->image_url }}" alt="{{ $deity->name }}" class="rounded img-thumbnail mb-2" style="max-height: 120px;">
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="image_file" class="form-label fw-bold">Upload New Image File</label>
                        <input type="file" class="form-control @error('image_file') is-invalid @enderror" id="image_file" name="image_file" accept="image/*">
                        <div class="form-text text-muted">Upload a local image file to replace current.</div>
                        @error('image_file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="image_url" class="form-label fw-bold">Or Image URL</label>
                        <input type="text" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url', $deity->image_url) }}">
                        <div class="form-text text-muted">Or update the web URL or local path.</div>
                        @error('image_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('admin.arti.deities.index') }}" class="btn btn-light">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Deity</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
