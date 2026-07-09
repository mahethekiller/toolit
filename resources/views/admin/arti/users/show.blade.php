@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <a href="{{ route('admin.arti.users.index') }}" class="text-decoration-none">
            <i class="fas fa-arrow-left me-1"></i> Back to Users
        </a>
        <h2 class="mt-2">User Profile: {{ $user->name }}</h2>
    </div>

    @if(session('generated_token'))
        <div class="alert alert-warning border-warning shadow-sm mb-4">
            <h5 class="alert-heading fw-bold"><i class="fas fa-key me-2"></i> API Token Auto-Generated!</h5>
            <p class="mb-2">Copy this token now. It will not be shown again:</p>
            <div class="input-group mb-1">
                <input type="text" id="apiTokenInput" class="form-control font-monospace" value="{{ session('generated_token') }}" readonly>
                <button class="btn btn-dark" type="button" onclick="navigator.clipboard.writeText(document.getElementById('apiTokenInput').value); this.innerHTML = '<i class=\'fas fa-check\'></i> Copied!';">
                    <i class="fas fa-copy me-1"></i> Copy
                </button>
            </div>
        </div>
    @endif

    <div class="row">
        <!-- User Details Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-3">Personal Details</h5>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted">Email</span>
                            <span class="fw-bold">{{ $user->email }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted">Gotra</span>
                            <span class="fw-bold">{{ $user->gotra ?? 'N/A' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted">Rashi</span>
                            <span class="fw-bold">{{ $user->rashi ?? 'N/A' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted">Prayer Streak</span>
                            <span class="badge bg-success">🔥 {{ $user->streak_count }} days</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted">Last Prayer</span>
                            <span class="fw-bold">{{ $user->last_prayer_date ? $user->last_prayer_date->toDateString() : 'Never' }}</span>
                        </li>
                    </ul>
                    <hr>
                    <h6 class="fw-bold mb-2">Developer Tools</h6>
                    <form action="{{ route('admin.arti.users.generate-token', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm w-100 rounded-pill">
                            <i class="fas fa-key me-1"></i> Generate API Token
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Reminders Card -->
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-3">Active Reminders</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Scheduled Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($user->reminders as $reminder)
                                <tr>
                                    <td>{{ $reminder->title }}</td>
                                    <td class="fw-bold text-primary">{{ $reminder->time }}</td>
                                    <td>
                                        @if($reminder->is_enabled)
                                            <span class="badge bg-success">Enabled</span>
                                        @else
                                            <span class="badge bg-danger">Disabled</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-3 text-muted">No reminders set.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Prayer Histories Log -->
    <div class="card shadow-sm border-0 mt-2">
        <div class="card-body">
            <h5 class="card-title fw-bold mb-3">Prayer Log History</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Aarti Title</th>
                            <th>Date & Time Played</th>
                            <th>Duration Played</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($user->prayerHistories as $history)
                        <tr>
                            <td class="fw-bold">{{ $history->aarti->title ?? 'Deleted Aarti' }}</td>
                            <td>{{ $history->played_at }}</td>
                            <td>{{ $history->duration_played }} seconds</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-3 text-muted">No prayers logged yet.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
