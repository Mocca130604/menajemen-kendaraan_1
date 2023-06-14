<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Cars;
use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarsController extends Controller
{
    public function index(){
        return view('cars.cars')->with([
            'user' => Auth::user(),
            'cars' => Cars::all(),
        ]);
    }

    public function create(){
        return view('cars.addCars')->with([
            'user' => Auth::user(),
            'types' => Types::all(),
            'brands' => Brands::all(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'carName' => 'required',
            'carType' => 'required',
            'carBrands' => 'required',
            'year' => 'required',
        ]);
        $car = new Cars;
        $car->name = $request->carName;
        $car->type = $request->carType;
        $car->brands = $request->carBrands;
        $car->year = $request->year;
        $car->used = 0;
        $car->save();

        return to_route('cars.index')->with('success', 'data berhasil di tambahkan.');
    }

    public function edit($id){
        return view('cars.updateCar')->with([
            'user' => Auth::user(),
            'cars' => Cars::find($id),
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'carName' => 'required',
            'carType' => 'required',
            'carBrands' => 'required',
            'year' => 'required',
        ]);

        $car = Cars::find($id);
        $car->name = $request->carName;
        $car->type = $request->carType;
        $car->brands = $request->carBrands;
        $car->year = $request->year;
        $car->used = 0;
        $car->save();
        return to_route('cars.index')->with('success', 'data berhasil di edit.');
    }

    public function destroy($id){
        $cars = Cars::find($id);
        $cars->delete();

        return back()->with('sucsess', 'data berhasil di hapus');
    }
}
