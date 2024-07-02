<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function users()
    {
        $users = User::where('role', '0')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function traders()
    {
        $traders = User::where('role', '2')->get();
        return view('admin.traders.index', compact('traders'));
    }

    public function viewuser($id)
    {
        $users = User::find($id);
        return view('admin.users.view', compact('users'));
    }
}
