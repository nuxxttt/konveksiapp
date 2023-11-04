@extends('layouts.vertical', ['title' => 'Edit Kategori', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container c-form">
    @include('layouts.shared/page-title', ['sub_title' => 'Kategori', 'page_title' => 'Edit Kategori'])

    <div class="card">
        <div class="card-body">
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
    </div>
</div>
@endsection
