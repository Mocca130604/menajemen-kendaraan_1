<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function index(){
        return view('driver.driver')->with(
            [
                'user' => Auth::user(),
                'driver' => Driver::all(),
            ]
        );
    }

    public function create(){
        return view('driver.addDriver')->with([
            'user' => Auth::user(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'driverName' => 'required',
            'address' => 'required',
            'number' => 'required|numeric|min:10',
        ]);
        $driver = new Driver;
        $driver->nama = $request->driverName;
        $driver->alamat = $request->address;
        $driver->no_telp = $request->number;
        $driver->status = 'NotWork';
        $driver->save();


        return to_route('driver.index')->with('success', 'data berhasil di tambahkan.');
    }

    public function edit($id){
        return view('driver.updateDriver')->with([
            'user' => Auth::user(),
            'driver' => Driver::find($id),
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'driverName' => 'required',
            'address' => 'required',
            'number' => 'required|numeric|min:10',
        ]);

        $driver = Driver::find($id);
        $driver->nama = $request->driverName;
        $driver->alamat = $request->address;
        $driver->no_telp = $request->number;
        $driver->status = $request->status;
        $driver->save();
        return to_route('driver.index')->with('success', 'data berhasil di edit.');
    }

    public function destroy($id){
        $driver = Driver::find($id);
        $driver->delete();

        return back()->with('sucsess', 'data berhasil di hapus');
    }
}
