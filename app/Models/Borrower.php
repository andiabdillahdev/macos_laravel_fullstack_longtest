<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
class Borrower extends Model
{
    use HasFactory;
    protected $table = 'borrower';
    protected $fillable = ['id','id_members','book_number','loan_date','date_of_return','status'];

        protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
            try {
                $model->status = false;
            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}
