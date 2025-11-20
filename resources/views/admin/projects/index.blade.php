@extends('layouts.admin')

@section('title', 'Manage Projects')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Projects</h4>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add Project
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Technologies</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td>
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}"
                                     alt="{{ $project->name }}"
                                     style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                     style="width: 60px; height: 60px; border-radius: 4px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $project->name }}</strong>
                        </td>
                        <td>
                            <span class="text-truncate d-inline-block" style="max-width: 200px;"
                                  title="{{ $project->description }}">
                                {{ Str::limit($project->description, 50) }}
                            </span>
                        </td>
                        <td>
                            @foreach(array_slice($project->technologies, 0, 3) as $tech)
                                <span class="badge bg-secondary mb-1">{{ $tech }}</span>
                            @endforeach
                            @if(count($project->technologies) > 3)
                                <span class="badge bg-light text-dark">+{{ count($project->technologies) - 3 }} more</span>
                            @endif
                        </td>
                        <td>
                            @if($project->link)
                                <a href="{{ $project->link }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            @else
                                <span class="text-muted">No Link</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-{{ $project->is_active ? 'success' : 'secondary' }}">
                                {{ $project->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $project->sort_order }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                   class="btn btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.projects.toggle-status', $project) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-{{ $project->is_active ? 'warning' : 'success' }}">
                                        <i class="fas fa-{{ $project->is_active ? 'eye-slash' : 'eye' }}"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger"
                                            onclick="return confirm('Are you sure? This will also delete the project image.')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No projects found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mt-4">
    <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h6 class="card-title">Total Projects</h6>
                <h4 class="mb-0">{{ $projects->count() }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h6 class="card-title">Active Projects</h6>
                <h4 class="mb-0">{{ $projects->where('is_active', true)->count() }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h6 class="card-title">With Images</h6>
                <h4 class="mb-0">{{ $projects->whereNotNull('image')->count() }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h6 class="card-title">With Links</h6>
                <h4 class="mb-0">{{ $projects->whereNotNull('link')->count() }}</h4>
            </div>
        </div>
    </div>
</div>
@endsection
