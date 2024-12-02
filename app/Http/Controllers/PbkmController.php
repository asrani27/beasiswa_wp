<?php

namespace App\Http\Controllers;

use App\Models\Pbkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PbkmController extends Controller
{

    public function index()
    {
        $data = Pbkm::paginate(10);
        return view('admin.pbkm.index', compact('data'));
    }
    public function create()
    {
        return view('admin.pbkm.create');
    }

    public function delete($id)
    {
        $data = Pbkm::find($id)->delete();
        return back();
    }

    public function edit($id)
    {
        $data = Pbkm::find($id);

        return view('admin.pbkm.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        Pbkm::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/data/pbkm');
    }

    public function store(Request $req)
    {
        Pbkm::create($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/data/pbkm');
    }
}
