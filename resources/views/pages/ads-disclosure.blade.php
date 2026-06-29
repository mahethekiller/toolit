@extends('layouts.app')

@section('title', 'Advertising & Ad Disclosure')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Advertising & Ad Disclosure</h1>
    <p>Last updated: {{ date('F j, Y') }}</p>

    <p><strong>{{ config('app.name') }}</strong> displays ads to help support our website and keep our tools free to use. We may participate in advertising programs such as Google AdSense.</p>

    <h3>How Ads Are Displayed</h3>
    <p>Ads may appear in banners, sidebars, or inline with content. We ensure that ad placements do not interfere with your user experience or the functionality of our tools.</p>

    <h3>Third-Party Advertising</h3>
    <p>We use third-party advertising networks (including Google) that may use cookies or identifiers to serve relevant ads based on your browsing activity. You can learn more or opt out at <a href="https://adssettings.google.com/" target="_blank">Google Ads Settings</a>.</p>

    <h3>Sponsored Content</h3>
    <p>Occasionally, we may feature sponsored articles or tool recommendations. Sponsored content will always be clearly labeled as such.</p>

    <h3>Our Commitment</h3>
    <p>We aim to maintain transparency about our advertising practices. Ads help us fund development, hosting, and new features without charging users.</p>
</div>
@endsection
