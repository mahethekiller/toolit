@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Manage Roles</h2>

    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary mb-3">+ Add Role</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $roles->links() }}
</div>
@endsection
