<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandsController extends Controller
{
    public function index(){
        return view('brands.brands')->with([
            'user' => Auth::user(),
            'brands' => Brands::all(),
        ]);
    }

    public function create(){
        return view('brands.addbrand')->with([
            'user' => Auth::user(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'brandName' => 'required',
        ]);
        $brand = new Brands;
        $brand->brands = $request->brandName;
        $brand->save();

        return to_route('brand.index')->with('success', 'data berhasil di tambahkan.');
    }

    public function edit($id){
        return view('brands.updateBrand')->with([
            'user' => Auth::user(),
            'brands' => Brands::find($id),
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'brandName' => 'required',
        ]);
        $brand = Brands::find($id);
        $brand->brands = $request->brandName;
        $brand->save();
        return to_route('brand.index')->with('success', 'data berhasil di edit.');
    }

    public function destroy($id){
        $brands = Brands::find($id);
        $brands->delete();

        return back()->with('sucsess', 'data berhasil di hapus');
    }
}
