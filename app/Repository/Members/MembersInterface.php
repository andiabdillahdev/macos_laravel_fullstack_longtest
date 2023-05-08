<?php 

namespace App\Repository\Members;

interface MembersInterface
{
    public function getAll();
    public function getOne($params);
    public function store($request); 
    public function update($request, $params);
    public function delete($request, $params);
}