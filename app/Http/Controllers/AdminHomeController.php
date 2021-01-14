<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function index()
    {
        return view('admin.home');
    }

    public function users()
    {

        $users = User::where('email_verified_at', '!==', '')->orderBy('created_at', 'DESC')->get();
        return view('admin.user', compact('users'));
    }
}
