<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t002_teams;
use Ixudra\Curl\Facades\Curl;

class ControllerTeams extends Controller {

    public $model;

    public function __construct() {
        $this->model = new t002_teams();
    }

    public function openTeams() {
        return view('teams');
    }

    public function setTeam(Request $request) {
        try {
            $this->model->storeTeam($request->all());
            //return $this->openHome('Cadastro realizado com sucesso !');
            echo  "<script>alert('Time cadastrado com sucesso !);</script>";
            return redirect('/listteams');
        } catch (Exception $ex) {
            return "erro";
        }
    }

    public function getCEPTeam($cep) {
        $response = Curl::to("https://viacep.com.br/ws/$cep/json/")->get();
        print_r($response);
    }

    public function insertTeam() {
        return view('insertTeam');
    }

    public function listTeams() {
        $data = $this->model->getAllTeams();
        if (!$data) {
            $data = [];
        }
        return $this->viewTeams($data);
    }

    public function editTeam($id) {
        $data = $this->model->getTeam($id);
        return $this->viewTeam($data);
    }

    public function viewTeams($data = []) {
        return view('listTeams', ["lista" => $data]);
    }

    public function viewTeam($data) {
        return view('editTeam', ['lista' => $data]);
    }

    public function exportTeams() {
        $list = $this->model->getAllTeams();
        $filename = 'files/times' . date('y-m-d_H-i-s') . '.csv';
        $fp = fopen($filename, 'w');

        foreach ($list as $fields) {
            //dd($fields);
            $array = [
                $fields['a002_id'],
                $fields['a002_name'],
                $fields['a002_address'],
                $fields['a002_number'],
                $fields['a002_zip'],
                $fields['a002_city'],
                $fields['a002_state'],
                $fields['a002_country']
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

    public function updateTeam(Request $request, $id) {        
        try {
            $data = $request->all();
            $this->model->updateTeam($data, $id);
            
            return redirect('/listteams');
        } catch (Exception $ex) {
            echo 'erro';
        }
    }

    public function removeTeam($id) {
        try {
            $this->model->deleteTeam($id);
            return redirect('/listteams');
        } catch (Exception $ex) {
            return 'erro';
        }
    }

}
