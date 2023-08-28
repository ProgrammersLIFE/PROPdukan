<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    use HasFactory;
    protected $table= "kinds";
    protected $guarded;

    public function getKind(){
        return DB::table('kinds')->get();
    }
}
