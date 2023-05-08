<?php

namespace App\Repository\Members;

use App\Repository\Members\MembersInterface;
use App\Models\Members;

class MembersRepository implements MembersInterface {

    public function getAll(){
        return Members::select('id','name','address','city','phone_number','date_of_birth')->latest()->get();
    }

    public function getOne($params){
        return Members::select('id','name','address','city','phone_number','date_of_birth')->where('id',$params)->first();
    }

     public function store($req){
         return Members::create($req);
      
    }

     public function update($req, $params){
        return Members::where('id', $params)
        ->update($req);
    }

    public function delete($req, $params){
        return Members::where('id',$params)->delete();
    }
}