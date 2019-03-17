<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t002_teams extends Model
{
    public $table = 't002_teams';
    
    public $primaryKey = 'a002_id';
    
    public $fillable = [
        'a002_name',
        'a002_address',
        'a002_number',
        'a002_neighbor',
        'a002_zip',
        'a002_city',
        'a002_state',
        'a002_country'
    ];

    public function storeTeam($data) {
        $this->create($data);
    }

    public function updateTeam($data, $id) {
        $team = $this->find($id);
        $team->update($data);        
        return $team;
    }

    public function deleteTeam($id) {
        $team = $this->find($id);
        if ($team) {
            try {
                $team->delete();
                return true;
            } catch (Exception $ex) {
                echo 'error';
            }
        }else{
            echo 'Time inexistente';
        }
    }

    public function getAllTeams() {
        
        try {
            return $this->all();            
        } catch (Exception $ex) {
            echo 'Erro inesperado !';
        }
        
    }

    public function getTeam($id) {
        return $this->find($id);
    }  
}
