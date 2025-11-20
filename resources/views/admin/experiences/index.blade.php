@extends('layouts.admin')

@section('title', 'Manage Experiences')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Experiences</h4>
    <a href="{{ route('admin.experiences.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add Experience
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Company</th>
                        <th>Period</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($experiences as $experience)
                    <tr>
                        <td>{{ $experience->position }}</td>
                        <td>{{ $experience->company }}</td>
                        <td>{{ $experience->period }}</td>
                        <td>
                            <span class="badge bg-{{ $experience->is_active ? 'success' : 'secondary' }}">
                                {{ $experience->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $experience->sort_order }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.experiences.edit', $experience) }}"
                                   class="btn btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.experiences.toggle-status', $experience) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-{{ $experience->is_active ? 'warning' : 'success' }}">
                                        <i class="fas fa-{{ $experience->is_active ? 'eye-slash' : 'eye' }}"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.experiences.destroy', $experience) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger"
                                            onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No experiences found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
