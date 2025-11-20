@extends('layouts.admin')

@section('title', 'Manage Skills')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Skills</h4>
    <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add Skill
    </a>
</div>

<div class="card">
    <div class="card-body">
        <!-- Category Tabs -->
        <ul class="nav nav-tabs mb-4" id="skillTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">
                    All Skills
                </button>
            </li>
            @foreach($categories as $category)
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="{{ $category }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $category }}" type="button" role="tab">
                    {{ ucfirst($category) }}
                </button>
            </li>
            @endforeach
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="skillTabsContent">
            <!-- All Skills Tab -->
            <div class="tab-pane fade show active" id="all" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Level</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($skills as $skill)
                            <tr>
                                <td>{{ $skill->name }}</td>
                                <td>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar bg-success" role="progressbar"
                                             style="width: {{ $skill->level }}%;"
                                             aria-valuenow="{{ $skill->level }}"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                            {{ $skill->level }}%
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ ucfirst($skill->category) }}</span>
                                </td>
                                <td>{{ $skill->type ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge bg-{{ $skill->is_active ? 'success' : 'secondary' }}">
                                        {{ $skill->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ $skill->sort_order }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.skills.edit', $skill) }}"
                                           class="btn btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.skills.toggle-status', $skill) }}"
                                              method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-{{ $skill->is_active ? 'warning' : 'success' }}">
                                                <i class="fas fa-{{ $skill->is_active ? 'eye-slash' : 'eye' }}"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.skills.destroy', $skill) }}"
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
                                <td colspan="7" class="text-center">No skills found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Category Tabs -->
            @foreach($categories as $category)
            <div class="tab-pane fade" id="{{ $category }}" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Level</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $categorySkills = $skills->where('category', $category);
                            @endphp
                            @forelse($categorySkills as $skill)
                            <tr>
                                <td>{{ $skill->name }}</td>
                                <td>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar bg-success" role="progressbar"
                                             style="width: {{ $skill->level }}%;"
                                             aria-valuenow="{{ $skill->level }}"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                            {{ $skill->level }}%
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $skill->type ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge bg-{{ $skill->is_active ? 'success' : 'secondary' }}">
                                        {{ $skill->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ $skill->sort_order }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.skills.edit', $skill) }}"
                                           class="btn btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.skills.toggle-status', $skill) }}"
                                              method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-{{ $skill->is_active ? 'warning' : 'success' }}">
                                                <i class="fas fa-{{ $skill->is_active ? 'eye-slash' : 'eye' }}"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.skills.destroy', $skill) }}"
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
                                <td colspan="6" class="text-center">No {{ $category }} skills found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mt-4">
    @foreach($categories as $category)
    @php
        $categoryCount = $skills->where('category', $category)->count();
        $activeCategoryCount = $skills->where('category', $category)->where('is_active', true)->count();
    @endphp
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title text-uppercase text-muted">{{ ucfirst($category) }} Skills</h6>
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $categoryCount }}</h4>
                    <span class="badge bg-success">{{ $activeCategoryCount }} Active</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@push('scripts')
<script>
// Initialize tabs
var triggerTabList = [].slice.call(document.querySelectorAll('#skillTabs button'))
triggerTabList.forEach(function (triggerEl) {
    var tabTrigger = new bootstrap.Tab(triggerEl)

    triggerEl.addEventListener('click', function (event) {
        event.preventDefault()
        tabTrigger.show()
    })
})
</script>
@endpush
