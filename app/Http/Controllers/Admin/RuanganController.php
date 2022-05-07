<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RuanganController extends Controller
{
    protected $title = 'Ruangan';

    public function index()
    {
        $title = $this->title;
        return view('pages.admin.ruangan.index', compact('title'));
    }

    public function create()
    {
        $title = $this->title;
        return view('pages.admin.ruangan.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:ruangan',
            'status' => 'required',
            'kapasitas' => 'required|numeric',

        ], [
            'kode.required' => 'Kode tidak boleh kosong',
            'kode.uniques' => 'Kode sudah terpakai',
            'status.required' => 'Status tidak boleh kosong',
            'kapasitas.required' => 'Kapasitas sudah terpakai',
            'kapasitas.numeric' => 'Kapasitas harus berupa angka',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.ruangan.create')
                ->withErrors($validator)
                ->withInput();
        } else {

            // $newUser = User::create([
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'password' => Hash::make($request->password),
            //     'role' => $request->role,
            // ]);

            // User::where('id', $newUser->id)
            //     ->update(['role' => $request->role]);

            return redirect()->route('admin.ruangan')->with('message', 'Data berhasil ditambahkan');
        }
    }
}
