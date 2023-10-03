@extends('layouts.vertical', ['title' => 'Pesilat', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
                <h4 class="header-title">Formulir Tambah Data Pesilat</h4>
            </div>
            <div class="card-body">
                        <form method="POST" action="{{url('/pesilat')}}">
                            @csrf
                            <div class="row g-2">
                            <div class="my-3 col-md-6">
                                <label for="kontigen" class="form-label">NIK</label>
                                <input type="text" name="nik" id="kontigen" class="form-control">
                            </div>
                            <div class="my-3 col-md-6">
                                <label for="manager" class="form-label">Nama Pesilat</label>
                                <input type="text" name="pesilat" id="manager" class="form-control">
                            </div>
                            <div class="my-3 col-md-6">
                                <label for="official" class="form-label">Jenis Kelamin</label>
                                <select name="kelamin" class="form-control" id="official">
                                    <option value="">-- Pilih --</option>
                                    <option value="laki-laki">laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="my-3 col-md-6">
                                <label for="nomorhp" class="form-label">Tanggal lahir</label>
                                <input type="date" name="tanggal_lahir" id="nomorhp" class="form-control">
                            </div>
                            <div class="col-12">
                                <p style="color:#76838f">Isi Alamat</p>
                            </div>
                            {{-- <div class="col-lg-6">
    
                                <select class="form-control select2" data-toggle="select2">
                                    <option>Select</option>
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                    <optgroup label="Central Time Zone">
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TX">Texas</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="WI">Wisconsin</option>
                                    </optgroup>
                                </select>
                            </div> --}}
                            <div class="my-3 col-md-6">
                                <label for="no_hp" class="form-label">Nomor Hp</label>
                                <input type="number" name="hp" id="no_hp" class="form-control">
                            </div>
                            <div class="my-3 col-md-6">
                                <label for="example-textarea" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" id="example-textarea"
                                    rows="5"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-6">Upload Pas Foto</label>
                                <p class="col-md-12"><br><br></p>
                                <input type="file" name="foto" class="form-control" id="inputGroupFile01">
                            </div>
                                <div class="col-md-6">
                                <label class="col-md-6">Upload Persyaratan</label>
                                <p class="text-danger col-md-12">* Jadikan persyaratan-persyaratan pendaftaran menjadi satu file dengan ekstensi .pdf kecuali pas foto</p>
                                <input type="file" name="persyaratan" class="form-control" id="inputGroupFile01">
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