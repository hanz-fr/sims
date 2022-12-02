<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return view('admin.login', [
            'title'  => 'Login',
            'status' => ''
        ]);

    }

    
    public function handleLogin(Request $request) {

        if(Auth::guard('admin')
               ->attempt($request->only(['email', 'password'])))
        {
            return redirect()
                ->route('manage.index');
        }

        return redirect()
            ->back()
            ->with('error', 'Login details are not valid');

    }


    public function logout() {

        Auth::guard('admin')
            ->logout();

        return redirect()
            ->route('admin.login');

    }


}
