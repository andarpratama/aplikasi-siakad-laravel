<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    protected $title = 'Kelas';
    public function index(){
        $title = $this->title;
        return view('pages.admin.kelas.index', compact('title'));
    }

    public function create(){
        $title = $this->title;
        return view('pages.admin.kelas.create', compact('title'));
    }
}
