@extends('layout.main')

@section('judul')
    Brand List
@endsection

@section('content')
<div class="card px-4">
    <div class="card-header">
      <h1 class="card-title">Brand Data</h1>
    </div>
    <div class="d-flex justify-content-end my-3">
        <a href="{{ url('brand/create')}}" role="button" class="btn btn-primary mx-1 col-1">Add Brand</a>
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
            <th scope="col">Merk</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @if ($brands->count() > 0)
        @foreach ($brands as $key => $data )
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{$data->brands}}</td>
            <td style="width:20%">
                <div class="d-flex col ">
                    <a href="{{ url('brand/'.$data->id.'/edit')}}" role="button" class="btn btn-warning mx-1"><i class="fas fa-pen text-white"></i></a>
                    <form action="{{ url('brand/'.$data->id)}}" method="post">
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
                Tidak Ada Merk Yang Terdaftar
            </td>
        </tr>
        @endif

        </tbody>
    </table>
</div>
@endsection
