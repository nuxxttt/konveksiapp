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
                            <label for="email" class="form-label">Jabatan:</label>
                            <input type="text" name="email" class="form-control" required value="{{ $profile->email }}">
                        </div>
                        <button type="button" id="gantiPasswordButton" class="btn btn-primary">Ganti Password</button>

                        <div class="form-group mb-3" id="gantiPasswordSection" style="display: none;">
                            <label for="password" class="form-label">Ganti Password: <small>(isi password baru disini)</small></label>
                            <input type="password" name="password" class="form-control password-input" value="{{$profile->password}}">
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                // Event handler for the button click
                                $('#gantiPasswordButton').on('click', function() {
                                    // Toggle the display of the password sections
                                    $('#gantiPasswordSection').toggle();

                                    // If the section is visible, clear the existing password value
                                    if ($('#gantiPasswordSection').is(':visible')) {
                                        $('.password-input').val('');
                                    } else {
                                        // If the section is hidden, set the value to the existing password
                                        $('.password-input').val('{{$profile->password}}');
                                    }
                                });
                            });
                        </script>

                        @if (auth()->user()->role == "superadmin")
                        <input type="hidden" name="role" value="superadmin">
                        @else
                        <input type="hidden" name="role" value="admin">
                        @endif
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
