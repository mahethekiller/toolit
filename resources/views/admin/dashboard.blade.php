@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">Total Tools</h5>
                    <p class="card-text fs-4">{{ $toolsCount ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text fs-4">{{ $usersCount ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
