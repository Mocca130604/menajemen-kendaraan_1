@extends('layout.main')


@section('content')
<div class="card px-4 py-2">
    <div class="card-header">
      <h1 class="card-title">Add Driver</h1>
    </div>

    <form action="{{url('driver')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Driver Name</label>
          <input type="text" class="form-control
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
            </textarea>
            @error('address')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Cellphone Number</label>
            <input class="form-control
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
