<?php
namespace App\Reposirty;

interface TodoRepositryInterface{

    public function insert($data);

    public function getList();

    public function delete($condition);

    public function update($condition,$data);
}