<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t003_teamplayers extends Model
{
    
    public $table = 't003_teamplayers';
    
    public $primaryKey = 'a003_id';
    
    public $fillable = [
        'a001_id',
        'a002_id',
        'a003_salary',
        'a003_position'
    ];
    
    public function storeTeamPlayer($data) {
        return $this->create($data);        
    }
    
    public function getTeamPlayers($id) {
        return $this->select()
                ->leftJoin('t001_players','t001_players.a001_id','t003_teamplayers.a001_id')
                ->where('a002_id',$id)
                ->get();
    }
}
