@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">API Token Generator</h2>

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

    <div class="card shadow-sm border-0 col-md-8">
        <div class="card-body p-4">
            <h5 class="card-title fw-bold mb-4">Generate Token for App User</h5>
            <form action="{{ route('admin.arti.users.generate-token-generator') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="user_id" class="form-label fw-bold">Select App User</label>
                    <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                        <option value="">Select User...</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', session('selected_user_id')) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary px-4">
                    <i class="fas fa-key me-1"></i> Generate New Token
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
