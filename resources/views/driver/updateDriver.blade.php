@extends('layout.main')


@section('content')
<div class="card px-4 py-2">
    <div class="card-header">
      <h1 class="card-title">Add Driver</h1>
    </div>

    <form action="{{route('driver.update', $driver->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
        <input type="hidden" name="status" value={{$driver->status}}>
          <label for="exampleInputEmail1">Driver Name</label>
          <input type="text" value="{{$driver->nama}}" class="form-control
            @error('driverName')
                is-invalid
            @enderror"
            id="driverName" name="driverName" placeholder="Insert driver name">
            @error('driverName')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <textarea class="form-control
            @error('address')
                is-invalid
            @enderror"
            name="address" placeholder="Insert address">
            {{$driver->alamat}}
            </textarea>
            @error('address')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Cellphone Number</label>
            <input value="{{$driver->no_telp}}" class="form-control
            @error('number')
                is-invalid
            @enderror"
            type="number" name="number" placeholder="Insert cellphone number">
            @error('number')
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

