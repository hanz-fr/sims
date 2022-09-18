<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index() {

        $siswa = Http::get('localhost:3000/siswa');

        return view('be-test',[
            'siswa' => json_decode($siswa),
            'title' => 'backend-test',
            'active' => 'backend-test'
        ]);
    }

    public function create() {
        return view('be-test-add', [
            'title' => 'backend-test',
            'active' => 'backend-test'
        ]);
    }


    public function store(Request $request) {

        return $request;

    }
}
