@extends('layout.main')

@section('judul')
    Car List
@endsection

@section('content')
<div class="card px-4">
    <div class="card-header">
      <h1 class="card-title">agreement Data</h1>
    </div>
    <div class="d-flex justify-content-end my-3">
        <a href="{{ url('agreement/create')}}" role="button" class="btn btn-primary mx-1 col-2">Add agreement</a>
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
            <th scope="col">Nama Driver</th>
            <th scope="col">Nama Admin</th>
            <th scope="col">Tipe</th>
            <th scope="col">Merk</th>
            <th scope="col">note</th>
            <th scope="col">status</th>
            @if ($user->role == 'superior')
            <th scope="col">Aksi</th>
            @endif
          </tr>
        </thead>
        <tbody>
        @if ($agreement->count() > 0)
        @foreach ($agreement as $key => $data )
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{$data->driver}}</td>
            <td>{{$data->admin_name}}</td>
            <td>{{$data->type}}</td>
            <td>{{$data->brands}}</td>
            <td>{{$data->note}}</td>
            <td>{{$data->status}}</td>
            @if ($user->role == 'superior')
            <td style="width:20%">
                <div class="d-flex col ">
                    @if ($data->status == "pending")
                    <form action="{{ url('accept/'.$data->id)}}" method="POST">
                        @csrf
                        <button class="btn btn-success mx-1"><i class="fa fa-check text-white"></i></button>
                    </form>
                    @endif
                    @if ($data->status == "ongoing")
                    <form action="{{ url('done/'.$data->id)}}" method="POST">
                        @csrf
                        <button class="btn btn-success mx-1">Done</button>
                    </form>
                    @endif
                </div>
            </td>
            @endif
          </tr>
        @endforeach
        @else
        <tr>
            <td colspan="10" class="my-5" align="center">
                Tidak Ada Persetujuan Yang Terdaftar
            </td>
        </tr>
        @endif

        </tbody>
    </table>
</div>
@endsection
