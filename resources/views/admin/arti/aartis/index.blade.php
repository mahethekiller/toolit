@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Manage Aartis</h2>
            <div class="text-muted small">Total: {{ $aartis->total() }} {{ Str::plural('aarti', $aartis->total()) }} found</div>
        </div>
        <a href="{{ route('admin.arti.aartis.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Add Aarti
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Filters Section -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-3">
            <form method="GET" action="{{ route('admin.arti.aartis.index') }}">
                <div class="row g-2 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label small fw-bold text-muted mb-1">Search</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text"><i class="fas fa-search text-muted"></i></span>
                            <input type="text" name="search" class="form-control" placeholder="Title, subtitle, lyrics..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-bold text-muted mb-1">Deity</label>
                        <select name="deity_id" class="form-select form-select-sm">
                            <option value="">All Deities</option>
                            @foreach($deities as $deity)
                                <option value="{{ $deity->id }}" {{ request('deity_id') == $deity->id ? 'selected' : '' }}>{{ $deity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-bold text-muted mb-1">Category</label>
                        <select name="category" class="form-select form-select-sm">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-bold text-muted mb-1">Status</label>
                        <select name="status" class="form-select form-select-sm">
                            <option value="">All Status</option>
                            <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-bold text-muted mb-1">Media</label>
                        <select name="media" class="form-select form-select-sm">
                            <option value="">All Media</option>
                            <option value="has_audio" {{ request('media') === 'has_audio' ? 'selected' : '' }}>With Audio</option>
                            <option value="no_audio" {{ request('media') === 'no_audio' ? 'selected' : '' }}>Without Audio</option>
                            <option value="has_video" {{ request('media') === 'has_video' ? 'selected' : '' }}>With Video</option>
                            <option value="no_video" {{ request('media') === 'no_video' ? 'selected' : '' }}>Without Video</option>
                        </select>
                    </div>
                    <div class="col-md-1 d-flex gap-1">
                        <button type="submit" class="btn btn-sm btn-primary w-100" title="Apply Filters">
                            <i class="fas fa-filter"></i>
                        </button>
                        @if(request()->hasAny(['search', 'deity_id', 'category', 'status', 'media']))
                            <a href="{{ route('admin.arti.aartis.index') }}" class="btn btn-sm btn-outline-secondary" title="Reset Filters">
                                <i class="fas fa-undo"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <form id="bulk-form" action="{{ route('admin.arti.aartis.bulk_toggle') }}" method="POST">
        @csrf
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <div class="d-flex gap-2">
                <button type="submit" name="action" value="enable" class="btn btn-sm btn-outline-success">
                    <i class="fas fa-check-circle me-1"></i> Enable Selected
                </button>
                <button type="submit" name="action" value="disable" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-ban me-1"></i> Disable Selected
                </button>
            </div>
            @if(request()->hasAny(['search', 'deity_id', 'category', 'status', 'media']))
                <div class="small text-muted">
                    <span>Active Filters:</span>
                    @if(request('search'))
                        <span class="badge bg-light text-dark border">"{{ request('search') }}"</span>
                    @endif
                    @if(request('deity_id'))
                        <span class="badge bg-light text-dark border">Deity: {{ $deities->firstWhere('id', request('deity_id'))->name ?? request('deity_id') }}</span>
                    @endif
                    @if(request('category'))
                        <span class="badge bg-light text-dark border">Cat: {{ request('category') }}</span>
                    @endif
                    @if(request('status'))
                        <span class="badge bg-light text-dark border">Status: {{ ucfirst(request('status')) }}</span>
                    @endif
                    @if(request('media'))
                        <span class="badge bg-light text-dark border">Media: {{ str_replace('_', ' ', request('media')) }}</span>
                    @endif
                    <a href="{{ route('admin.arti.aartis.index') }}" class="text-danger ms-1 text-decoration-none small"><i class="fas fa-times-circle"></i> Clear all</a>
                </div>
            @endif
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
                                <th>Media</th>
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
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        @if(!empty($aarti->audio_url))
                                            <span class="badge bg-light text-success border border-success-subtle" title="Audio URL available">
                                                <i class="fas fa-music me-1"></i> Audio
                                            </span>
                                        @else
                                            <span class="badge bg-light text-muted border" title="No Audio URL">
                                                <i class="fas fa-music text-muted me-1"></i> None
                                            </span>
                                        @endif
                                        @if(!empty($aarti->video_url))
                                            <span class="badge bg-light text-danger border border-danger-subtle" title="Video URL available">
                                                <i class="fab fa-youtube me-1"></i> Video
                                            </span>
                                        @endif
                                    </div>
                                </td>
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
                                <td colspan="8" class="text-center py-4 text-muted">No aartis found matching your criteria.</td>
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
