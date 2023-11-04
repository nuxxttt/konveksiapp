@extends('layouts.vertical', ['title' => 'Edit Settings', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container c-form">
    @include('layouts.shared/page-title', ['sub_title' => 'Edit Settings', 'page_title' => 'Edit Settings'])

    <div class="card">
        <div class="card-body">
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
        </div>
    </div>
</div>
@endsection
