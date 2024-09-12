<?php 

namespace App\Reposirty;

use App\Models\Todo;
use App\Reposirty\TodoRepositryInterface;

class TodoRepositry implements TodoRepositryInterface{
    
    public function insert($data){
        return Todo::insertGetId($data);
    }
    
    public function getList(){
        return Todo::get();
    }

    public function delete($condition){
        return Todo::where($condition)->delete();
    }

    public function update($condition,$data){
        return Todo::where($condition)->update($data);
    }
}