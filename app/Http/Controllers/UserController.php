<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function supplier()
    {
        $data = User::orderBy('id', 'desc')->where('role', 2)->get();

        return view('admin.supplier.index',compact('data'));
    }

    public function suppliercreate(Request $request){
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->telepon = $request->telepon;
        $data->password = Hash::make($data['password']);
        $data->role = 2;
        $data->save();

        return back()->with('success', 'Data Berhasil Disimpan.');
    }

    public function supplieredit(Request $request)
    {
        $data = User::find($request->id);
        $data->name = $request->name;
        $data->alamat = $request->alamat;
        $data->email = $request->email;
        $data->telepon = $request->telepon;
        $data->password = Hash::make($data['password']);
        $data->update();

        return back()->with('success','Data Berhasil Dibuah.');
    }

    public function supplierdelete($id)
    {
        $data = User::where('id', $id)->first();
        $data->delete();

        return back()->with('success','Data Berhasil Dihapus.');
    }


    //--------------------------------agen ------------------->


    public function agen()
    {
        $data = User::orderBy('id', 'desc')->where('role', 3)->get();

        return view('admin.agen.index',compact('data'));
    }

    public function agencreate(Request $request){
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->telepon = $request->telepon;
        $data->password = Hash::make($data['password']);
        $data->role = 3;
        $data->save();

        return back()->with('success', 'Data Berhasil Disimpan.');
    }

    public function agenedit(Request $request)
    {
        $data = User::find($request->id);
        $data->name = $request->name;
        $data->alamat = $request->alamat;
        $data->email = $request->email;
        $data->telepon = $request->telepon;
        $data->password = Hash::make($data['password']);
        $data->update();

        return back()->with('success','Data Berhasil Dibuah.');
    }

    public function agendelete($id)
    {
        $data = User::where('id', $id)->first();
        $data->delete();

        return back()->with('success','Data Berhasil Dihapus.');
    }
}
