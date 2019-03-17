<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t001_players;
use App\t002_teams;
use App\t003_teamplayers;

class ControllerFutebol extends Controller {

    public $model;
    public $modelTeam;
    public $modelPlayer;

    public function __construct() {
        $this->model = new t003_teamplayers();
        $this->modelTeam = new t002_teams();
        $this->modelPlayer = new t001_players();
    }

    public function openHome() {
        $teams = $this->modelTeam->getAllTeams();
        $players = $this->modelPlayer->getAllPlayers();
        return view('welcome', ['teams' => $teams, 'players' => $players]);
    }

}
