@extends('layouts.vertical', ['title' => 'Tambah Mitra', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')

<div class="row mt-xl-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Tambah Administrator</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group my-3">
                                <label for="name" class="form-label">Nama:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group my-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group my-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <input type="hidden" name="role" value="admin">

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
</div>

@endsection
