
@extends('layouts.vertical', ['title' => 'Edit Supplier', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container w-50">
    @include('layouts.shared/page-title', ['sub_title' => 'Edit Supplier', 'page_title' => 'Edit Supplier'])

    <form method="POST" action="{{ route('supplier.update', ['id' => $supplier->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="supplier" class="form-label">Nama Supplier:</label>
            <input type="text" name="supplier" class="form-control" required value="{{ $supplier->supplier }}">
        </div>
        <div class="form-group mb-3">
            <label for="address" class="form-label">Alamat:</label>
            <input type="text" name="address" class="form-control" required value="{{ $supplier->address }}">
        </div>
        <div class="form-group mb-3">
            <label for="phone" class="form-label">Nomor Telepon:</label>
            <input type="text" name="phone" class="form-control" required value="{{ $supplier->phone }}">
        </div>
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
