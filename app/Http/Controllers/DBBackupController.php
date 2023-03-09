<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DBBackupController extends Controller
{

    /* GLOBAL VARIABLES */
    public function __construct()
    {
        $this->api_url = '127.0.0.1:3000'; 
        $this->sims_url = 'http://127.0.0.1:8000'; 
    }


    public function backup_index() {

        return view('admin.database.backup-index', [
            'title' => 'Backup Data',
            'active' => 'admin-dashboard'
        ]);

    }


    public function backupDB(Request $request) {

        $db = $request->database;
        $table = $request->table;

        $date = Carbon::now()->toDateString();
        $hour = Carbon::now()->format('H');
        $minute = Carbon::now()->format('i');
        $seconds = Carbon::now()->format('s');
        $time = $hour.$minute.$seconds;
        $path = public_path()."/db_backup";

        $fn = $date.'_'.$time.'_'.$db.'_'.$table.'-table'.'_backup.sql'; // filename

        $response = json_decode(Http::get("{$this->api_url}/dbquery/function/backupDB?db=$db&table=$table&fn=$fn&path=$path")); // backup via backend

        $file = public_path()."/db_backup/$fn"; // path to the file
        
        if ($response->status == 'success') {
            
            sleep(5);

            return Response::download($file);

        } else {

            return redirect('/admin/db/backup')->with('error', 'Terjadi kesalahan.');

        }

        
    }
}
