<?php 

namespace App\Repository\Borrower;

interface BorrowerInterface
{
    public function getAll();
    public function getHistoryByUser();
    public function getOne($params);
    public function store($request); 
    public function update($request, $params);
    public function delete($request, $params);
}