<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    protected $table = "address";
    protected $fillable = ["city","extraData","user_id"];

    public $timestamps =false;
}
