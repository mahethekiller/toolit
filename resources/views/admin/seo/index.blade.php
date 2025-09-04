@extends('layouts.admin')

@section('content')
<div class="container">
    <h3 class="mb-4">SEO Management</h3>

    <a href="{{ route('admin.seo.create') }}" class="btn btn-primary mb-3">+ Add New Page SEO</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>URL</th>
                <th>Title</th>
                <th>Description</th>
                <th>Canonical</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($seos as $seo)
            <tr>
                <td>{{ $seo->url }}</td>
                <td>{{ $seo->title }}</td>
                <td>{{ Str::limit($seo->description, 50) }}</td>
                <td>{{ $seo->canonical }}</td>
                <td>
                    <a href="{{ route('admin.seo.edit', $seo) }}" class="btn btn-sm btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
