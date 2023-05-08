<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Str;
class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['id','book_number','title','author','year'];

    protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
            try {
                $model->book_number = Str::random(8);
            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}
