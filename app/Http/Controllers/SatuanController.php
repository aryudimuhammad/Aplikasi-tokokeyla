<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $data = Satuan::orderBy('id', 'desc')->get();

        return view('admin.satuan.index', compact('data'));
    }

    public function create(Request $request)
    {
        $data =  new Satuan;
        $data->nama_satuan = $request->nama_satuan;
        $data->save();

        return back();
    }

    public function edit(Request $request)
    {
        $data = Satuan::find($request->id);
        $data->nama_satuan = $request->nama_satuan;
        $data->update();

        return back();
    }

    public function delete($id)
    {
        $data = Satuan::find($id);
        $data->delete();

        return back();
    }
}
