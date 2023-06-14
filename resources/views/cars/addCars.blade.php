@extends('layout.main')


@section('content')
<div class="card px-4 py-2">
    <div class="card-header">
      <h1 class="card-title">Add Cars</h1>
    </div>

    <form action="{{url('cars')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Car Name</label>
          <input type="text" class="form-control
            @error('carName')
                is-invalid
            @enderror"
            id="carName" name="carName" placeholder="Insert Car Name">
            @error('carName')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Type</label>
            <select class="custom-select" name="carType" id="carType">
                <option value="">Pilih type</option>
                @foreach ($types as $key => $data)
                    <option value="{{$data->tipe}}">{{$data->tipe}}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Brands</label>
            <select class="custom-select" name="carBrands" id="carBrands">
                <option value="">Pilih Merk</option>
                @foreach ($brands as $key => $data)
                    <option value="{{$data->brands}}">{{$data->brands}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Year</label>
            <input class="form-control
            @error('year')
                is-invalid
            @enderror"
            type="text" name="year" placeholder="Insert car production year">
            @error('year')
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
