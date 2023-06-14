@extends('layout.main')

@section('judul')
    Driver List
@endsection

@section('content')
<div class="card px-4">
    <div class="card-header">
      <h1 class="card-title">Drivers Data</h1>
    </div>
    <div class="d-flex justify-content-end my-3">
        <a href="{{ url('driver/create')}}" role="button" class="btn btn-primary mx-1 col-1">Add Driver</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">No.Telp</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @if ($driver->count() > 0)
        @foreach ($driver as $key => $data )
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{$data->nama}}</td>
            <td>{{$data->alamat}}</td>
            <td>{{$data->no_telp}}</td>
            <td>{{$data->status}}</td>
            <td style="width:20%">
                <div class="d-flex col ">
                    <a href="{{ url('driver/'.$data->id.'/edit')}}" role="button" class="btn btn-warning mx-1"><i class="fas fa-pen text-white"></i></a>
                    <form action="{{ url('driver/'.$data->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger mx-1"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
            </td>
          </tr>
        @endforeach
        @else
        <tr>
            <td colspan="10" class="my-5" align="center">
                Tidak Ada Driver Yang Terdaftar
            </td>
        </tr>
        @endif

        </tbody>
    </table>
</div>
@endsection
