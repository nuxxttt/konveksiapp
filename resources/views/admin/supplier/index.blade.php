@extends('layouts.vertical', ['title' => 'Daftar Supplier'])
@include('layouts.notification')
@section('content')
    <div class="row mt-xl-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Daftar Supplier</h4>
                    <div class="button mt-2">
                        <a href="{{ route('supplier.create') }}" class="btn btn-primary rounded-pill">Tambah Data Supplier</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="responsive-table-plugin">
                        <div class="">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Supplier</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            // Add this line to debug the $suppliers variable
                                            //dd($suppliers);
                                        @endphp
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                    <script>
                                        function deleteBarang(barangId) {
                                            Swal.fire({
                                                title: 'Konfirmasi Hapus Data',
                                                text: 'Yakin ingin menghapus data?',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonText: 'Ya',
                                                cancelButtonText: 'Tidak'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    // Form submission only if the user confirms
                                                    var form = document.getElementById('deleteForm' + barangId);
                                                    form.submit();
                                                }
                                            });
                                        }
                                    </script>
                                        @foreach($suppliers as $supplier)
                                            <tr>
                                                <td>{{ $supplier->id }}</td>
                                                <td>{{ $supplier->supplier }}</td>
                                                <td>{{ $supplier->address }}</td>
                                                <td>{{ $supplier->phone }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('supplier.edit', $supplier->id) }}" class="me-1">
                                                            <button type="submit" class="btn btn-primary"><i class="ri-edit-line"></i></button>
                                                        </a>
                                                        <form id="deleteForm{{ $supplier->id }}" action="{{ route('supplier.destroy', $supplier->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger" onclick="deleteBarang({{ $supplier->id }})">
                                                                <i class="ri-delete-bin-6-line"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

@endsection
