@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <a href="{{ route('admin.arti.aartis.index') }}" class="text-decoration-none">
            <i class="fas fa-arrow-left me-1"></i> Back to Aartis
        </a>
        <h2 class="mt-2">Edit Aarti: {{ $aarti->title }}</h2>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <form action="{{ route('admin.arti.aartis.update', $aarti->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="deity_id" class="form-label fw-bold">Associated Deity</label>
                        <select class="form-select @error('deity_id') is-invalid @enderror" id="deity_id" name="deity_id" required>
                            @foreach($deities as $deity)
                                <option value="{{ $deity->id }}" {{ old('deity_id', $aarti->deity_id) == $deity->id ? 'selected' : '' }}>{{ $deity->name }}</option>
                            @endforeach
                        </select>
                        @error('deity_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label fw-bold">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $aarti->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="subtitle" class="form-label fw-bold">Subtitle</label>
                        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle', $aarti->subtitle) }}" required>
                        @error('subtitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="category" class="form-label fw-bold">Category</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category', $aarti->category) }}" required>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="duration" class="form-label fw-bold">Duration</label>
                        <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration', $aarti->duration) }}" required>
                        @error('duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="video_url" class="form-label fw-bold">Video URL (ID)</label>
                        <input type="text" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url', $aarti->video_url) }}" required>
                        @error('video_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="audio_url" class="form-label fw-bold">Audio URL</label>
                    <input type="url" class="form-control @error('audio_url') is-invalid @enderror" id="audio_url" name="audio_url" value="{{ old('audio_url', $aarti->audio_url) }}" required>
                    @error('audio_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lyrics" class="form-label fw-bold">Lyrics (JSON Format)</label>
                    <textarea class="form-control @error('lyrics') is-invalid @enderror" id="lyrics" name="lyrics" rows="8" required>{{ old('lyrics', $lyricsJson) }}</textarea>
                    <div class="form-text text-muted">Please provide the lyrics as a valid JSON array of objects with <code>timestamp</code> (seconds) and <code>text</code> keys.</div>
                    @error('lyrics')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('admin.arti.aartis.index') }}" class="btn btn-light">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Aarti</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
