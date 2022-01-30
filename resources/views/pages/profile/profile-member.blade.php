@extends('layouts.apps.user.user-global')

@section('content')
  <div class="row">
    <div class="col-xl-5 mx-auto">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-center">Profile Member</h3>
            </div>
          </div>
        </div>
            <div class="card-body">
                <form action="{{ route('profile.index', $profiles->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama-member" class="form-control-label">Nama Member</label>
                        <input class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Member" type="text" id="nama-member" value="{{ $profiles->nama }}" disabled>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-control-label">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" type="email" id="email" value="{{ $profiles->email }}" disabled>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nohp" class="form-control-label">Nomor Handphone</label>
                        <input class="form-control @error('nohp') is-invalid @enderror" name="nohp" placeholder="Nomor Handphone" type="text" id="nohp" value="{{ $profiles->nohp }}" disabled>
                        @error('nohp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="form-control-label">Alamat</label>
                        <input class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat" type="text" id="alamat" value="{{ $profiles->alamat }}" disabled>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row justify-content-center">
                    <a href="{{ route('profile.edit', $profiles->id) }}" class="btn btn-warning waves-effect waves-light">Edit</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
