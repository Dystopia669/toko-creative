@extends('layouts.apps.admin.admin-global')

@section('content')
  <div class="row">
    <div class="col-xl-6 mx-auto">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-center">Form Tambah Member</h3>
            </div>
          </div>
        </div>
            <div class="card-body">
                <form action="{{ route('member.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama-member" class="form-control-label">Nama Member</label>
                        <input class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Member" type="text" id="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-control-label">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" type="email" id="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-control-label">Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" type="password" id="password"  required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-control-label">Confirm Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Password" type="password" id="password"  required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nohp" class="form-control-label">Nomor Handphone</label>
                        <input class="form-control @error('nohp') is-invalid @enderror" name="nohp" placeholder="Nomor Handphone" type="text" id="nohp" value="{{ old('nohp') }}" required>
                        @error('nohp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="form-control-label">Alamat</label>
                        <input class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat" type="text" id="alamat" value="{{ old('alamat') }}" required>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary center-block "> <a href="{{ route('member.index') }}"></a> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
