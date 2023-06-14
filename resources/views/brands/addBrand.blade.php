@extends('layout.main')


@section('content')
<div class="card px-4 py-2">
    <div class="card-header">
      <h1 class="card-title">Add Cars</h1>
    </div>

    <form action="{{url('brand')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Brand Name</label>
          <input type="text" class="form-control
            @error('brandName')
                is-invalid
            @enderror"
            id="brandName" name="brandName" placeholder="Insert Brand Name">
            @error('brandName')
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
