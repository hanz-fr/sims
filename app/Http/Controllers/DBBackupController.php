<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class DBBackupController extends Controller
{

    /* GLOBAL VARIABLES */
    public function __construct()
    {
        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini
        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    }


    public function backup_index() {

        return view('admin.database.backup-index', [
            'title' => 'Backup Data',
            'active' => 'admin-dashboard'
        ]);

    }


    public function backupDB(Request $request) {
        
        Http::get("{$this->api_url}/dbquery/function/backupDB");

        return $request;

        //PDF file is stored under project/public/download/info.pdf
        $file = public_path(). "/db_backup";

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, 'filename.pdf', $headers);
        
    }
}
