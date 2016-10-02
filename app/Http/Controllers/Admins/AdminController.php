<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class AdminController extends Controller
{
	public function create()
    {
        return view('admin.register');
    }

    public function store(Request $request)
    {
    	$admin = new Admin;

    	$admin->name = $request->name;
    	$admin->email = $request->email;

    	$cryptPassword = bcrypt($request->password);
    	$admin->password = $cryptPassword;

    	$admin ->save();

    	return redirect('admin.auth');
    }
}
