@extends('layouts.vertical', ['title' => 'Edit Isi Rak', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="container w-50">
        @include('layouts.shared/page-title', ['sub_title' => 'Master Data / Rak', 'page_title' => 'Edit Isi Rak'])

        <div class="card mx-auto"> <!-- Center align the card -->
            <div class="card-body">
                <form method="POST" action="{{ route('isirak.update',  $isirak->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label for="nama_barang" class="form-label">Nama Kategori:</label>
                        <select name="nama_barang" class="form-control" required>

                            @foreach($barang as $barangg)
                                @if($isirak->nama_barang == $barangg->id)
                                    <option value="{{ $isirak->nama_barang }}" selected>{{ $barangg->judul }}</option>
                                @else
                                    <option value="{{ $isirak->nama_barang }}">{{ $barangg->judul }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kuantitas" class="form-label">Kuantitas:</label>
                        <input type="text" name="kuantitas" class="form-control" required value="{{ $isirak->kuantitas }}">
                    </div>

                    <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan:</label>
                        <select name="satuan" class="form-control" required>
                            @foreach($satuan as $s)
                                @if($s->id == $isirak->satuan)
                                    <option value="{{ $s->id }}" selected>{{ $s->nama }}</option>
                                @else
                                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                @endif
                            @endforeach
                        </select>                    </div>
                    <div class="my-3 col-md-6">
                        <input type="hidden" type="text" name="id_rak" id="id_rak" class="form-control" value="{{ $id_rak }}">
                    </div>
                    <div class="form-group mb-3">
                        <input type="hidden" name="created_by" id="created_by" class="form-control" value="{{auth()->user()->id}}">
                    </div>

                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div>
@endsection
