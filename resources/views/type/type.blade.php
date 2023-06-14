@extends('layout.main')

@section('judul')
    Type list
@endsection

@section('content')
<div class="card px-4">
    <div class="card-header">
      <h1 class="card-title">types Data</h1>
    </div>
    <div class="d-flex justify-content-end my-3">
        <a href="{{ url('type/create')}}" role="button" class="btn btn-primary mx-1 col-1">Add type</a>
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
            <th scope="col">Tipe Kendaraan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @if ($type->count() > 0)
        @foreach ($type as $key => $data )
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{$data->tipe}}</td>
            <td style="width:20%">
                <div class="d-flex col ">
                    <a href="{{ url('type/'.$data->id.'/edit')}}" role="button" class="btn btn-warning mx-1"><i class="fas fa-pen text-white"></i></a>
                    <form action="{{ url('type/'.$data->id)}}" method="post">
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
                Tidak Ada tipe Kendaraan Yang Terdaftar
            </td>
        </tr>
        @endif

        </tbody>
    </table>
</div>
@endsection
