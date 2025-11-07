@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Privacy Policy</h1>
    <p>Last updated: {{ date('F j, Y') }}</p>

    <p>At <strong>{{ config('app.name') }}</strong>, we respect your privacy and are committed to protecting your personal information. This policy outlines how we collect, use, and safeguard your data when you use our website and tools.</p>

    <h3>Information We Collect</h3>
    <p>We do not collect personally identifiable information (PII) unless you voluntarily provide it through forms or contact submissions. We may collect non-personal information such as browser type, device, and usage patterns to improve our services.</p>

    <h3>Cookies</h3>
    <p>We use cookies to enhance user experience and analyze website traffic. You can disable cookies in your browser settings at any time.</p>

    <h3>Advertising and Google AdSense</h3>
    <p>We use third-party advertising companies, including Google AdSense, to display ads. These companies may use cookies or similar technologies to show relevant ads based on your interests. Learn more about <a href="https://policies.google.com/technologies/ads" target="_blank">how Google uses data</a>.</p>

    <h3>Data Security</h3>
    <p>We use reasonable measures to protect your data. However, no online system is 100% secure, and we cannot guarantee absolute protection.</p>

    <h3>Changes to This Policy</h3>
    <p>We may update this Privacy Policy from time to time. The latest version will always be available on this page.</p>

    <h3>Contact Us</h3>
    <p>If you have any questions, please contact us at <a href="mailto:support@{{ request()->getHost() }}">support@{{ request()->getHost() }}</a>.</p>
</div>
@endsection
