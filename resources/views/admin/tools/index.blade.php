@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">🛠 Manage Tools</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Sync Button -->
        <form action="{{ route('admin.tools.sync') }}" method="POST" class="mb-3">
            @csrf
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-sync-alt"></i> Sync Tools
            </button>
        </form>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tool Name</th>
                            <th>Route Name</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dbTools as $tool)
                            <tr>
                                <td>{{ $tool->name }}</td>
                                <td>{{ $tool->route_name }}</td>
                                <td><a href="{{ $tool->url }}" target="_blank">{{ $tool->url }}</a></td>
                                <td>
                                    @if ($tool->active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.tools.edit', $tool->id) }}" class="btn btn-sm btn-warning">
                                        ✏️ Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No tools found. Click "Sync Tools" to
                                    import.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
