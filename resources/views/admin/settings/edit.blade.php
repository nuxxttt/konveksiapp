@extends('layouts.vertical', ['title' => 'Edit Settings', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])
@php
$role = auth()->user()->role;
@endphp
@section('content')
<div class="container c-form">
    @include('layouts.shared/page-title', ['sub_title' => '', 'page_title' => 'Edit Settings'])

    <div class="card">
        <div class="card-body">
            @if ($role == "superadmin")
            <div class="mb-3 text-center">
                <label>Ubah Tema : </label>
                <a class="nav-link" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
                    <i class="ri-settings-3-line fs-22"></i>
                </a>
            </div>
            <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Logo -->
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo:</label>
                    <input type="file" name="logo" class="form-control">
                    @if (isset($settings) && $settings->logo)
                        <img src="{{ asset($settings->logo) }}" alt="Current Logo" class="mt-2" width="100">
                    @endif
                </div>

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" required value="{{ isset($settings) ? $settings->title : '' }}">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            @else
            <div class="mb-3 text-center">
                <label>Ubah Tema : </label>
                <a class="nav-link" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
                    <i class="ri-settings-3-line fs-22"></i>
                </a>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
