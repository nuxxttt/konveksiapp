@extends('layouts.vertical', ['title' => 'Evente Add', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/select2/dist/css/select2.min.css', 'node_modules/daterangepicker/daterangepicker.css', 'node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css', 'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css', 'node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css', 'node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection


@section('content')
    <style>
        .card-body th{
            color: rgb(10, 10, 10);
        }
        .card-body td{
            color: rgb(10, 10, 10);
        }
    </style>
<div class="row mt-xl-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Formulir Tambah Data Events</h4>
            </div>
            <div class="card-body">
                        <form method="POST" action="{{url('/event')}}"enctype="multipart/form-data">
                            @csrf
                            <div class="row g-2">
                            <div class="my-3 col-md-6">
                                <label for="kontigen" class="form-label">Title</label>
                                <input type="text" name="title" id="kontigen" class="form-control">
                            </div>
                            <div class="my-3 col-md-6">
                                <label for="official" class="form-label">Catatan</label>
                                <input type="text" name="catatan" id="official" class="form-control">
                            </div>
                            <div class="my-3 col-md-6">
                                <label for="nomorhp" class="form-label">Max Perserta</label>
                                <input type="number" name="max" id="nomorhp" class="form-control">
                            </div>
                            <div class="my-3 col-md-6">
                                <label for="nomorhp" class="form-label">Status</label>
                                <select class="form-control" name="status" id="">
                                    <option value="active">active</option>
                                    <option value="non_active">Non Active</option>
                                </select>
                            </div>
                            <div class="my-3 col-md-6">
                                <label for="nomorhp" class="form-label">Start</label>
                                <input type="date" name="start" id="nomorhp" class="form-control">
                            </div>
                            <div class="my-3 col-md-6">
                                <label for="nomorhp" class="form-label">End</label>
                                <input type="date" name="end" id="nomorhp" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-6">Banner</label>
                                <p class="col-md-12"><br><br></p>
                                <input required type="file" name="foto" class="form-control" id="inputGroupFile01">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </div>
                        </form>
                  

                <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
</div>
<!-- end row-->


@endsection