<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t001_players extends Model {

    public $table = "t001_players";
    
    public $primaryKey = 'a001_id';
    
    public $fillable = [
        "a001_name",
        "a001_surname",
        "a001_address",
        "a001_city",
        "a001_state",
        "a001_country",
        "a001_birthday",
        "a001_gender",
        "a001_zip",
        "a001_neighbor",
        "a001_email"
    ];

    public function storePlayer($data) {
        $this->create($data);
    }

    public function updatePlayer($data, $id) {
        $player = $this->find($id);
        $player->update($data);
        
        return $player;
    }

    public function deletePlayer($id) {
        $player = $this->find($id);
        if ($player) {
            try {
                $player->delete();
                return true;
            } catch (Exception $ex) {
                echo 'error';
            }
        }else{
            echo 'usuario não existe';
        }
    }

    public function getAllPlayers() {
        return $this->all();
    }

    public function getPlayer($id) {
        return $this->find($id);
    }    

}
