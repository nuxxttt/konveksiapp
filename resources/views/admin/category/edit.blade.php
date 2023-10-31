
@extends('layouts.vertical', ['title' => 'Edit Kategori', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container w-50">
    @include('layouts.shared/page-title', ['sub_title' => 'Edit Kategori', 'page_title' => 'Edit Kategori'])

    <form method="POST" action="{{ route('category.update',  $category->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="product" class="form-label">Nama Kategori:</label>
            <input type="text" name="product" class="form-control" required value="{{ $category->product }}">
        </div>
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
