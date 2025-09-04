@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3 class="mb-4">Edit SEO for: <strong>{{ $seo->page_slug }}</strong></h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.seo.update', $seo) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Page URL (full or relative)</label>
                <input type="text" name="url" value="{{ old('url', $seo->url) }}" class="form-control"
                    placeholder="e.g., /tools/case-converter">
            </div>



            <div class="mb-3">
                <label class="form-label">Page Title</label>
                <input type="text" name="title" value="{{ old('title', $seo->title) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $seo->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Meta Keywords (comma-separated)</label>
                <input type="text" name="keywords" value="{{ old('keywords', $seo->keywords) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">OG Title</label>
                <input type="text" name="og_title" value="{{ old('og_title', $seo->og_title) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">OG Description</label>
                <textarea name="og_description" class="form-control" rows="2">{{ old('og_description', $seo->og_description) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">OG Image URL</label>
                <input type="text" name="og_image" value="{{ old('og_image', $seo->og_image) }}" class="form-control"
                    placeholder="Optional">
            </div>

            <div class="mb-3">
                <label class="form-label">Canonical URL</label>
                <input type="text" name="canonical" value="{{ old('canonical', $seo->canonical) }}" class="form-control"
                    placeholder="Optional, auto uses current page URL">
            </div>

            <button type="submit" class="btn btn-success">Update SEO</button>
            <a href="{{ route('admin.seo.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
