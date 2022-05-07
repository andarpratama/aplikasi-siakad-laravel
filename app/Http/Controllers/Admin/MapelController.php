<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(){
        $title = 'Mata Pelajaran';
        return view('pages.admin.mapel.index', compact('title'));
    }
}
