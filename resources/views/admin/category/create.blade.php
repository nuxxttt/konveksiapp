@extends('layouts.vertical', ['title' => 'Tambah Kategori', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/select2/dist/css/select2.min.css', 'node_modules/daterangepicker/daterangepicker.css', 'node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css', 'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css', 'node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css', 'node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
<div class="container c-form">
    @include('layouts.shared/page-title', ['sub_title' => 'Kategori', 'page_title' => 'Tambah Kategori'])

    <div class="card">

        <div class="card-body">
            <form method="POST" action="{{ route('category.store') }}">
                @csrf
                <div class="row g-2">
                    <div class="my-3">
                        <label for="product" class="form-label">Nama</label>
                        <input type="text" required name="product" id="product" class="form-control">
                    </div>

                    <input type="hidden" value="{{ auth()->user()->id }}" name="id_user">

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
