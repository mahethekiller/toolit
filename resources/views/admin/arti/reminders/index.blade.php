@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Active Reminders</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>User Email</th>
                            <th>Reminder Title</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th class="text-end px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($reminders as $reminder)
                        <tr>
                            <td>{{ $reminder->user->email ?? 'N/A' }}</td>
                            <td class="fw-bold">{{ $reminder->title }}</td>
                            <td class="fw-bold text-primary">{{ $reminder->time }}</td>
                            <td>
                                @if($reminder->is_enabled)
                                    <span class="badge bg-success">Enabled</span>
                                @else
                                    <span class="badge bg-danger">Disabled</span>
                                @endif
                            </td>
                            <td class="text-end px-4">
                                <form action="{{ route('admin.arti.reminders.destroy', $reminder->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this reminder?');">
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
                            <td colspan="5" class="text-center py-4 text-muted">No reminders found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $reminders->links() }}
    </div>
</div>
@endsection
