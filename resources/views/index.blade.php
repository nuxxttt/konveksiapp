@extends('layouts.vertical', ['title' => 'Dashboard', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared/page-title', ['sub_title' => 'Menu', 'page_title' => 'Dashboard'])

    <div class="row">
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-pink">
                <div class="card-body">
                    <div class="float-end">
                        <i class=" ri-school-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Kontingen/Sekolah</h6>
                    <h2 class="my-2">01</h2>
                    <p class="mb-0">
                        <span class="text-nowrap">Terdaftar</span>
                    </p>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-purple">
                <div class="card-body">
                    <div class="float-end">
                        <i class=" ri-user-fill widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Total Pesilat</h6>
                    <h2 class="my-2">9,254.62</h2>
                    <p class="mb-0">
                        <span class="text-nowrap">Aktif</span>
                    </p>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-info">
                <div class="card-body">
                    <div class="float-end">
                        <i class=" ri-user-3-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Total Perserta</h6>
                    <h2 class="my-2">753</h2>
                    <p class="mb-0">
                        <span class="text-nowrap">Aktif</span>
                    </p>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-primary">
                <div class="card-body">
                    <div class="float-end">
                        <i class=" ri-calendar-2-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Events</h6>
                    <h2 class="my-2">63,154</h2>
                    <p class="mb-0">
                        <span class="text-nowrap">of the Years</span>
                    </p>
                </div>
            </div>
        </div> <!-- end col-->
    </div>

    <!-- end row -->
@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
@endsection
