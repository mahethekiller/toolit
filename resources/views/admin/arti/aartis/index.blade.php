@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Aartis</h2>
        <a href="{{ route('admin.arti.aartis.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Add Aarti
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Deity</th>
                            <th>Category</th>
                            <th>Duration</th>
                            <th class="text-end px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($aartis as $aarti)
                        <tr>
                            <td>
                                <div class="fw-bold">{{ $aarti->title }}</div>
                                <div class="text-muted small">{{ $aarti->subtitle }}</div>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $aarti->deity->name ?? 'None' }}</span>
                            </td>
                            <td>{{ $aarti->category }}</td>
                            <td>{{ $aarti->duration }}</td>
                            <td class="text-end px-4">
                                <a href="{{ route('admin.arti.aartis.edit', $aarti->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.arti.aartis.destroy', $aarti->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this aarti?');">
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
                            <td colspan="5" class="text-center py-4 text-muted">No aartis found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $aartis->links() }}
    </div>
</div>
@endsection
