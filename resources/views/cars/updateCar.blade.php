@extends('layout.main')


@section('content')
<div class="card px-4 py-2">
    <div class="card-header">
      <h1 class="card-title">Cars Edit</h1>
    </div>

    <form action="{{route('cars.update', $cars->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Car Name</label>
          <input type="text" value="{{ $cars->name}}" class="form-control
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
            <select class="custom-select" value="{{ $cars->type }}" name="carType" id="carType">
                <option value="">Pilih type</option>
                <option value="pickup" {{ $cars->type == 'pickup' ? 'selected' : '' }}>Pickup</option>
                <option value="bus" {{ $cars->type == 'bus' ? 'selected' : '' }}>Bus</option>
                <option value="truck" {{ $cars->type == 'truck' ? 'selected' : '' }}>Truck</option>
                <option value="minibus" {{ $cars->type == 'minibus' ? 'selected' : '' }}>Mini Bus</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Brands</label>
            <select class="custom-select" value="{{ $cars->brands}}" name="carBrands" id="carBrands">
                <option value="">Pilih Merk</option>
                <option value="toyota" {{ $cars->brands == 'toyota' ? 'selected' : '' }}>Toyota</option>
                <option value="daihatsu" {{ $cars->brands == 'daihatsu' ? 'selected' : '' }}>Daihatsu</option>
                <option value="honda" {{ $cars->brands == 'honda' ? 'selected' : '' }}>Honda</option>
                <option value="hino" {{ $cars->brands == 'hino' ? 'selected' : '' }}>Hino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Year</label>
            <input class="form-control
            @error('year')
                is-invalid
            @enderror"
            type="text" name="year" value="{{ $cars->year }}" placeholder="Insert car production year">
            @error('year')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
        @enderror
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
  </div>
@endsection

