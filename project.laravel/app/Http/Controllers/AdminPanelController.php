<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminPanelController
{
    public function index()
    {
        $user = request()->user();
        return view('admin/welcome');
    }
}
