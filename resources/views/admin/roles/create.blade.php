@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2>Add Role</h2>

    <form method="POST" action="{{ route('admin.roles.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Role Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-success">Create</button>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
