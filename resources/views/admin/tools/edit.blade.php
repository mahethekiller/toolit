@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">✏️ Edit Tool</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.tools.update', $tool->id) }}" method="POST" class="card shadow-sm p-4">
            @csrf
            @method('PUT')

            <!-- Tool Name -->
            <div class="mb-3">
                <label class="form-label fw-bold">Tool Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $tool->name) }}" required>
            </div>

            <!-- URL -->
            <div class="mb-3">
                <label class="form-label fw-bold">URL</label>
                <input type="url" name="url" class="form-control" value="{{ old('url', $tool->url) }}" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $tool->description) }}</textarea>
            </div>

            <!-- Active -->
            <div class="form-check">
                <input type="hidden" name="active" value="0"> {{-- ensures unchecked sends 0 --}}
                <input type="checkbox" name="active" id="active" value="1" class="form-check-input"
                    {{ $tool->active ? 'checked' : '' }}>
                <label for="active" class="form-check-label">Active</label>
            </div>


            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    💾 Save Changes
                </button>
                <a href="{{ route('admin.tools.index') }}" class="btn btn-secondary ms-2">⬅ Back</a>
            </div>
        </form>
    </div>
@endsection
