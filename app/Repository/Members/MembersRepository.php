<?php

namespace App\Repository\Members;

use App\Repository\Members\MembersInterface;
use App\Models\Members;
use Hash;
use DB;
class MembersRepository implements MembersInterface {

    public function getAll(){
        return Members::select('id','name','address','city','email','phone_number','date_of_birth')->latest()->get();
    }

    public function getOne($params){
        return Members::select('id','name','address','city','email','phone_number','date_of_birth')->where('id',$params)->first();
    }

     public function store($req){ 
        $data = new Members();
        $data->name = $req['name'];
        $data->address = $req['address'];
        $data->city = $req['city'];
        $data->email = $req['email'];
        $data->phone_number = $req['phone_number'];
        $data->date_of_birth = $req['date_of_birth'];
        $data->save();


        if ($data) {
            DB::table('users')->insert([
                'nama' => $data->name,
                'email' => $data->email,
                'password' => Hash::make($data->email),
                'role' => 'user',
                'id_members' => $data->id
            ]);
        }

        return $data;   
    }

     public function update($req, $params){
        return Members::where('id', $params)
        ->update($req);
    }

    public function delete($req, $params){
        return Members::where('id',$params)->delete();
    }

    public function getOption(){
        return DB::table('members')->select('id','name as text')->get();
    }
}