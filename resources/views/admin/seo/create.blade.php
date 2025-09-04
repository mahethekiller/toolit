@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3 class="mb-4">Add New SEO</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.seo.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Page URL (full or relative)</label>
                <input type="text" name="url" value="{{ old('url') }}" class="form-control"
                    placeholder="e.g., /tools/case-converter">
            </div>


            <div class="mb-3">
                <label class="form-label">Page Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Meta Keywords</label>
                <input type="text" name="keywords" value="{{ old('keywords') }}" class="form-control"
                    placeholder="comma-separated">
            </div>

            <div class="mb-3">
                <label class="form-label">OG Title</label>
                <input type="text" name="og_title" value="{{ old('og_title') }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">OG Description</label>
                <textarea name="og_description" class="form-control" rows="2">{{ old('og_description') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">OG Image URL</label>
                <input type="text" name="og_image" value="{{ old('og_image') }}" class="form-control"
                    placeholder="Optional">
            </div>

            <div class="mb-3">
                <label class="form-label">Canonical URL</label>
                <input type="text" name="canonical" value="{{ old('canonical') }}" class="form-control"
                    placeholder="Optional, auto uses current page URL">
            </div>

            <button type="submit" class="btn btn-success">Create SEO</button>
            <a href="{{ route('admin.seo.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
