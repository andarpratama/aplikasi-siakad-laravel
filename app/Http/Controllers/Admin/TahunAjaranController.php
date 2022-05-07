<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index(){
        $title = 'Tahun Ajaran';
        return view('pages.admin.tahun_ajaran.index', compact('title'));
    }
}
