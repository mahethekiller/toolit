@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Prayer Histories Log</h2>

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
                            <th>Aarti Title</th>
                            <th>Date & Time Played</th>
                            <th>Duration Played</th>
                            <th class="text-end px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($histories as $history)
                        <tr>
                            <td>{{ $history->user->email ?? 'N/A' }}</td>
                            <td class="fw-bold">{{ $history->aarti->title ?? 'Deleted Aarti' }}</td>
                            <td>{{ $history->played_at }}</td>
                            <td>{{ $history->duration_played }} seconds</td>
                            <td class="text-end px-4">
                                <form action="{{ route('admin.arti.histories.destroy', $history->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this prayer log?');">
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
                            <td colspan="5" class="text-center py-4 text-muted">No prayer history logs found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $histories->links() }}
    </div>
</div>
@endsection
