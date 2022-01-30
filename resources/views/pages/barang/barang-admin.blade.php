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
              <h3 class="mb-0">Daftar Barang</h3>
            </div>
            <div class="col text-right">
              <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush text-center">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $key => $barang)
                <tr>
                    <th scope="row"> {{ $key + $barangs->firstItem() }} </th>
                    <td> {{ $barang->nama }} </td>
                    <td>
                        Rp {{ number_format($barang->harga,2,',','.') }} 
                    </td>
                    <td> {{ $barang->stok }} </td>
                    <td> <img src="{{ asset('storage/' . $barang->gambar) }}" height="100" /> </td>
                    <td>
                        <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning waves-effect waves-light">Edit</a>
                        <form class="d-inline" onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                            action="{{ route('barang.destroy', $barang->id) }}" method="post">
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
