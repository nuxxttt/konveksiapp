@extends('layouts.vertical', ['title' => 'Edit Settings', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container w-50">
    @include('layouts.shared/page-title', ['sub_title' => 'Edit Settings', 'page_title' => 'Edit Settings'])

    <form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

    <!-- Logo -->
    <div class="form-group mb-3">
        <label for="logo" class="form-label">Logo:</label>
        <input type="file" name="logo" class="form-control">
        @if (isset($settings) && $settings->logo)
        @endif
    </div>

    <!-- Title -->
    <div class="form-group mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" name="title" class="form-control" required value="{{ isset($settings) ? $settings->title : '' }}">
    </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
