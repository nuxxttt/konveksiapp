@extends('layouts.vertical', ['title' => 'Edit Administrator', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container c-form">
    @include('layouts.shared/page-title', ['sub_title' => 'Kelola Admin', 'page_title' => 'Edit Administrator'])

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('profile.update', $profile->id) }}">
                @csrf
                @method('PUT') <!-- Use the PUT method for updates -->
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama:</label>
                            <input type="text" name="name" class="form-control" required value="{{ $profile->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" required value="{{ $profile->email }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Ganti Password: <small>(isi password baru disini)</small></label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <input type="hidden" name="role" value="admin">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
