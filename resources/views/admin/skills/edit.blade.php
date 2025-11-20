@extends('layouts.admin')

@section('title', 'Edit Skill')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Skill Name *</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name', $skill->name) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category *</label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $key => $label)
                            <option value="{{ $key }}" {{ old('category', $skill->category) == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="level" class="form-label">Proficiency Level *</label>
                        <input type="range" class="form-range" id="level" name="level"
                               min="0" max="100" value="{{ old('level', $skill->level) }}"
                               oninput="updateLevelValue(this.value)">
                        <div class="d-flex justify-content-between">
                            <small>0%</small>
                            <span id="levelValue" class="fw-bold">{{ old('level', $skill->level) }}%</span>
                            <small>100%</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="type" class="form-label">Skill Type</label>
                        <input type="text" class="form-control" id="type" name="type"
                               value="{{ old('type', $skill->type) }}">
                        <div class="form-text">Optional: Helps with further categorization</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control" id="sort_order" name="sort_order"
                               value="{{ old('sort_order', $skill->sort_order) }}">
                        <div class="form-text">Lower numbers appear first</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 form-check pt-4">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
                               {{ old('is_active', $skill->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active (Visible on portfolio)</label>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Skill</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function updateLevelValue(value) {
    document.getElementById('levelValue').textContent = value + '%';
}

// Initialize level display
document.addEventListener('DOMContentLoaded', function() {
    const levelInput = document.getElementById('level');
    updateLevelValue(levelInput.value);
});
</script>
@endpush
@endsection
