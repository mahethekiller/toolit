@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h3 class="mb-4">📨 Message from {{ $contactMessage->name }}</h3>

    <div class="card shadow-sm border-0 p-4">
        <p><strong>Name:</strong> {{ $contactMessage->name }}</p>
        <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
        <p><strong>Subject:</strong> {{ $contactMessage->subject }}</p>
        <p><strong>Received At:</strong> {{ $contactMessage->created_at->format('d M Y, h:i A') }}</p>
        <hr>
        <p><strong>Message:</strong></p>
        <div class="p-3 bg-light rounded">{{ $contactMessage->message }}</div>
        <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline-secondary mt-4">← Back to Messages</a>
    </div>
</div>
@endsection
