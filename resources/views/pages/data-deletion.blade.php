@extends('layouts.app')

@section('title', 'Account & Data Deletion Request - Arrow Tap Away: Block Puzzle')

@section('content')
<div class="container py-5">
    <h1 class="mb-3">Account &amp; Data Deletion Request</h1>
    <p class="text-muted mb-4">Application: <strong>Arrow Tap Away: Block Puzzle</strong> | Policy Compliant Data Safety Form</p>

    <div class="card mb-4 shadow-sm border-0 bg-light">
        <div class="card-body">
            <h5 class="card-title text-primary font-weight-bold">App &amp; Developer Information</h5>
            <p class="mb-1"><strong>Application Name:</strong> Arrow Tap Away: Block Puzzle</p>
            <p class="mb-1"><strong>Package ID:</strong> com.arrowgame.blockpuzzle</p>
            <p class="mb-0"><strong>Developer Email:</strong> mahethekiller@gmail.com</p>
        </div>
    </div>

    <h2 class="h4 mt-4 mb-3">How to Request Account &amp; Data Deletion</h2>
    <p>If you have created an account or submitted data in <strong>Arrow Tap Away: Block Puzzle</strong> (such as signing in with Google or saving high scores to the global leaderboard), you can request complete deletion of your data at any time by following these steps:</p>

    <ol class="mb-4">
        <li>Send an email to <strong><a href="mailto:mahethekiller@gmail.com?subject=Account%20and%20Data%20Deletion%20Request%20-%20Arrow%20Tap%20Away">mahethekiller@gmail.com</a></strong>.</li>
        <li>Use the Subject line: <code>Account and Data Deletion Request - Arrow Tap Away</code>.</li>
        <li>In the body of the email, please include:
            <ul>
                <li>Your registered Google email address used in the app.</li>
                <li>Your player displayName / Nickname (if known).</li>
            </ul>
        </li>
    </ol>

    <h2 class="h4 mt-4 mb-3">What Data Will Be Deleted</h2>
    <p>Upon receiving your request, we will permanently delete the following data from our servers (Firebase Realtime Database &amp; Auth):</p>
    <ul>
        <li><strong>User Account &amp; Profile:</strong> Your Google Sign-In UID, email address, display name, and avatar URL.</li>
        <li><strong>Leaderboard &amp; High Scores:</strong> All recorded high scores, level progress, and leaderboard rankings.</li>
        <li><strong>Cloud Data:</strong> Any synchronized game statistics saved on our backend.</li>
    </ul>

    <h2 class="h4 mt-4 mb-3">What Data May Be Retained</h2>
    <p>No personal account data is retained after processing your request. Any anonymous diagnostic log files or non-identifying aggregate telemetry data (if any) are automatically scrubbed and contain no personal identifiers.</p>

    <h2 class="h4 mt-4 mb-3">Data Processing Timeframe</h2>
    <p>All valid deletion requests are processed and deleted within <strong>7 business days</strong>. You will receive an email confirmation once your data has been completely erased.</p>

    <div class="alert alert-info mt-4">
        <strong>Need Immediate Support?</strong><br>
        If you have any questions or require assistance with data removal, please contact developer support directly at <a href="mailto:mahethekiller@gmail.com" class="alert-link">mahethekiller@gmail.com</a>.
    </div>
</div>
@endsection
