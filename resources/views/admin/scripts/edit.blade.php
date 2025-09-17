@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Site Scripts</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.scripts.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="head_code" class="form-label">Head Code (for &lt;head&gt;)</label>
            <textarea name="head_code" id="head_code" class="form-control code-editor" rows="4">{{ old('head_code', $scripts->head_code) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="body_code" class="form-label">Body Code (after &lt;body&gt;)</label>
            <textarea name="body_code" id="body_code" class="form-control code-editor" rows="4">{{ old('body_code', $scripts->body_code) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="footer_code" class="form-label">Footer Code (before &lt;/body&gt;)</label>
            <textarea name="footer_code" id="footer_code" class="form-control code-editor" rows="4">{{ old('footer_code', $scripts->footer_code) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">💾 Save Scripts</button>
    </form>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/material-darker.min.css">
<style>
    .CodeMirror {
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        min-height: 120px;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/xml/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/htmlmixed/htmlmixed.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.code-editor').forEach(function (textarea) {
            CodeMirror.fromTextArea(textarea, {
                lineNumbers: true,
                mode: "htmlmixed",
                theme: "material-darker",
                lineWrapping: true,
                tabSize: 2,
                indentWithTabs: true
            });
        });
    });
</script>
@endpush
