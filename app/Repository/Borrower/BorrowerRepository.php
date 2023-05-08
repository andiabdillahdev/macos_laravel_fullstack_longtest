<?php

namespace App\Repository\Borrower;

use App\Repository\Books\BorrowerInterface;
use App\Models\Borrower;
use DB;
class BorrowerRepository implements BorrowerInterface {

    public function getAll(){
        return DB::table('borrower')->select('borrower.id','borrower.id_members','borrower.book_number','borrower.loan_date','borrower.date_of_return','borrower.status','members.name as members','books.title')->join('members','borrower.id_members','=','members.id')->join('books','borrower.book_number','=','books.id')->latest()->get();
    }

    public function getOne($params){
        return Borrower::select('id','id_members','book_number','loan_date','date_of_return','status')->where('id',$params)->first();
    }

     public function store($req){
         return Borrower::create($req);
    }

     public function update($req, $params){
        return Borrower::where('id', $params)
        ->update($req);
    }

    public function delete($req, $params){
        return Borrower::where('id',$params)->delete();
    }
}