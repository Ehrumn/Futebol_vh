<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t001_players;
use App\t002_teams;
use App\t003_teamplayers;
use Illuminate\Support\Facades\DB;

class ControllerTeamPlayers extends Controller
{
    public $model;
    public $modelTeam;
    public $modelPlayer;
    
    public function __construct() {
        $this->model = new t003_teamplayers();
        $this->modelTeam = new t002_teams();
        $this->modelPlayer = new t001_players();
    }
    public function setTeamPlayer(Request $request) {
        $data  = $request->all();
        $this->model->storeTeamPlayer($data);
        return redirect('/');
    }
    public function insertTeamPlayer() {
        $teams = $this->modelTeam->getAllTeams();
        $players = $this->modelPlayer->getAllPlayers();
        return view('insertTeamPlayer', ['teams'=>$teams, 'players'=>$players]);        
    }
    
    public function getTeamPlayers($id) {
        return $this->model->getTeamPlayers($id);
    }

    public function exportTeamPlayers() {
        $list = DB::select('select * from vw_teamplayers');
        $filename = 'files/timeplayers' . date('y-m-d_H-i-s') . '.csv';
        $fp = fopen($filename, 'w');

            $array = [
                'Nome do Time',
                'Cidade do Time',
                'Estado do Time',
                'Nome Jogador',
                'Posição Jogador',
                'Salário Jogador'
            ];
            fputcsv($fp, $array);
            
        foreach ($list as $fields) {
            //dd($fields);
            $array = [
                $fields->a002_name,
                $fields->a002_city,
                $fields->a002_state,
                $fields->playername,
                $fields->a003_position,
                $fields->a003_salary
            ];
            fputcsv($fp, $array);

//        'a002_name',
//        'a002_address',
//        'a002_number',
//        'a002_zipcode',
//        'a002_city',
//        'a002_state',
//        'a002_country'
        }
        fclose($fp);

        return redirect($filename);
    }
}
