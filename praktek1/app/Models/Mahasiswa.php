<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public $table = "mahasiswa"; // custom nama tabel
    protected $primaryKey = "nim"; // custom primary key
    public $incrementing=false; // mematikan auto increment
    protected $keyType="string"; // custom type primary key (defaultnya autoincreme
    
}
