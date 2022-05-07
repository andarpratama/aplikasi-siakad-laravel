<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserTeacher;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        $title = 'Guru';
        $guru = UserTeacher::all();
        return view('pages.admin.guru.index', compact('title', 'guru'));
    }
}
