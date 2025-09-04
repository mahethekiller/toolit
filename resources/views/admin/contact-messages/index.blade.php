@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h3 class="mb-4">📬 Contact Messages</h3>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Received At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                        <tr class="{{ $msg->status === 'new' ? 'fw-bold' : '' }}">
                            <td>{{ $msg->id }}</td>
                            <td>{{ $msg->name }}</td>
                            <td>{{ $msg->email }}</td>
                            <td>{{ $msg->subject }}</td>
                            <td>
                                @if($msg->status === 'new')
                                    <span class="badge bg-success">New</span>
                                @else
                                    <span class="badge bg-secondary">Read</span>
                                @endif
                            </td>
                            <td>{{ $msg->created_at->format('d M Y, h:i A') }}</td>
                            <td>
                                <a href="{{ route('admin.contact-messages.show', $msg->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No messages found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $messages->links() }}
        </div>
    </div>
</div>
@endsection
