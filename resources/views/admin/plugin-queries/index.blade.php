@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="m-0">🔌 Plugin Support Queries</h3>
        <span class="badge bg-primary px-3 py-2 fs-6">
            Total Queries: {{ $queries->total() }}
        </span>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Plugin</th>
                        <th>Status</th>
                        <th>Received At</th>
                        <th style="width: 180px;" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($queries as $query)
                        <tr class="{{ $query->status === 'new' ? 'fw-bold' : '' }}">
                            <td>{{ $query->id }}</td>
                            <td>{{ $query->name }}</td>
                            <td>
                                <a href="mailto:{{ $query->email }}" class="text-decoration-none text-muted">
                                    <i class="far fa-envelope me-1"></i> {{ $query->email }}
                                </a>
                            </td>
                            <td>{{ Str::limit($query->subject, 40) }}</td>
                            <td>
                                <span class="badge bg-dark-subtle text-dark-emphasis border">
                                    {{ $query->plugin_slug }}
                                </span>
                            </td>
                            <td>
                                @if($query->status === 'new')
                                    <span class="badge bg-success">New</span>
                                @else
                                    <span class="badge bg-secondary">Read</span>
                                @endif
                            </td>
                            <td>{{ $query->created_at->format('d M Y, h:i A') }}</td>
                            <td class="text-end">
                                <div class="btn-group">
                                    <a href="{{ route('admin.plugin-queries.show', $query->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <form action="{{ route('admin.plugin-queries.destroy', $query->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this query?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-5">
                                <i class="fas fa-inbox fs-1 mb-3 text-muted" style="opacity: 0.5;"></i>
                                <p class="mb-0">No plugin queries found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($queries->hasPages())
            <div class="card-footer bg-white border-top-0 py-3">
                {{ $queries->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
