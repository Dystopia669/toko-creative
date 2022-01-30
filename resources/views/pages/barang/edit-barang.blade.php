@extends('layouts.apps.admin.admin-global')

@section('content')
  <div class="row">
    <div class="col-xl-6 mx-auto">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-center">Form Edit Barang</h3>
            </div>
          </div>
        </div>
            <div class="card-body">
                <form action="{{ route('barang.update', $barangs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama-barang" class="form-control-label">Nama Barang</label>
                        <input class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Barang" type="text" id="nama-barang" value="{{ $barangs->nama }}" required>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga-barang" class="form-control-label">Harga Barang</label>
                        <input class="form-control @error('harga') is-invalid @enderror" name="harga" placeholder="Harga Barang" type="number" id="harga-barang" value="{{ $barangs->harga }}" required>
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stok-barang" class="form-control-label">Stok Barang</label>
                        <input class="form-control @error('stok') is-invalid @enderror" name="stok" placeholder="Stok Barang" type="number" id="stok-barang" value="{{ $barangs->stok }}" required>
                        @error('stok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gambar-barang" class="form-control-label">Gambar Barang</label>
                        <input class="form-control @error('gambar') is-invalid @enderror" name="gambar" placeholder="Gambar Barang" type="file" id="gambar-barang" value="{{ $barangs->gambar }}" required>
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary center-block">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
