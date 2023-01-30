<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpCentreController extends Controller
{


    public function viewHelpCenter(Request $request) {

        return view('userguide.index', [
            'title' => 'Help Center',
            'active' => 'sims-help',  
        ]);

    }

    
    public function viewGeneralHelp(Request $request) {

        return view('userguide.general.index', [
            'title' => 'Petunjuk Utama',
            'active' => 'sims-help',
        ]);

    }


}