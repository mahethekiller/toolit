@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>FAQ Groups</h2>
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add FAQ Group
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($faqs->isEmpty())
        <div class="alert alert-info">No FAQ groups found.</div>
    @else
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Group Name</th>
                            <th>Total FAQs</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $groupName => $groupFaqs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $groupName }}</td>
                                <td>{{ $groupFaqs->count() }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.faqs.edit', $groupName) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.faqs.destroy', $groupName) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this group?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
