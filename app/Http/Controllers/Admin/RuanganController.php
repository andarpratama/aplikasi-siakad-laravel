<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RuanganController extends Controller
{
    protected $title = 'Ruangan';

    public function index()
    {
        $title = $this->title;
        $ruangan = Ruangan::all();
        return view('pages.admin.ruangan.index', compact('title', 'ruangan'));
    }

    public function create()
    {
        $title = $this->title;
        return view('pages.admin.ruangan.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validator = $this->validation($request, 'store');

        if ($validator->fails()) {
            return redirect()->route('admin.ruangan.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            Ruangan::create([
                'kode_ruangan' => $request->kode_ruangan,
                'status' => $request->status,
                'kapasitas' => $request->kapasitas
            ]);

            return redirect()->route('admin.ruangan')->with('message', 'Data berhasil ditambahkan');
        }
    }

    public function validation($request, $mode)
    {
        $kode_ruangan = 'required|unique:ruangan';
        if ($mode == 'update') {
            $kode_ruangan = 'required';
        }
        $result = Validator::make($request->all(), [
            'kode_ruangan' => $kode_ruangan,
            'status' => 'required',
            'kapasitas' => 'required|numeric|gt:0',

        ], [
            'kode_ruangan.required' => 'Kode tidak boleh kosong',
            'kode_ruangan.uniques' => 'Kode sudah terpakai',
            'status.required' => 'Status tidak boleh kosong',
            'kapasitas.required' => 'Kapasitas sudah terpakai',
            'kapasitas.numeric' => 'Kapasitas harus berupa angka',
            'kapasitas.gt' => 'Kapasitas tidak boleh negatif',
        ]);

        return $result;
    }

    public function edit($id)
    {
        $title = $this->title;
        $data = Ruangan::find($id);
        return view('pages.admin.ruangan.edit', compact('title', 'data'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validation($request, 'update');

        if ($validator->fails()) {
            return redirect()->route('admin.ruangan.edit', $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            Ruangan::where('id', $id)
                ->update([
                    'status' => $request->status,
                    'kapasitas' => $request->kapasitas
                ]);

            return redirect()->route('admin.ruangan')->with('message', 'Data berhasil diubah');
        }
    }

    public function delete($id)
    {
        Ruangan::destroy($id);
        return redirect()->route('admin.ruangan')->with('message', 'Data berhasil dihapus');
    }
}
