@extends('layouts.apps.user.user-global')

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
              <h3 class="mb-0">Daftar Pemesanan FotoCopy anda</h3>
            </div>
            <div class="col text-right">
              <a href="{{ route('fc.create') }}" class="btn btn-primary">Pesan FotoCopy</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush text-center">
            <thead class="thead-light">
              <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">File</th>
                <th scope="col">Halaman Awal</th>
                <th scope="col">Halaman Akhir</th>
                <th scope="col">Jumlah Halaman</th>
                <th scope="col">Total Harga</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($fcs as $key => $fc)
                <tr>
                    <th scope="row"> {{ $key + $fcs->firstItem() }} </th>
                    <td> <iframe type="application/pdf" src="{{ asset('storage/' . $fc->file) }}" frameborder="0"></iframe> </td>
                    <td> {{ $fc->halaman_awal }} </td>
                    <td> {{ $fc->halaman_akhir }} </td>
                    <td> {{ $fc->jumlah_halaman }} </td>
                    <td>  
                      Rp {{ number_format($fc->total_harga,2,',','.') }} 
                    </td>
                </tr>
            @endforeach                
              
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {!! $fcs->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
