@extends('layouts.vertical', ['title' => 'Category', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
                <h4 class="header-title">Formulir Tambah Data Category</h4>
            </div>
            <div class="card-body">
                        <form method="POST" action="{{url('/category')}}">
                            @csrf
                            <div class="row g-2">
                            <div class="my-3 col-md-6">
                                <label for="kontigen" class="form-label">Nama</label>
                                <input type="text"  required name="nama" id="kontigen" class="form-control">
                            </div>
                            
                                <input type="hidden" value="{{auth()->user()->id}}" name="id_user">


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