<?php

namespace App\Http\Controllers;

use App\Models\RTModel;
use App\Models\RwModel;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showPengurusRW(){
        // Retrieve RW data
        $rw = RwModel::first();

        // Retrieve RT data associated with the RW
        $rts = RTModel::where('id_rw', $rw->id_rw)->get();

        // Pass the data to the view
        return view('page.struktur-rw.index', compact('rw', 'rts'));
        
    }
}
