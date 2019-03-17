<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t001_players;

class ControllerFutebol extends Controller
{
    public function openHome($msg = ''){
        return view('home', ["msg" => $msg]);
    }
    
    
}