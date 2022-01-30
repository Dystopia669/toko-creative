@extends('layouts.apps.user.user-global')

@section('content')
  <div class="row">
    <div class="col-xl-6 mx-auto">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-center">Form Upload Print</h3>
            </div>
          </div>
        </div>
            <div class="card-body">
                <form action="{{ route('fc.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file" class="form-control-label">File Print</label>
                        <input class="form-control @error('file') is-invalid @enderror" name="file" placeholder="File Print" type="file" id="file" required>
                        @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="halaman_awal" class="form-control-label">Halaman Awal</label>
                        <input class="form-control @error('halaman_awal') is-invalid @enderror" name="halaman_awal" placeholder="Halaman Awal" type="number" id="halaman-awal" value="{{ old('halaman-awal') }}" required>
                        @error('halaman-awal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="halaman_akhir" class="form-control-label">Halaman Akhir</label>
                        <input class="form-control @error('halaman_akhir') is-invalid @enderror" name="halaman_akhir" placeholder="Halaman Akhir" type="number" id="halaman-akhir" value="{{ old('halaman-akhir') }}" required>
                        @error('halaman-akhir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary center-block ">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
