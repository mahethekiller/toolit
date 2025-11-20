@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Project Name *</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name', $project->name) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="link" class="form-label">Project Link</label>
                        <input type="url" class="form-control" id="link" name="link"
                               value="{{ old('link', $project->link) }}">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description *</label>
                <textarea class="form-control" id="description" name="description" rows="4"
                          required>{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="technologies" class="form-label">Technologies Used *</label>
                <div id="technologies-container">
                    @foreach($project->technologies as $index => $technology)
                    <div class="input-group mb-2 technology-item">
                        <input type="text" class="form-control" name="technologies[]"
                               value="{{ $technology }}" required>
                        <button type="button" class="btn btn-outline-danger remove-technology">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
                <button type="button" id="add-technology" class="btn btn-sm btn-outline-primary mt-2">
                    <i class="fas fa-plus me-1"></i> Add Technology
                </button>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Project Image</label>

                        <!-- Current Image -->
                        @if($project->image)
                        <div class="mb-2">
                            <label class="form-label">Current Image:</label>
                            <div>
                                <img src="{{ asset('storage/' . $project->image) }}"
                                     alt="{{ $project->name }}"
                                     style="max-width: 200px; max-height: 200px; border-radius: 4px;">
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="remove_image" name="remove_image" value="1">
                                <label class="form-check-label" for="remove_image">
                                    Remove current image
                                </label>
                            </div>
                        </div>
                        @endif

                        <input type="file" class="form-control" id="image" name="image"
                               accept="image/jpeg,image/png,image/jpg,image/gif">
                        <div class="form-text">
                            Recommended: Square image (500x500px), Max: 2MB
                        </div>
                    </div>

                    <!-- New Image Preview -->
                    <div id="image-preview" class="mt-2" style="display: none;">
                        <label class="form-label">New Image Preview:</label>
                        <img id="preview" src="#" alt="Image preview"
                             style="max-width: 200px; max-height: 200px; border-radius: 4px;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control" id="sort_order" name="sort_order"
                               value="{{ old('sort_order', $project->sort_order) }}">
                        <div class="form-text">Lower numbers appear first</div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
                               {{ old('is_active', $project->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active (Visible on portfolio)</label>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Project</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
// Add/Remove Technology Fields
document.getElementById('add-technology').addEventListener('click', function() {
    const container = document.getElementById('technologies-container');
    const newItem = document.createElement('div');
    newItem.className = 'input-group mb-2 technology-item';
    newItem.innerHTML = `
        <input type="text" class="form-control" name="technologies[]" required placeholder="e.g., Laravel, React, MySQL">
        <button type="button" class="btn btn-outline-danger remove-technology">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(newItem);
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-technology')) {
        e.target.closest('.technology-item').remove();
    }
});

// Image Preview for new image
document.getElementById('image').addEventListener('change', function(e) {
    const preview = document.getElementById('preview');
    const previewContainer = document.getElementById('image-preview');
    const file = e.target.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.style.display = 'block';
        }

        reader.readAsDataURL(file);
    } else {
        previewContainer.style.display = 'none';
    }
});

// Handle remove image checkbox
document.getElementById('remove_image')?.addEventListener('change', function(e) {
    if (e.target.checked) {
        document.getElementById('image').required = false;
    }
});
</script>
@endpush
@endsection
