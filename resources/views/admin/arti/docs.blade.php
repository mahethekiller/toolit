@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Arti API Documentation</h2>
        <span class="badge bg-dark px-3 py-2 fs-6">Base URL: {{ url('/api/arti/') }}</span>
    </div>

    <div class="row">
        <!-- Sidebar Navigation for Endpoints -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 sticky-top" style="top: 20px; z-index: 100;">
                <div class="card-body p-3">
                    <h6 class="fw-bold mb-3 text-uppercase text-muted small">Sections</h6>
                    <div class="list-group list-group-flush" id="docs-nav">
                        <a href="#auth-endpoints" class="list-group-item list-group-item-action fw-bold border-0 px-2 rounded mb-1">
                            <i class="fas fa-lock me-2 text-danger"></i> Authentication
                        </a>
                        <a href="#public-endpoints" class="list-group-item list-group-item-action fw-bold border-0 px-2 rounded mb-1">
                            <i class="fas fa-globe me-2 text-primary"></i> Public Content
                        </a>
                        <a href="#protected-endpoints" class="list-group-item list-group-item-action fw-bold border-0 px-2 rounded mb-1">
                            <i class="fas fa-user-shield me-2 text-success"></i> Protected API
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Documentation Content -->
        <div class="col-md-9">
            <!-- Authentication -->
            <div id="auth-endpoints" class="mb-5">
                <h4 class="fw-bold border-bottom pb-2 mb-4 text-danger"><i class="fas fa-lock me-2"></i> Authentication</h4>

                <!-- Register -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-success me-2 px-3 py-1">POST</span>
                            <code class="fs-5 fw-bold text-dark">/auth/register</code>
                        </div>
                        <p class="text-muted">Register a new mobile application user account.</p>
                        
                        <h6 class="fw-bold mt-3">Request Body (JSON)</h6>
                        <pre class="bg-dark text-light p-3 rounded position-relative"><code class="language-json">{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "gotra": "Kashyap",
  "rashi": "Mesh"
}</code></pre>

                        <h6 class="fw-bold mt-3">Success Response (201 Created)</h6>
                        <pre class="bg-dark text-light p-3 rounded"><code class="language-json">{
  "status": "success",
  "message": "User registered successfully",
  "token": "1|abcdefg12345...",
  "data": {
    "name": "John Doe",
    "email": "john@example.com",
    "gotra": "Kashyap",
    "rashi": "Mesh",
    "id": 1
  }
}</code></pre>
                    </div>
                </div>

                <!-- Login -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-success me-2 px-3 py-1">POST</span>
                            <code class="fs-5 fw-bold text-dark">/auth/login</code>
                        </div>
                        <p class="text-muted">Authenticate credentials and retrieve API token.</p>
                        
                        <h6 class="fw-bold mt-3">Request Body (JSON)</h6>
                        <pre class="bg-dark text-light p-3 rounded"><code class="language-json">{
  "email": "john@example.com",
  "password": "password123"
}</code></pre>

                        <h6 class="fw-bold mt-3">Success Response (200 OK)</h6>
                        <pre class="bg-dark text-light p-3 rounded"><code class="language-json">{
  "status": "success",
  "message": "Login successful",
  "token": "2|abcdefg67890...",
  "data": {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "gotra": "Kashyap",
    "rashi": "Mesh"
  }
}</code></pre>
                    </div>
                </div>
            </div>

            <!-- Public Content -->
            <div id="public-endpoints" class="mb-5">
                <h4 class="fw-bold border-bottom pb-2 mb-4 text-primary"><i class="fas fa-globe me-2"></i> Public Content</h4>

                <!-- Get Deities -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-primary me-2 px-3 py-1">GET</span>
                            <code class="fs-5 fw-bold text-dark">/deities</code>
                        </div>
                        <p class="text-muted">Retrieve list of all deities.</p>

                        <h6 class="fw-bold mt-3">Success Response (200 OK)</h6>
                        <pre class="bg-dark text-light p-3 rounded"><code class="language-json">{
  "status": "success",
  "data": [
    {
      "id": 1,
      "name": "Shiva",
      "description": "Lord Shiva is one of the principal deities of Hinduism...",
      "image_url": "http://localhost/storage/uploads/deities/shiva.jpg"
    }
  ]
}</code></pre>
                    </div>
                </div>

                <!-- Get Aartis -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-primary me-2 px-3 py-1">GET</span>
                            <code class="fs-5 fw-bold text-dark">/aartis</code>
                        </div>
                        <p class="text-muted">Retrieve list of aartis with optional category and deity filters.</p>
                        
                        <h6 class="fw-bold mt-3">Query Parameters</h6>
                        <table class="table table-bordered table-sm align-middle text-muted">
                            <thead>
                                <tr>
                                    <th>Parameter</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>deity_id</code></td>
                                    <td>Integer</td>
                                    <td>Filter by specific deity ID.</td>
                                </tr>
                                <tr>
                                    <td><code>category</code></td>
                                    <td>String</td>
                                    <td>Filter by category (e.g. Popular, Morning).</td>
                                </tr>
                            </tbody>
                        </table>

                        <h6 class="fw-bold mt-3">Success Response (200 OK)</h6>
                        <pre class="bg-dark text-light p-3 rounded"><code class="language-json">{
  "status": "success",
  "data": [
    {
      "id": 1,
      "deity_id": 1,
      "title": "Om Jai Shiv Omkara",
      "subtitle": "Shiv Aarti",
      "category": "Popular",
      "duration": "03:15",
      "audio_url": "http://localhost/storage/uploads/audio/shiv_aarti.mp3",
      "video_url": "abc123xyz",
      "lyrics": [
        { "timestamp": 0, "text": "Om Jai Shiv Omkara..." }
      ]
    }
  ]
}</code></pre>
                    </div>
                </div>

                <!-- Get Wallpapers -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-primary me-2 px-3 py-1">GET</span>
                            <code class="fs-5 fw-bold text-dark">/gallery</code>
                        </div>
                        <p class="text-muted">Retrieve wallpapers. Filterable by <code>deity_id</code>.</p>

                        <h6 class="fw-bold mt-3">Success Response (200 OK)</h6>
                        <pre class="bg-dark text-light p-3 rounded"><code class="language-json">{
  "status": "success",
  "data": [
    {
      "id": 1,
      "deity_id": 1,
      "title": "Adiyogi Shiva",
      "image_url": "http://localhost/storage/uploads/gallery/adiyogi.jpg",
      "download_count": 42
    }
  ]
}</code></pre>
                    </div>
                </div>
            </div>

            <!-- Protected API -->
            <div id="protected-endpoints" class="mb-5">
                <h4 class="fw-bold border-bottom pb-2 mb-4 text-success"><i class="fas fa-user-shield me-2"></i> Protected Endpoints</h4>
                <div class="alert alert-info border-info shadow-sm mb-4">
                    <i class="fas fa-info-circle me-1"></i> These endpoints require the <code>Authorization: Bearer {token}</code> request header.
                </div>

                <!-- Profile -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-primary me-2 px-3 py-1">GET</span>
                            <code class="fs-5 fw-bold text-dark">/profile</code>
                        </div>
                        <p class="text-muted">Get authenticated user details.</p>

                        <h6 class="fw-bold mt-3">Success Response (200 OK)</h6>
                        <pre class="bg-dark text-light p-3 rounded"><code class="language-json">{
  "status": "success",
  "data": {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "gotra": "Kashyap",
    "rashi": "Mesh"
  }
}</code></pre>
                    </div>
                </div>

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-warning me-2 px-3 py-1">PUT</span>
                            <code class="fs-5 fw-bold text-dark">/profile</code>
                        </div>
                        <p class="text-muted">Update profile information.</p>

                        <h6 class="fw-bold mt-3">Request Body (JSON)</h6>
                        <pre class="bg-dark text-light p-3 rounded"><code class="language-json">{
  "name": "John Changed",
  "gotra": "Vashistha",
  "rashi": "Vrishabha"
}</code></pre>

                        <h6 class="fw-bold mt-3">Success Response (200 OK)</h6>
                        <pre class="bg-dark text-light p-3 rounded"><code class="language-json">{
  "status": "success",
  "message": "Profile updated successfully",
  "data": {
    "id": 1,
    "name": "John Changed",
    "email": "john@example.com",
    "gotra": "Vashistha",
    "rashi": "Vrishabha"
  }
}</code></pre>
                    </div>
                </div>

                <!-- Favorites -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-primary me-2 px-3 py-1">GET</span>
                            <code class="fs-5 fw-bold text-dark">/favorites</code>
                        </div>
                        <p class="text-muted">Get list of user's favorite Aartis.</p>
                    </div>
                </div>

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-success me-2 px-3 py-1">POST</span>
                            <code class="fs-5 fw-bold text-dark">/favorites</code>
                        </div>
                        <p class="text-muted">Add or remove an Aarti from favorites.</p>
                        <h6 class="fw-bold mt-3">Request Body (JSON)</h6>
                        <pre class="bg-dark text-light p-3 rounded"><code class="language-json">{
  "aarti_id": 1
}</code></pre>
                    </div>
                </div>

                <!-- Reminders -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-success me-2 px-3 py-1">POST</span>
                            <code class="fs-5 fw-bold text-dark">/reminders</code>
                        </div>
                        <p class="text-muted">Create or update daily prayer reminders.</p>
                        <h6 class="fw-bold mt-3">Request Body (JSON)</h6>
                        <pre class="bg-dark text-light p-3 rounded"><code class="language-json">{
  "time": "08:30",
  "title": "Morning Worship",
  "is_enabled": true
}</code></pre>
                    </div>
                </div>

                <!-- History -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-success me-2 px-3 py-1">POST</span>
                            <code class="fs-5 fw-bold text-dark">/history</code>
                        </div>
                        <p class="text-muted">Log a prayer event to increment prayer streak statistics.</p>
                        <h6 class="fw-bold mt-3">Request Body (JSON)</h6>
                        <pre class="bg-dark text-light p-3 rounded"><code class="language-json">{
  "aarti_id": 1,
  "duration_played": 180
}</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    pre {
        overflow: auto;
    }
    #docs-nav .list-group-item.active {
        background-color: #334155 !important;
        color: #fff !important;
    }
    #docs-nav .list-group-item {
        transition: all 0.2s ease;
    }
    #docs-nav .list-group-item:hover {
        background-color: #f1f5f9;
        transform: translateX(3px);
    }
</style>
@endsection
