@extends('layout.main')


@section('content')
<div class="card px-4 py-2">
    <div class="card-header">
      <h1 class="card-title">Brand Edit</h1>
    </div>

    <form action="{{route('brand.update', $brands->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Brand Name</label>
          <input type="text" value="{{ $brands->brands}}" class="form-control
            @error('brandName')
                is-invalid
            @enderror"
            id="carName" name="brandName" placeholder="Insert brand Name">
            @error('brandName')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
            @enderror
        </div>

      </form>
  </div>
@endsection

