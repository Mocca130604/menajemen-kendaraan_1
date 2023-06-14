@extends('layout.main')


@section('content')
<div class="card px-4 py-2">
    <div class="card-header">
      <h1 class="card-title">Add Type</h1>
    </div>

    <form action="{{url('type')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Type</label>
          <input type="text" class="form-control
            @error('typeName')
                is-invalid
            @enderror"
            id="typeName" name="typeName" placeholder="Insert Type">
            @error('typeName')
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
