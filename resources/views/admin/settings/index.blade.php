@extends('layouts.admin')

@section('title', 'General Settings')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.settings.update', $settings) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <h5 class="mb-3">Personal Information</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="full_name" name="full_name"
                                       value="{{ old('full_name', $settings->full_name) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="designation" class="form-label">Designation *</label>
                                <input type="text" class="form-control" id="designation" name="designation"
                                       value="{{ old('designation', $settings->designation) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="intro" class="form-label">Introduction *</label>
                        <textarea class="form-control" id="intro" name="intro" rows="2"
                                  required placeholder="Short introduction shown below your name">{{ old('intro', $settings->intro) }}</textarea>
                        <div class="form-text">This appears below your name in the hero section.</div>
                    </div>

                    <div class="mb-3">
                        <label for="about_me" class="form-label">About Me *</label>
                        <textarea class="form-control" id="about_me" name="about_me" rows="5"
                                  required placeholder="Detailed about me description">{{ old('about_me', $settings->about_me) }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{ old('email', $settings->email) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone *</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       value="{{ old('phone', $settings->phone) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="location" class="form-label">Location *</label>
                                <input type="text" class="form-control" id="location" name="location"
                                       value="{{ old('location', $settings->location) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth *</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                       value="{{ old('date_of_birth', $settings->date_of_birth ? $settings->date_of_birth->format('Y-m-d') : '') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h5 class="mb-3">Profile Image</h5>

                    <div class="text-center mb-3">
                        @if($settings->profile_image)
                            <img src="{{ $settings->getProfileImageUrl() }}"
                                 alt="Profile Image"
                                 class="img-fluid rounded-circle mb-3"
                                 style="width: 200px; height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                                 style="width: 200px; height: 200px;">
                                <i class="fas fa-user fa-3x text-muted"></i>
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="profile_image" class="form-label">Upload New Image</label>
                        <input type="file" class="form-control" id="profile_image" name="profile_image"
                               accept="image/jpeg,image/png,image/jpg,image/gif">
                        <div class="form-text">Recommended: 300x300px, Square image</div>
                    </div>

                    @if($settings->profile_image)
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="remove_profile_image" name="remove_profile_image" value="1">
                        <label class="form-check-label" for="remove_profile_image">
                            Remove current image
                        </label>
                    </div>
                    @endif
                </div>
            </div>

            <hr class="my-4">

            <h5 class="mb-3">Social Links</h5>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="url" class="form-control" id="website" name="website"
                               value="{{ old('website', $settings->website) }}" placeholder="https://example.com">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="url" class="form-control" id="linkedin" name="linkedin"
                               value="{{ old('linkedin', $settings->linkedin) }}" placeholder="https://linkedin.com/in/username">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="github" class="form-label">GitHub</label>
                        <input type="url" class="form-control" id="github" name="github"
                               value="{{ old('github', $settings->github) }}" placeholder="https://github.com/username">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Additional Social Links</label>
                <div id="social-links-container">
                    @php
                        $socialLinks = $settings->social_links ?? [];
                    @endphp
                    @foreach($socialLinks as $index => $link)
                    <div class="social-link-item card mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="social_links[{{ $index }}][name]"
                                           value="{{ $link['name'] }}" placeholder="Platform Name" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="url" class="form-control" name="social_links[{{ $index }}][url]"
                                           value="{{ $link['url'] }}" placeholder="https://example.com" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="social_links[{{ $index }}][icon]"
                                           value="{{ $link['icon'] }}" placeholder="fab fa-icon" required>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-outline-danger remove-social-link">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button type="button" id="add-social-link" class="btn btn-sm btn-outline-primary mt-2">
                    <i class="fas fa-plus me-1"></i> Add Social Link
                </button>
                <div class="form-text">
                    Use Font Awesome icon classes (e.g., fab fa-twitter, fab fa-instagram, fas fa-globe)
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
                <button type="submit" class="btn btn-primary">Save Settings</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
let socialLinkIndex = {{ count($socialLinks) }};

document.getElementById('add-social-link').addEventListener('click', function() {
    const container = document.getElementById('social-links-container');
    const newItem = document.createElement('div');
    newItem.className = 'social-link-item card mb-2';
    newItem.innerHTML = `
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="social_links[${socialLinkIndex}][name]"
                           placeholder="Platform Name" required>
                </div>
                <div class="col-md-4">
                    <input type="url" class="form-control" name="social_links[${socialLinkIndex}][url]"
                           placeholder="https://example.com" required>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="social_links[${socialLinkIndex}][icon]"
                           placeholder="fab fa-icon" required>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-outline-danger remove-social-link">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    `;
    container.appendChild(newItem);
    socialLinkIndex++;
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-social-link')) {
        e.target.closest('.social-link-item').remove();
    }
});

// Image preview for profile image
document.getElementById('profile_image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // You can add image preview functionality here if needed
            console.log('New image selected:', e.target.result);
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endpush
@endsection
