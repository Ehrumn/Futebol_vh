<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t001_players;
use Ixudra\Curl\Facades\Curl;

class ControllerPlayers extends Controller {

    public $model;

    public function __construct() {
        $this->model = new t001_players();
    }
    
    public function insertPlayer() {
        return view('insertPlayer');        
    }

    public function setPlayer(Request $request) {
        try {
            $this->model->storePlayer($request->all());
            //return $this->openHome('Cadastro realizado com sucesso !');
            echo  "<script>alert('Jogador cadastrado com sucesso !);</script>";
            return redirect('/listplayers');
        } catch (Exception $ex) {
            return "erro";
        }
    }

    public function removePlayer($id) {
        try {
            $this->model->deletePlayer($id);
            return redirect('/listplayers');
        } catch (Exception $ex) {
            return 'erro';
        }
    }

    public function listPlayers() {
        $data = $this->model->getAllPlayers();
        if (!$data) {
            $data = [];
        }
        return $this->viewPlayers($data);
    }

    public function viewPlayers($data = []) {
        return view('listPlayers', ["lista" => $data]);
    }

    public function editPlayer($id) {
        $data = $this->model->getPlayer($id);
        return $this->viewPlayer($data);
    }

    public function viewPlayer($data) {
        return view('editPlayer', ['lista' => $data]);
    }

    public function updatePlayer(Request $request, $id) {        
        try {
            $data = $request->all();
            $this->model->updatePlayer($data, $id);
            
            return redirect('/listplayers');
        } catch (Exception $ex) {
            echo 'erro';
        }
    }

    public function exportPlayers() {
        $list = $this->model->getAllPlayers();
        $filename = 'files/file'.date('y-m-d_H-i-s').'.csv';
        $fp = fopen($filename, 'w');

        foreach ($list as $fields) {
            //dd($fields);
            $array = [
                $fields['a001_id'], 
                $fields['a001_name'], 
                $fields['a001_surname'], 
                $fields['a001_address'], 
                $fields['a001_city'], 
                $fields['a001_state'], 
                $fields['a001_country'], 
                $fields['a001_birthday'],
                $fields['a001_gender'],
                $fields['a001_email']
                ];
            fputcsv($fp, $array);
        }
        fclose($fp);
        
        return redirect($filename);
    }

    public function getCEPPlayer($cep) {
        $response = Curl::to("https://viacep.com.br/ws/$cep/json/")->get();
        print_r($response);
    }

}
