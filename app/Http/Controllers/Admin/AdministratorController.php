<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function index(){
        $title = 'Administrator';
        return view('pages.admin.administrator.index', compact('title'));
    }
}
