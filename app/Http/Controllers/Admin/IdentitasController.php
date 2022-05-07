<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasController extends Controller
{
    public function index(){
        $title = 'Identitas Sekolah';
        $data = Identitas::find(1);
        // dd($identitas);
        return view('pages.admin.identitas.index', compact('title', 'data'));
    }
}
