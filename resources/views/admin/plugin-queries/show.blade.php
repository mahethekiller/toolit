@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="mb-4">
        <a href="{{ route('admin.plugin-queries.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Queries
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Message Details Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <span class="badge bg-dark-subtle text-dark-emphasis border">
                            <i class="fas fa-plug me-1"></i> {{ $pluginQuery->plugin_slug }}
                        </span>
                        <span class="text-muted small">
                            <i class="far fa-clock me-1"></i> {{ $pluginQuery->created_at->format('d M Y, h:i A') }}
                        </span>
                    </div>
                    <h4 class="card-title mt-3 mb-0">{{ $pluginQuery->subject }}</h4>
                </div>
                <div class="card-body py-4">
                    <div class="mb-4 bg-light p-3 rounded border border-light-subtle">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <span class="text-muted small d-block">From Name</span>
                                <strong class="text-dark">{{ $pluginQuery->name }}</strong>
                            </div>
                            <div class="col-sm-6">
                                <span class="text-muted small d-block">Email Address</span>
                                <a href="mailto:{{ $pluginQuery->email }}" class="text-primary text-decoration-none">
                                    <strong>{{ $pluginQuery->email }}</strong>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="message-content">
                        <span class="text-muted small d-block mb-2">Message Body</span>
                        <div class="p-3 bg-white rounded border" style="min-height: 150px; white-space: pre-wrap; line-height: 1.6;">{!! nl2br(e($pluginQuery->message)) !!}</div>
                    </div>
                </div>
                <div class="card-footer bg-white border-top py-3 d-flex justify-content-between flex-wrap gap-2">
                    <a href="mailto:{{ $pluginQuery->email }}?subject=Re: {{ rawurlencode($pluginQuery->subject) }}" class="btn btn-primary px-4">
                        <i class="fas fa-reply me-1"></i> Reply via Email
                    </a>
                    
                    <form action="{{ route('admin.plugin-queries.destroy', $pluginQuery->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this query?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fas fa-trash-alt me-1"></i> Delete Query
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Sidebar Info Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="card-title mb-0">Query Information</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted">Query ID</span>
                            <span class="fw-bold">#{{ $pluginQuery->id }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted">Status</span>
                            @if($pluginQuery->status === 'new')
                                <span class="badge bg-success">New</span>
                            @else
                                <span class="badge bg-secondary">Read</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted">Submitted At</span>
                            <span>{{ $pluginQuery->created_at->diffForHumans() }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
