<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HistoryController extends Controller
{


    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }
    

    public function viewHistory(Request $request) {

        $current_year = Carbon::now()->year;

        $history = Http::get("{$this->api_url}/history?year={$current_year}");

        return view('history.index', [
            'title' => 'History',
            'active' => 'history',
            'history' => json_decode($history)->rows,
        ]);

    }


    public function viewMyHistory(Request $request) {

        $current_year = Carbon::now()->year;

        $user = User::findOrFail(Auth::id());

        $userHistory = Http::get("{$this->api_url}/history/$user->nama/all?year={$current_year}");

        return view('history.user_history', [
            'title' => 'History',
            'active' => 'history',
            'history' => json_decode($userHistory)->rows,
        ]);

    }


    public function viewHistoryNew(Request $request) {

        $current_year = Carbon::now()->year;
        $history = Http::get("{$this->api_url}/history?year={$current_year}");

        return view('history.search&paginate-test', [
            'title' => 'History',
            'active' => 'history',
            'history' => json_decode($history)->rows,
        ]);

    }
}
