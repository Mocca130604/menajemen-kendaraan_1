@extends('layout.main')


@section('content')
<div class="card px-4 py-2">
    <div class="card-header">
      <h1 class="card-title">Add Agreement</h1>
    </div>

    <form action="{{url('agreement')}}" method="POST">
        @csrf
        <input type="hidden" name="adminName" value="{{$user->username}}">
        <div class="form-group">
          <label for="exampleInputEmail1">Driver Name</label>
          <input type="text" class="form-control
            @error('driverName')
                is-invalid
            @enderror"
            id="driverName" list="drivers" name="driverName" id="driver" placeholder="Insert driver name">
            <datalist id="drivers">
                @foreach ($driver as $key => $data)
                    <option value="{{$data->id}}">{{$data->nama}}</option>
                @endforeach
            </datalist>
            @error('driverName')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Cars</label>
            <input type="text" class="form-control
              @error('carName')
                  is-invalid
              @enderror"
              id="carName" list="cars" name="carName" id="car" placeholder="Insert car name">
              <datalist id="cars">
                  @foreach ($cars as $key => $data)
                      <option value="{{$data->id}}" >{{$data->name}}</option>
                  @endforeach
              </datalist>
              @error('carName')
                  <div class="invalid-feedback">
                      {{ $message}}
                  </div>
              @enderror
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Note</label>
            <textarea class="form-control
            @error('note')
                is-invalid
            @enderror"
            name="note" placeholder="Insert a Note">
            </textarea>
            @error('note')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
        @enderror
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
  </div>

@endsection
