<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','age'];
    public $timestamps = false;

    public function books(){
      return $this->belongsToMany(Book::class,'orders')
      ->withPivot('status','order_date')
      ->withTimeStamps;
    }
}
