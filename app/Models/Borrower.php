<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;
    protected $table = 'borrower';
    protected $fillable = ['id','id_members','book_number','loan_date','date_of_return','status'];
}
