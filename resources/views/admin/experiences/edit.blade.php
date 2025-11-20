@extends('layouts.admin')

@section('title', 'Edit Experience')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.experiences.update', $experience) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="position" class="form-label">Position *</label>
                        <input type="text" class="form-control" id="position" name="position"
                               value="{{ old('position', $experience->position) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="company" class="form-label">Company *</label>
                        <input type="text" class="form-control" id="company" name="company"
                               value="{{ old('company', $experience->company) }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="period" class="form-label">Period *</label>
                        <input type="text" class="form-control" id="period" name="period"
                               value="{{ old('period', $experience->period) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="location" class="form-label">Location *</label>
                        <input type="text" class="form-control" id="location" name="location"
                               value="{{ old('location', $experience->location) }}" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="responsibilities" class="form-label">Responsibilities *</label>
                <div id="responsibilities-container">
                    @foreach($experience->responsibilities as $index => $responsibility)
                    <div class="input-group mb-2 responsibility-item">
                        <input type="text" class="form-control" name="responsibilities[]"
                               value="{{ $responsibility }}" required>
                        <button type="button" class="btn btn-outline-danger remove-responsibility">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
                <button type="button" id="add-responsibility" class="btn btn-sm btn-outline-primary mt-2">
                    <i class="fas fa-plus me-1"></i> Add Responsibility
                </button>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control" id="sort_order" name="sort_order"
                               value="{{ old('sort_order', $experience->sort_order) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
                               {{ old('is_active', $experience->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.experiences.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Experience</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('add-responsibility').addEventListener('click', function() {
    const container = document.getElementById('responsibilities-container');
    const newItem = document.createElement('div');
    newItem.className = 'input-group mb-2 responsibility-item';
    newItem.innerHTML = `
        <input type="text" class="form-control" name="responsibilities[]" required>
        <button type="button" class="btn btn-outline-danger remove-responsibility">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(newItem);
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-responsibility')) {
        e.target.closest('.responsibility-item').remove();
    }
});
</script>
@endpush
@endsection
