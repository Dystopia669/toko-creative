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
                <form action="{{ route('fcadmin.update', $fca->id_fc) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="file" class="form-control-label">File</label>
                        <input class="form-control @error('file') is-invalid @enderror" name="file" placeholder="File" type="file" id="file" value="{{ $fca->file }}" required>
                        @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="halaman_awal" class="form-control-label">Halaman Awal</label>
                        <input class="form-control @error('halaman_awal') is-invalid @enderror" name="halaman_awal" placeholder="Halaman Awal" type="number" id="halaman-awal" value="{{ $fca->halaman_awal }}" required>
                        @error('halaman_awal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="halaman_akhir" class="form-control-label">Halaman Akhir</label>
                        <input class="form-control @error('halaman_akhir') is-invalid @enderror" name="halaman_akhir" placeholder="Halaman Akhir" type="number" id="halaman-akhir" value="{{ $fca->halaman_akhir }}" required>
                        @error('halaman_akhir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary center-block "> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
