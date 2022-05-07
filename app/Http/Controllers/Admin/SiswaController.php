<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserStudents;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        $title = 'Siswa';
        $siswa = UserStudents::all();
        return view('pages.admin.siswa.index', compact('title', 'siswa'));
    }
}
