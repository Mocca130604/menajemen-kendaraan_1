@extends('layout.main')

@section('judul')
    Halaman Home
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h1 class="card-title">Dashboard</h1>

      {{-- <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div> --}}
    </div>
    <div class="card-body">
        <div class="alert alert-success">
            Halo, Selamat Datang {{$user->username}}
        </div>
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer">
      Footer
    </div> --}}
    <!-- /.card-footer-->
  </div>
@endsection
