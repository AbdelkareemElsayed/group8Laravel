<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $table = "users";

    protected $fillable = ["name","email","password","linkedIn"];
 
  //  public $timestamps = false;


}
