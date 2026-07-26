@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800 fw-bold">📊 Tool Usage Analytics</h1>
            <p class="text-muted mb-0">Track visitor interactions, popular tools, and usage statistics in real time.</p>
        </div>
    </div>

    <!-- KPI Metrics Cards -->
    <div class="row g-3 mb-4">
        <!-- Total Hits -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 rounded-4" style="background: #ffffff;">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3 text-primary">
                        <i class="fas fa-mouse-pointer fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1 text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 1px;">Total Hits</h6>
                        <h3 class="mb-0 fw-bold text-dark">{{ number_format($totalHits) }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Unique Visitors -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 rounded-4" style="background: #ffffff;">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3 text-success">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1 text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 1px;">Unique IPs</h6>
                        <h3 class="mb-0 fw-bold text-dark">{{ number_format($uniqueIps) }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Tool -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 rounded-4" style="background: #ffffff;">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3 text-warning">
                        <i class="fas fa-crown fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1 text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 1px;">Top Active Tool</h6>
                        <h3 class="mb-0 fw-bold text-dark text-truncate" style="max-width: 180px;" title="{{ $topToolName }} ({{ $topToolCount }} hits)">
                            {{ $topToolName }}
                        </h3>
                        <small class="text-muted">{{ number_format($topToolCount) }} hits</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ratio Views/Executions -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 rounded-4" style="background: #ffffff;">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="rounded-circle bg-info bg-opacity-10 p-3 me-3 text-info">
                        <i class="fas fa-exchange-alt fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1 text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 1px;">Usage Type</h6>
                        <h4 class="mb-0 fw-bold text-dark">
                            <span class="text-primary" title="Page views">{{ number_format($viewCount) }} V</span> 
                            / 
                            <span class="text-success" title="Executions">{{ number_format($executeCount) }} E</span>
                        </h4>
                        <small class="text-muted">Views vs Executions</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Row -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-4" style="background: #ffffff;">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0 fw-bold text-dark">📈 Daily Usage Trend (Past 30 Days)</h5>
                </div>
                <div class="card-body">
                    <div style="height: 320px; position: relative;">
                        <canvas id="usageChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Breakdown and Logs Row -->
    <div class="row g-4 mb-4">
        <!-- Tool Breakdown Table -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 rounded-4 h-100" style="background: #ffffff;">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0 fw-bold text-dark">🛠️ Tool-by-Tool Breakdown</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="px-4 py-3">Tool Name</th>
                                    <th class="py-3 text-center">Views</th>
                                    <th class="py-3 text-center">Executions</th>
                                    <th class="py-3 text-center">Total Hits</th>
                                    <th class="px-4 py-3 text-end">Unique IPs</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($toolsBreakdown as $tool)
                                    <tr>
                                        <td class="px-4 fw-semibold text-dark">{{ $tool->name }}</td>
                                        <td class="text-center text-primary">{{ number_format($tool->total_views) }}</td>
                                        <td class="text-center text-success">{{ number_format($tool->total_executions) }}</td>
                                        <td class="text-center fw-bold">{{ number_format($tool->total_hits) }}</td>
                                        <td class="px-4 text-end text-muted">{{ number_format($tool->unique_visitors) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">No tool breakdown data found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Logs Table -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 rounded-4 h-100" style="background: #ffffff;">
                <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 fw-bold text-dark">📋 Recent Usage Activity</h5>
                    <span class="badge bg-secondary rounded-pill">Real-time Feed</span>
                </div>
                <div class="card-body p-0">
                    @php
                    if (!function_exists('getReadableUserAgent')) {
                        function getReadableUserAgent($userAgent) {
                            if (empty($userAgent)) return 'Unknown';
                            $browser = 'Unknown';
                            $os = 'Unknown';

                            // Parse OS
                            if (preg_match('/windows|win32/i', $userAgent)) $os = 'Windows';
                            elseif (preg_match('/macintosh|mac os x/i', $userAgent)) $os = 'macOS';
                            elseif (preg_match('/android/i', $userAgent)) $os = 'Android';
                            elseif (preg_match('/iphone|ipad|ipod/i', $userAgent)) $os = 'iOS';
                            elseif (preg_match('/linux/i', $userAgent)) $os = 'Linux';

                            // Parse Browser
                            if (preg_match('/firefox/i', $userAgent)) $browser = 'Firefox';
                            elseif (preg_match('/chrome/i', $userAgent)) $browser = 'Chrome';
                            elseif (preg_match('/safari/i', $userAgent)) $browser = 'Safari';
                            elseif (preg_match('/edge|edg/i', $userAgent)) $browser = 'Edge';
                            elseif (preg_match('/opera|opr/i', $userAgent)) $browser = 'Opera';

                            return $browser . ' on ' . $os;
                        }
                    }
                    @endphp
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" style="font-size: 0.9rem;">
                            <thead class="table-light">
                                <tr>
                                    <th class="px-4 py-3">Tool</th>
                                    <th class="py-3">IP Address</th>
                                    <th class="py-3">Device / OS</th>
                                    <th class="py-3 text-center">Action</th>
                                    <th class="px-4 py-3 text-end">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentLogs as $log)
                                    <tr>
                                        <td class="px-4">
                                            <span class="fw-semibold text-dark">{{ $log->tool->name ?? 'Home/Index' }}</span>
                                        </td>
                                        <td class="text-muted">{{ $log->ip_address }}</td>
                                        <td class="text-truncate" style="max-width: 150px;" title="{{ $log->user_agent }}">
                                            {{ getReadableUserAgent($log->user_agent) }}
                                        </td>
                                        <td class="text-center">
                                            @if($log->action === 'execute')
                                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1">Process</span>
                                            @else
                                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1">View</span>
                                            @endif
                                        </td>
                                        <td class="px-4 text-end text-muted" style="font-size: 0.8rem;">
                                            {{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">No recent tool logs found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer bg-white border-0 px-4 py-3 d-flex justify-content-center">
                        {{ $recentLogs->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('usageChart').getContext('2d');
        
        const labels = {!! json_encode($chartLabels) !!};
        const data = {!! json_encode($chartData) !!};

        // Sleek primary dark fill gradient
        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(13, 110, 253, 0.3)');
        gradient.addColorStop(1, 'rgba(13, 110, 253, 0.01)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Usage Hits',
                    data: data,
                    backgroundColor: gradient,
                    borderColor: '#0d6efd',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#0d6efd',
                    pointHoverRadius: 7,
                    pointHoverBackgroundColor: '#0d6efd',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#212529',
                        titleColor: '#fff',
                        bodyColor: '#e9ecef',
                        padding: 12,
                        cornerRadius: 8,
                        displayColors: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#6c757d',
                            font: {
                                size: 11
                            }
                        }
                    },
                    y: {
                        grid: {
                            color: '#dee2e6'
                        },
                        ticks: {
                            color: '#6c757d',
                            font: {
                                size: 11
                            },
                            precision: 0
                        },
                        min: 0
                    }
                }
            }
        });
    });
</script>
@endpush
