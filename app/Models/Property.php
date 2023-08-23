<?php

namespace App\Models;
USE DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded;
    
    public function getProperties(){
        return DB::table('properties')->get();
    }
}
