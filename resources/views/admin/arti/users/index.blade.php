@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Manage App Users (API)</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gotra</th>
                            <th>Rashi</th>
                            <th>Streak Count</th>
                            <th>Last Prayer</th>
                            <th class="text-end px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="fw-bold">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->gotra ?? 'N/A' }}</td>
                            <td>{{ $user->rashi ?? 'N/A' }}</td>
                            <td>
                                <span class="badge bg-success">🔥 {{ $user->streak_count }} days</span>
                            </td>
                            <td>{{ $user->last_prayer_date ? $user->last_prayer_date->toDateString() : 'Never' }}</td>
                            <td class="text-end px-4">
                                <a href="{{ route('admin.arti.users.show', $user->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="fas fa-eye"></i> View Profile
                                </a>
                                <form action="{{ route('admin.arti.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user? All their favorites, reminders, and history will be deleted.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">No API users found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection
