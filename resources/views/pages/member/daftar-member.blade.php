@extends('layouts.apps.admin.admin-global')

@section('card-stats')
<div class="row">
    <div class="col-xl-3 col-md-6">
      <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
              <span class="h2 font-weight-bold mb-0">350,897</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                <i class="ni ni-active-40"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm">
            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
            <span class="text-nowrap">Since last month</span>
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Daftar Member</h3>
            </div>
            <div class="col text-right">
              <a href="{{ route('member.create') }}" class="btn btn-primary">+ Tambah Member</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush text-center">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Member</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Hp</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($members as $key => $member)
                <tr>
                    <th scope="row"> {{ $key + $members->firstItem() }} </th>
                    <td> {{ $member->nama }} </td>
                    <td>{{ $member->alamat }} </td>
                    <td> {{ $member->nohp }} </td>
                    <td>
                        <a href="{{ route('member.edit', $member->id) }}" class="btn btn-warning waves-effect waves-light">Edit</a>
                        <form class="d-inline" onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                            action="{{ route('member.destroy', $member->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger waves-effect waves-light" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach                
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
