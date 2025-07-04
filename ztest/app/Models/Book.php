<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ["name","author"];
    public $timestamps = false;

    public function users(){
      return $this->belongsToMany(User::class,'orders')
      ->withPivot('status','order_date')
      ->withTimeStamps();
    }

}
