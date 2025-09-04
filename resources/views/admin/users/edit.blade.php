@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2>Edit Roles for {{ $user->name }}</h2>

    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Roles</label>
            <select name="roles[]" class="form-select" multiple>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}"
                        {{ $user->roles->pluck('name')->contains($role->name) ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
