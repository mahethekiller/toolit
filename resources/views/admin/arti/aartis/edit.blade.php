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
            <form action="{{ route('admin.arti.aartis.update', $aarti->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <h5 class="fw-bold mb-3 text-primary border-bottom pb-2">Basic Information</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="deity_id" class="form-label fw-bold">Associated Deity <span class="text-danger">*</span></label>
                        <select class="form-select @error('deity_id') is-invalid @enderror" id="deity_id" name="deity_id" required>
                            @foreach($deities as $deity)
                                <option value="{{ $deity->id }}" {{ old('deity_id', $aarti->deity_id) == $deity->id ? 'selected' : '' }}>
                                    {{ $deity->name }} ({{ $deity->name_devanagari ?? $deity->name }})
                                </option>
                            @endforeach
                        </select>
                        @error('deity_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="category" class="form-label fw-bold">Category <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category', $aarti->category) }}" placeholder="e.g. Popular, Morning, Evening, Special" required>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label fw-bold">Title (English / Roman) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $aarti->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="title_devanagari" class="form-label fw-bold">Title (Devanagari / Hindi)</label>
                        <input type="text" class="form-control @error('title_devanagari') is-invalid @enderror" id="title_devanagari" name="title_devanagari" value="{{ old('title_devanagari', $aarti->title_devanagari) }}" placeholder="e.g. श्री गणेश जी की आरती (सुखकर्ता दुखहर्ता)">
                        @error('title_devanagari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="slug" class="form-label fw-bold">Slug <span class="text-muted fw-normal">(Optional, auto-generated if empty)</span></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $aarti->slug) }}">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="subtitle" class="form-label fw-bold">Subtitle <span class="text-muted fw-normal">(Optional, auto-generated if empty)</span></label>
                        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle', $aarti->subtitle) }}">
                        @error('subtitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h5 class="fw-bold mb-3 mt-3 text-primary border-bottom pb-2">Deity Name Overrides <span class="text-muted fw-normal small">(Optional, defaults to selected Deity)</span></h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="deity_name" class="form-label fw-bold">Deity Name Display</label>
                        <input type="text" class="form-control @error('deity_name') is-invalid @enderror" id="deity_name" name="deity_name" value="{{ old('deity_name', $aarti->deity_name) }}" placeholder="e.g. Lord Ganesha">
                        @error('deity_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="deity_devanagari" class="form-label fw-bold">Deity Name in Devanagari</label>
                        <input type="text" class="form-control @error('deity_devanagari') is-invalid @enderror" id="deity_devanagari" name="deity_devanagari" value="{{ old('deity_devanagari', $aarti->deity_devanagari) }}" placeholder="e.g. श्री गणेश">
                        @error('deity_devanagari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h5 class="fw-bold mb-3 mt-3 text-primary border-bottom pb-2">Pooja Timing & Duration</h5>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="duration" class="form-label fw-bold">Duration Display</label>
                        <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration', $aarti->duration) }}" placeholder="e.g. 3 min, 03:15">
                        @error('duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="duration_minutes" class="form-label fw-bold">Duration (Minutes)</label>
                        <input type="number" class="form-control @error('duration_minutes') is-invalid @enderror" id="duration_minutes" name="duration_minutes" value="{{ old('duration_minutes', $aarti->duration_minutes ?? 3) }}" min="1" max="60">
                        @error('duration_minutes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="timing" class="form-label fw-bold">Timing (English)</label>
                        <input type="text" class="form-control @error('timing') is-invalid @enderror" id="timing" name="timing" value="{{ old('timing', $aarti->timing) }}" placeholder="e.g. Daily Pooja / Aarti, Morning Aarti">
                        @error('timing')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="timing_devanagari" class="form-label fw-bold">Timing (Devanagari)</label>
                        <input type="text" class="form-control @error('timing_devanagari') is-invalid @enderror" id="timing_devanagari" name="timing_devanagari" value="{{ old('timing_devanagari', $aarti->timing_devanagari) }}" placeholder="e.g. नित्य पूजन एवं आरती">
                        @error('timing_devanagari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h5 class="fw-bold mb-3 mt-3 text-primary border-bottom pb-2">Significance & Short Meaning</h5>
                <div class="mb-3">
                    <label for="meaning_short" class="form-label fw-bold">Short Meaning / Summary</label>
                    <textarea class="form-control @error('meaning_short') is-invalid @enderror" id="meaning_short" name="meaning_short" rows="2" placeholder="Brief 1-2 sentence overview of the Aarti...">{{ old('meaning_short', $aarti->meaning_short) }}</textarea>
                    @error('meaning_short')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="significance" class="form-label fw-bold">Spiritual Significance (English)</label>
                        <textarea class="form-control @error('significance') is-invalid @enderror" id="significance" name="significance" rows="3" placeholder="Significance, benefits, or background story in English...">{{ old('significance', $aarti->significance) }}</textarea>
                        @error('significance')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="significance_devanagari" class="form-label fw-bold">Spiritual Significance (Devanagari)</label>
                        <textarea class="form-control @error('significance_devanagari') is-invalid @enderror" id="significance_devanagari" name="significance_devanagari" rows="3" placeholder="आरती का आध्यात्मिक महत्व एवं कथा...">{{ old('significance_devanagari', $aarti->significance_devanagari) }}</textarea>
                        @error('significance_devanagari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h5 class="fw-bold mb-3 mt-3 text-primary border-bottom pb-2">Media & Image</h5>
                @if($aarti->image_url)
                    <div class="mb-3">
                        <label class="form-label fw-bold d-block">Current Aarti Image</label>
                        <img src="{{ $aarti->image_url }}" alt="{{ $aarti->title }}" class="rounded img-thumbnail mb-2" style="max-height: 120px;">
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
                        <label for="image_url" class="form-label fw-bold">Or Image URL / Path</label>
                        <input type="text" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url', $aarti->image_url) }}" placeholder="https://example.com/aarti.jpg or /images/arties/arti-...">
                        <div class="form-text text-muted">Or enter an image URL or local storage path.</div>
                        @error('image_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="audio_url" class="form-label fw-bold">Audio URL <span class="text-muted fw-normal">(Optional)</span></label>
                        <input type="text" class="form-control @error('audio_url') is-invalid @enderror" id="audio_url" name="audio_url" value="{{ old('audio_url', $aarti->audio_url) }}" placeholder="https://example.com/audio.mp3">
                        @error('audio_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="video_url" class="form-label fw-bold">Video URL (ID) <span class="text-muted fw-normal">(Optional)</span></label>
                        <input type="text" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url', $aarti->video_url) }}" placeholder="YouTube Video ID or link, e.g. y25k2S9n_4Y">
                        @error('video_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h5 class="fw-bold mb-3 mt-3 text-primary border-bottom pb-2">Lyrics</h5>
                <div class="mb-3">
                    <label for="lyrics" class="form-label fw-bold">Main Lyrics <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('lyrics') is-invalid @enderror" id="lyrics" name="lyrics" rows="8" required>{{ old('lyrics', $aarti->lyrics) }}</textarea>
                    <div class="form-text text-muted">Please provide the primary lyrics with verses separated by blank lines.</div>
                    @error('lyrics')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lyrics_hindi_plain" class="form-label fw-bold">Lyrics in Hindi Plain Text <span class="text-muted fw-normal">(Optional)</span></label>
                    <textarea class="form-control @error('lyrics_hindi_plain') is-invalid @enderror" id="lyrics_hindi_plain" name="lyrics_hindi_plain" rows="8">{{ old('lyrics_hindi_plain', $aarti->lyrics_hindi_plain) }}</textarea>
                    <div class="form-text text-muted">Plain Hindi Devanagari text representation for reading.</div>
                    @error('lyrics_hindi_plain')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lyrics_hinglish" class="form-label fw-bold">Lyrics in Hinglish / English Transliteration <span class="text-muted fw-normal">(Optional)</span></label>
                    <textarea class="form-control @error('lyrics_hinglish') is-invalid @enderror" id="lyrics_hinglish" name="lyrics_hinglish" rows="8">{{ old('lyrics_hinglish', $aarti->lyrics_hinglish) }}</textarea>
                    <div class="form-text text-muted">Transliterated Roman script for users who cannot read Devanagari script.</div>
                    @error('lyrics_hinglish')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <h5 class="fw-bold mb-3 mt-3 text-primary border-bottom pb-2">Status & Features</h5>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $aarti->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold" for="is_active">Active</label>
                            <div class="form-text text-muted">If inactive, this Aarti will not be accessible via the API or mobile app.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_popular" name="is_popular" value="1" {{ old('is_popular', $aarti->is_popular ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold" for="is_popular">Popular Aarti (Featured)</label>
                            <div class="form-text text-muted">Mark as a popular / top featured Aarti on the home screen.</div>
                        </div>
                    </div>
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
