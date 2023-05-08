<?php 

namespace App\Repository\Books;

interface BooksInterface
{
    public function getAll();
    public function getOne($params);
    public function store($request); 
    public function update($request, $params);
    public function delete($request, $params);
}