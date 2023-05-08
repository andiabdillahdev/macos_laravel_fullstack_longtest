<?php

namespace App\Repository\Books;

use App\Repository\Books\BooksInterface;
use App\Models\Book;
use DB;
class BooksRepository implements BooksInterface {
    public function getAll(){
        return Book::select('id','book_number','title','author','year')->latest()->get();
    }

    public function getOne($params){
        return Book::select('id','book_number','title','author','year')->where('id',$params)->first();
    }

     public function store($req){
         return Book::create($req);
      
    }

     public function update($req, $params){
        return Book::where('id', $params)
        ->update($req);
    }

    public function getOption(){
         return DB::table('books')->select('book_number as id','title as text')->latest()->get();
    }

    public function delete($req, $params){
        return Book::where('id',$params)->delete();
    }
}