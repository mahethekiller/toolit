@extends('layouts.app')

@section('content')
<h2>Image Compressor</h2>
<p class="text-muted">Upload an image and compress it while keeping quality.</p>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@if(session('file'))
    <a href="{{ asset(session('file')) }}" class="btn btn-success" download>Download Compressed Image</a>
@endif
@endif

<form method="POST" action="" enctype="multipart/form-data" class="mt-3">
    @csrf
    <div class="mb-3">
        <input type="file" name="image" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Compress</button>
</form>
@endsection
