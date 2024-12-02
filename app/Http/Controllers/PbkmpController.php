<?php

namespace App\Http\Controllers;

use App\Models\Pbkmp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PbkmpController extends Controller
{
    public function index()
    {
        $data = Pbkmp::paginate(10);
        return view('admin.pbkmp.index', compact('data'));
    }
    public function create()
    {
        return view('admin.pbkmp.create');
    }

    public function delete($id)
    {
        $data = Pbkmp::find($id)->delete();
        return back();
    }

    public function edit($id)
    {
        $data = Pbkmp::find($id);

        return view('admin.pbkmp.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        Pbkmp::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/data/pbkmp');
    }

    public function store(Request $req)
    {
        Pbkmp::create($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/data/pbkmp');
    }
}
