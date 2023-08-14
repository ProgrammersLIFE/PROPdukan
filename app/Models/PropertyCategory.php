<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class PropertyCategory extends Model
{
    use HasFactory;
    protected $table= "property_categories";
    protected $guarded;

    public function getCategories(){
        return DB::table('property_categories')->get();
    }
}
