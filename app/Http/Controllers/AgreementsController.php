<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Cars;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgreementsController extends Controller
{
    public function index(){
        return view('agreement.agreement')->with(
            [
                'user' => Auth::user(),
                'agreement' => Agreement::all(),
            ]
        );
    }

    public function create(){
        return view('agreement.addagreement')->with([
            'user' => Auth::user(),
            'driver' => Driver::where('status', 'notWork')->get(),
            'cars' => Cars::all(),
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'adminName' => 'required',
            'driverName' => 'required',
            'carName' => 'required',
        ]);

        $car = Cars::find($request->carName);


        $driver = Driver::find($request->driverName);


        $agreement = new Agreement;
        $agreement->type = $car->type;
        $agreement->brands = $car->brands;
        $agreement->admin_name = $request->adminName;
        $agreement->driver = $driver->nama;
        $agreement->driver_id = $driver->id;
        $agreement->note = $request->note;
        $agreement->status = 'pending';
        $agreement->save();

        $car->used = $car->used+1;
        $car->save();

        $driver->status = 'work';
        $driver->save();


        return to_route('agreement.index')->with('success', 'data berhasil di tambahkan.');
    }

    public function accept($id){
        $agreement = Agreement::find($id);
        $agreement->status = "ongoing";
        $agreement->save();

        return to_route('agreement.index')->with('success', 'data berhasil di konfirmasi.');
    }

    public function done($id){
        $agreement = Agreement::find($id);
        $agreement->status = "done";

        $driver = Driver::find($agreement->driver_id);
        $driver->status = 'NotWork';

        $driver->save();
        $agreement->save();

        return to_route('agreement.index')->with('success', 'data berhasil di konfirmasi.');
    }
    // public function update(Request $request, $id){
    //     $request->validate([
    //         'agreementName' => 'required',
    //         'address' => 'required',
    //         'number' => 'required|numeric|min:10',
    //     ]);

    //     $agreement = Agreement::find($id);
    //     $agreement->nama = $request->agreementName;
    //     $agreement->alamat = $request->address;
    //     $agreement->no_telp = $request->number;
    //     $agreement->status = 'not Work';
    //     $agreement->save();

    //     return to_route('agreement.index')->with('success', 'data berhasil di edit.');
    // }

    // public function destroy($id){
    //     $agreement = Agreement::find($id);
    //     $agreement->delete();

    //     return back()->with('sucsess', 'data berhasil di hapus');
    // }
}
