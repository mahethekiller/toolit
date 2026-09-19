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

    <form id="bulk-form" action="{{ route('admin.arti.aartis.bulk_toggle') }}" method="POST">
        @csrf
        <div class="mb-3 d-flex gap-2">
            <button type="submit" name="action" value="enable" class="btn btn-sm btn-outline-success">
                <i class="fas fa-check-circle me-1"></i> Enable Selected
            </button>
            <button type="submit" name="action" value="disable" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-ban me-1"></i> Disable Selected
            </button>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 40px;" class="text-center">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Deity</th>
                                <th>Category</th>
                                <th>Duration</th>
                                <th class="text-end px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($aartis as $aarti)
                            <tr>
                                <td class="text-center">
                                    <input class="form-check-input aarti-checkbox" type="checkbox" name="aarti_ids[]" value="{{ $aarti->id }}">
                                </td>
                                <td>
                                    <div class="fw-bold">{{ $aarti->title }}</div>
                                    <div class="text-muted small">{{ $aarti->subtitle }}</div>
                                </td>
                                <td>
                                    @if($aarti->is_active ?? true)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
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
                                    <!-- Delete form must be separate from bulk form, but we can't nest forms. 
                                         Using a button that submits via JS instead. -->
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="if(confirm('Are you sure you want to delete this aarti?')) { document.getElementById('delete-form-{{ $aarti->id }}').submit(); }">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No aartis found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>

    @foreach($aartis as $aarti)
        <form id="delete-form-{{ $aarti->id }}" action="{{ route('admin.arti.aartis.destroy', $aarti->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endforeach

    <script>
        document.getElementById('select-all').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.aarti-checkbox');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });
    </script>

    <div class="mt-4">
        {{ $aartis->links() }}
    </div>
</div>
@endsection
