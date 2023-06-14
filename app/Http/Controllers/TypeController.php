<?php

namespace App\Http\Controllers;

use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    public function index(){
        return view('type.type')->with([
            'user' => Auth::user(),
            'type' => Types::all(),
        ]);
    }

    public function create(){
        return view('type.addType')->with([
            'user' => Auth::user(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'typeName' => 'required',
        ]);
        $type = new Types;
        $type->tipe = $request->typeName;
        $type->save();

        return to_route('type.index')->with('success', 'data berhasil di tambahkan.');
    }

    public function edit($id){
        return view('type.updateType')->with([
            'user' => Auth::user(),
            'type' => Types::find($id),
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'typeName' => 'required',
        ]);
        $type = Types::find($id);
        $type->Tipe = $request->typeName;
        $type->save();
        return to_route('type.index')->with('success', 'data berhasil di edit.');
    }

    public function destroy($id){
        $Types = Types::find($id);
        $Types->delete();

        return back()->with('sucsess', 'data berhasil di hapus');
    }

}
