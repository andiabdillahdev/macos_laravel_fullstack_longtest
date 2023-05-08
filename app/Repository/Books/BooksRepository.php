<?php

namespace App\Repository\Books;

use App\Repository\Books\BooksInterface;
use App\Models\Books;

class BooksRepository implements BooksInterface {
    public function getAll(){
        return Books::select('id','book_number','title','author','year')->latest()->get();
    }

    public function getOne($params){
        return Books::select('id','book_number','title','author','year')->where('id',$params)->first();
    }

     public function store($req){
         return Books::create($req);
      
    }

     public function update($req, $params){
        return Books::where('id', $params)
        ->update($request);
    }

    public function delete($req, $params){
        return Books::where('id',$params)->delete();
    }
}