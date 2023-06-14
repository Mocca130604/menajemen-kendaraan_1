@extends('layout.main')

@section('judul')
    Car List
@endsection

@section('content')
<div class="card px-4">
    <div class="card-header">
      <h1 class="card-title">Cars Data</h1>
    </div>
    <div class="d-flex justify-content-end my-3">
        <a href="{{ url('cars/create')}}" role="button" class="btn btn-primary mx-1 col-1">Add Cars</a>
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
            <th scope="col">Tipe</th>
            <th scope="col">Merk</th>
            <th scope="col">Tahun Pembuatan</th>
            <th scope="col">Terpakai</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @if ($cars->count() > 0)
        @foreach ($cars as $key => $data )
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{$data->name}}</td>
            <td>{{$data->type}}</td>
            <td>{{$data->brands}}</td>
            <td>{{$data->year}}</td>
            <td>{{$data->used}}</td>
            <td style="width:20%">
                <div class="d-flex col ">
                    <a href="{{ url('cars/'.$data->id.'/edit')}}" role="button" class="btn btn-warning mx-1"><i class="fas fa-pen text-white"></i></a>
                    <form action="{{ url('cars/'.$data->id)}}" method="post">
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
                Tidak Ada Mobil Yang Terdaftar
            </td>
        </tr>
        @endif

        </tbody>
    </table>
</div>
@endsection
